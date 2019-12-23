<?php

namespace Core\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use ZipArchive;

class PluginController extends AbstractController
{
    private $em;
    private $filesystem;
    private $finder;
    private $params;
    private $rootDir;
    private $pluginFile;
    private $pluginFileName;
    private $tempPluginDir;
    private $tempPluginRootDir;
    private $pluginName;
    private $pluginConfigArr;
    private $APINamespace;
    private $pluginInstallDir;
    private $pluginUrl;
    private $pluginUpdate = false;

    public function __construct(
        EntityManagerInterface $em,
        ParameterBagInterface $params
    )
    {
        $this->em = $em;
        $this->filesystem = new Filesystem();
        $this->finder = new Finder();
        $this->params = $params;
        $this->rootDir = $this->params->get('kernel.project_dir');
        $this->setMainPluginTempDir();
    }

    /**
     * @Route(
     *     name="plugin_configurations",
     *     path="/api/pluginconfigurations",
     *     methods={"GET"}
     * )
     */
    public function getPluginConfigurations(): Response
    {
        $fileContents = '';
        if($this->filesystem->exists($this->rootDir.'/config/plugin-config.json')) {
            $fileContents = file_get_contents($this->rootDir.'/config/plugin-config.json');
        }

        return new Response($fileContents);
    }

    /**
     * @Route(
     *     name="plugin_registry",
     *     path="/api/pluginregistry",
     *     methods={"GET"}
     * )
     */
    public function getPluginRegistry(): Response
    {
        $localArr = array();
        $mainContents = file_get_contents('https://raw.githubusercontent.com/Symbiota2/Symbiota2/master/plugin-registry.json');
        $mainArr = json_decode($mainContents, true);
        if($this->filesystem->exists($this->rootDir.'/local-plugin-registry.json')) {
            $localContents = file_get_contents($this->rootDir.'/local-plugin-registry.json');
            $localArr = json_decode($localContents, true);
        }
        $responseArr = array_merge($mainArr,$localArr);
        return new JsonResponse(
            $responseArr
        );
    }

    /**
     * @Route(
     *     name="disable_plugin",
     *     path="/api/disableplugin",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function disablePlugin(Request $request): JsonResponse
    {
        $dataArr = json_decode($request->getContent(), true);
        $this->pluginName = $dataArr['plugin'];
        $pluginConfigArr = $this->getPluginConfigArr();
        if($pluginConfigArr) {
            $this->pluginConfigArr = $pluginConfigArr[$this->pluginName];
            if(isset($this->pluginConfigArr['api_namespace'])) {
                $this->APINamespace = $this->pluginConfigArr['api_namespace'];
                $this->removePluginFromApiPlatformYaml();
                $this->removePluginFromDoctrineYaml();
                $this->removePluginFromComposerJson();
            }
            if(isset($this->pluginConfigArr['ui_filename'])) {
                $this->removePluginUMDFile();
            }
            if($this->filesystem->exists($this->rootDir.'/plugins/'.$this->pluginName.'/i18n')) {
                $this->removePluginTranslations();
            }
            $this->disablePluginInConfig();
        }
        return new JsonResponse(
            true
        );
    }

    /**
     * @Route(
     *     name="delete_plugin",
     *     path="/api/deleteplugin",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function deletePlugin(Request $request): JsonResponse
    {
        $dataArr = json_decode($request->getContent(), true);
        $this->pluginName = $dataArr['plugin'];
        $pluginConfigArr = $this->getPluginConfigArr();
        if($pluginConfigArr) {
            $this->pluginConfigArr = $pluginConfigArr[$this->pluginName];
            if(isset($this->pluginConfigArr['api_namespace'])) {
                $this->APINamespace = $this->pluginConfigArr['api_namespace'];
                $this->removePluginFromApiPlatformYaml();
                $this->removePluginFromDoctrineYaml();
                $this->removePluginFromComposerJson();
            }
            if(isset($this->pluginConfigArr['ui_filename'])) {
                $this->removePluginUMDFile();
            }
            if($this->filesystem->exists($this->rootDir.'/plugins/'.$this->pluginName.'/i18n')) {
                $this->removePluginTranslations();
            }
            $this->disablePluginInConfig();
            if($this->pluginConfigArr['ui_filename'] !== 'local') {
                $this->filesystem->remove([$this->rootDir.'/plugins/'.$this->pluginName]);
            }
        }
        return new JsonResponse(
            true
        );
    }

    /**
     * @Route(
     *     name="enable_plugin",
     *     path="/api/enableplugin",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function enablePlugin(Request $request): JsonResponse
    {
        $dataArr = json_decode($request->getContent(), true);
        $this->pluginName = $dataArr['plugin'];
        $pluginConfigArr = $this->getPluginConfigArr();
        if($pluginConfigArr) {
            $this->pluginConfigArr = $pluginConfigArr[$this->pluginName];
            if(isset($this->pluginConfigArr['api_namespace'])) {
                $this->APINamespace = $this->pluginConfigArr['api_namespace'];
                $this->addPluginToApiPlatformYaml();
                $this->addPluginToDoctrineYaml();
                $this->addPluginToComposerJson();
            }
            if(isset($this->pluginConfigArr['ui_filename'])) {
                $this->addPluginUMDFile();
            }
            if($this->filesystem->exists($this->rootDir.'/plugins/'.$this->pluginName.'/i18n')) {
                $this->addPluginTranslations();
            }
            $this->enablePluginInConfig();
        }
        return new JsonResponse(
            true
        );
    }

    /**
     * @Route(
     *     name="install_plugin_file",
     *     path="/api/installpluginfile",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function installPluginFromFile(Request $request): JsonResponse
    {
        $returnCode = 0;
        $this->pluginFile = $request->files->get('uploadfile');
        $this->pluginFileName = $this->pluginFile->getClientOriginalName();
        $this->setSessionTempDir();
        $this->filesystem->copy($this->pluginFile, $this->tempPluginDir.'/'.$this->pluginFileName, true);
        if($this->unzipPluginFile()){
            if($this->validatePluginExtraction()) {
                if($this->validatePluginConfig()) {
                    $this->setPluginInstallDir();
                    $this->filesystem->mirror($this->tempPluginRootDir, $this->pluginInstallDir);
                    $this->setPluginConfigFile();
                }
                else{
                    $returnCode = 4;
                }
            }
            else{
                $returnCode = 3;
            }
        }
        else {
            $returnCode = 2;
        }
        $this->deleteSessionTempDir();
        return new JsonResponse(
            $returnCode
        );
    }

    /**
     * @Route(
     *     name="install_plugin_url",
     *     path="/api/installpluginurl",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function installPluginFromUrl(Request $request): JsonResponse
    {
        $returnCode = 0;
        $dataArr = json_decode($request->getContent(), true);
        $this->pluginUrl = $dataArr['uploadurl'];
        $this->setSessionTempDir();
        if($this->setPluginFileFromUrl()) {
            if($this->unzipPluginFile()){
                if($this->validatePluginExtraction()) {
                    if($this->validatePluginConfig()) {
                        $this->setPluginInstallDir();
                        $this->filesystem->mirror($this->tempPluginRootDir, $this->pluginInstallDir);
                        $this->setPluginConfigFile();
                    }
                    else{
                        $returnCode = 5;
                    }
                }
                else{
                    $returnCode = 3;
                }
            }
            else {
                $returnCode = 2;
            }
        }
        else {
            $returnCode = 1;
        }
        $this->deleteSessionTempDir();
        return new JsonResponse(
            $returnCode
        );
    }

    /**
     * @Route(
     *     name="install_local_plugin",
     *     path="/api/installlocalplugin",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function installLocalPlugin(Request $request): JsonResponse
    {
        $returnCode = 0;
        $dataArr = json_decode($request->getContent(), true);
        $this->pluginName = $dataArr['pluginname'];
        $this->tempPluginRootDir = $this->rootDir.'/plugins/'.$this->pluginName;
        $this->pluginInstallDir = $this->rootDir.'/plugins/'.$this->pluginName;
        if($this->filesystem->exists($this->tempPluginRootDir.'/config.json')) {
            if($this->validatePluginConfig()) {
                $this->setPluginConfigFile();
            }
            else{
                $returnCode = 5;
            }
        }
        else{
            $returnCode = 3;
        }
        return new JsonResponse(
            $returnCode
        );
    }

    private function setPluginFileFromUrl(): bool
    {
        $this->pluginFileName = basename($this->pluginUrl);
        $this->filesystem->copy($this->pluginUrl, $this->tempPluginDir.'/'.$this->pluginFileName, true);
        if($this->filesystem->exists($this->tempPluginDir.'/'.$this->pluginFileName)) {
            return true;
        }
        return false;
    }

    private function unzipPluginFile(): bool
    {
        $zip = new ZipArchive;
        if ($zip->open($this->tempPluginDir.'/'.$this->pluginFileName) === true) {
            $zip->extractTo($this->tempPluginDir.'/temp/');
            $zip->close();
            return true;
        }
        return false;
    }

    private function validatePluginExtraction(): bool
    {
        if($this->filesystem->exists($this->tempPluginDir.'/temp/config.json')) {
            $this->tempPluginRootDir = $this->tempPluginDir.'/temp';
            return true;
        }

        $this->finder->depth('== 0')->directories()->in($this->tempPluginDir.'/temp');
        foreach ($this->finder as $folder) {
            $folderName = $folder->getFilename();
            if($this->filesystem->exists($this->tempPluginDir.'/temp/'.$folderName.'/config.json')) {
                $this->tempPluginRootDir = $this->tempPluginDir.'/temp/'.$folderName;
                return true;
            }
        }
        return false;
    }

    private function validatePluginConfig(): bool
    {
        $configContentsJson = file_get_contents($this->tempPluginRootDir.'/config.json');
        $configArr = json_decode($configContentsJson, true);
        if($configArr['name'] && $configArr['title'] && $configArr['version'] && ($configArr['api_namespace'] || $configArr['ui_filename'])) {
            $this->pluginConfigArr = $configArr;
            $this->pluginName = $this->pluginConfigArr['name'];
            $this->pluginInstallDir = $this->rootDir.'/plugins/'.$this->pluginName;
            return true;
        }
        return false;
    }

    private function setPluginConfigFile()
    {
        $newConfigArr = array();
        $databaseExtension = false;
        if($this->pluginFile) {
            $this->pluginConfigArr['source'] = 'upload';
        }
        if($this->pluginUrl) {
            $this->pluginConfigArr['source'] = $this->pluginUrl;
        }
        if($this->filesystem->exists($this->rootDir.'/config/plugin-config.json')) {
            $fileContentsJson = file_get_contents($this->rootDir.'/config/plugin-config.json');
            $configArr = json_decode($fileContentsJson, true);
            foreach($configArr as $i => $pArr) {
                if($pArr['name'] === $this->pluginName) {
                    $this->pluginConfigArr['enabled'] = $pArr['enabled'];
                    $this->pluginUpdate = true;
                }
                else {
                    $newConfigArr[] = $pArr;
                }
            }
            if(!$this->pluginUpdate) {
                $this->pluginConfigArr['enabled'] = false;
            }
            if($this->tempPluginRootDir.'/api/Entity') {
                $databaseExtension = true;
            }
            $this->pluginConfigArr['database_extension'] = $databaseExtension;
            $newConfigArr[] = $this->pluginConfigArr;
            $jsonToSave = json_encode($newConfigArr);
            $this->filesystem->dumpFile($this->rootDir.'/config/plugin-config.json', $jsonToSave);
        }
    }

    private function setMainPluginTempDir()
    {
        if(!$this->filesystem->exists($this->rootDir.'/temp/plugins')) {
            $this->filesystem->mkdir($this->rootDir.'/temp/plugins', 0777);
        }
    }

    private function setSessionTempDir()
    {
        if($this->filesystem->exists($this->rootDir.'/temp/plugins/'.session_id())) {
            $this->filesystem->remove([$this->rootDir.'/temp/plugins/'.session_id()]);
        }
        $this->filesystem->mkdir($this->rootDir.'/temp/plugins/'.session_id(), 0777);
        $this->tempPluginDir = $this->rootDir.'/temp/plugins/'.session_id();
    }

    private function setPluginInstallDir()
    {
        if($this->filesystem->exists($this->pluginInstallDir)) {
            $this->filesystem->remove([$this->pluginInstallDir]);
        }
        $this->filesystem->mkdir($this->pluginInstallDir, 0777);
    }

    private function deleteSessionTempDir()
    {
        if($this->filesystem->exists($this->tempPluginDir)) {
            $this->filesystem->remove([$this->tempPluginDir]);
        }
    }

    private function getPluginConfigArr(): array
    {
        $returnArr = array();
        if($this->filesystem->exists($this->rootDir.'/config/plugin-config.json')) {
            $pluginConfigJson = file_get_contents($this->rootDir.'/config/plugin-config.json');
            $pluginConfigArr = json_decode($pluginConfigJson, true);
            if($pluginConfigArr) {
                foreach($pluginConfigArr as $i => $pArr){
                    $returnArr[$pArr['name']] = $pArr;
                }
            }
        }
        return $returnArr;
    }

    private function removePluginUMDFile()
    {
        $umdFile = $this->pluginConfigArr['ui_filename'];
        if($this->filesystem->exists($this->rootDir.'/src/ui/assets/js/plugins/'.$umdFile)) {
            $this->filesystem->remove([$this->rootDir.'/src/ui/assets/js/plugins/'.$umdFile]);
        }
    }

    private function addPluginUMDFile()
    {
        $umdFile = $this->pluginConfigArr['ui_filename'];
        if($this->filesystem->exists($this->rootDir.'/plugins/'.$this->pluginName.'/bundles/'.$umdFile)) {
            $this->filesystem->copy($this->rootDir.'/plugins/'.$this->pluginName.'/bundles/'.$umdFile, $this->rootDir.'/src/ui/assets/js/plugins/'.$umdFile);
        }
        elseif($this->filesystem->exists($this->rootDir.'/dist/'.$this->pluginName.'/bundles/'.$umdFile)) {
            $this->filesystem->copy($this->rootDir.'/dist/'.$this->pluginName.'/bundles/'.$umdFile, $this->rootDir.'/src/ui/assets/js/plugins/'.$umdFile);
        }
    }

    private function removePluginTranslations()
    {
        $this->finder->files()->in($this->rootDir.'/plugins/'.$this->pluginName.'/i18n');
        if($this->finder->hasResults()) {
            foreach($this->finder as $file) {
                $fileName = $file->getFilename();
                $pluginContentsJson = file_get_contents($this->rootDir.'/plugins/'.$this->pluginName.'/i18n/'.$fileName);
                $pluginArr = json_decode($pluginContentsJson, true);
                $mainContentsJson = file_get_contents($this->rootDir.'/src/ui/assets/i18n/'.$fileName);
                $mainArr = json_decode($mainContentsJson, true);
                $newArr = array_diff($mainArr, $pluginArr);
                if(count($newArr) > 0) {
                    $jsonToSave = json_encode($newArr);
                    $this->filesystem->dumpFile($this->rootDir.'/src/ui/assets/i18n/'.$fileName, $jsonToSave);
                }
                else {
                    $this->filesystem->remove([$this->rootDir.'/src/ui/assets/i18n/'.$fileName]);
                }
            }
        }
    }

    private function addPluginTranslations()
    {
        $this->finder->files()->in($this->rootDir.'/plugins/'.$this->pluginName.'/i18n');
        if($this->finder->hasResults()) {
            foreach($this->finder as $file) {
                $fileName = $file->getFilename();
                if($this->filesystem->exists($this->rootDir.'/src/ui/assets/i18n/'.$fileName)) {
                    $pluginContentsJson = file_get_contents($this->rootDir.'/plugins/'.$this->pluginName.'/i18n/'.$fileName);
                    $pluginArr = json_decode($pluginContentsJson, true);
                    $mainContentsJson = file_get_contents($this->rootDir.'/src/ui/assets/i18n/'.$fileName);
                    $mainArr = json_decode($mainContentsJson, true);
                    $newArr = array_merge($mainArr, $pluginArr);
                    $jsonToSave = json_encode($newArr);
                    $this->filesystem->dumpFile($this->rootDir.'/src/ui/assets/i18n/'.$fileName, $jsonToSave);
                }
                else {
                    $this->filesystem->copy($this->rootDir.'/plugins/'.$this->pluginName.'/i18n/'.$fileName, $this->rootDir.'/src/ui/assets/i18n/'.$fileName);
                }
            }
        }
    }

    private function removePluginFromApiPlatformYaml()
    {
        $newPathsArr = array();
        if($this->filesystem->exists($this->rootDir.'/config/packages/api_platform.yaml')) {
            $apiPlatformYamlContents = Yaml::parseFile($this->rootDir.'/config/packages/api_platform.yaml');
            $pathsArr = $apiPlatformYamlContents['api_platform']['mapping']['paths'];
            $targetPath = '%kernel.project_dir%/plugins/'.$this->pluginName.'/api/Entity';
            foreach($pathsArr as $path){
                if($path !== $targetPath) {
                    $newPathsArr[] = $path;
                }
            }
            $apiPlatformYamlContents['api_platform']['mapping']['paths'] = $newPathsArr;
            $yamlToSave = Yaml::dump($apiPlatformYamlContents);
            $this->filesystem->dumpFile($this->rootDir.'/config/packages/api_platform.yaml', $yamlToSave);
        }
    }

    private function addPluginToApiPlatformYaml()
    {
        if($this->filesystem->exists($this->rootDir.'/config/packages/api_platform.yaml')) {
            $apiPlatformYamlContents = Yaml::parseFile($this->rootDir.'/config/packages/api_platform.yaml');
            $pathsArr = $apiPlatformYamlContents['api_platform']['mapping']['paths'];
            $targetPath = '%kernel.project_dir%/plugins/'.$this->pluginName.'/api/Entity';
            $pathsArr[] = $targetPath;
            $apiPlatformYamlContents['api_platform']['mapping']['paths'] = $pathsArr;
            $yamlToSave = Yaml::dump($apiPlatformYamlContents);
            $this->filesystem->dumpFile($this->rootDir.'/config/packages/api_platform.yaml', $yamlToSave);
        }
    }

    private function removePluginFromDoctrineYaml()
    {
        if($this->filesystem->exists($this->rootDir.'/config/packages/doctrine.yaml')) {
            $doctrineYamlContents = Yaml::parseFile($this->rootDir.'/config/packages/doctrine.yaml');
            $mappingsArr = $doctrineYamlContents['doctrine']['orm']['mappings'];
            unset($mappingsArr[$this->APINamespace]);
            $doctrineYamlContents['doctrine']['orm']['mappings'] = $mappingsArr;
            $yamlToSave = Yaml::dump($doctrineYamlContents);
            $this->filesystem->dumpFile($this->rootDir.'/config/packages/doctrine.yaml', $yamlToSave);
        }
    }

    private function addPluginToDoctrineYaml()
    {
        if($this->filesystem->exists($this->rootDir.'/config/packages/doctrine.yaml')) {
            $doctrineYamlContents = Yaml::parseFile($this->rootDir.'/config/packages/doctrine.yaml');
            $mappingsArr = $doctrineYamlContents['doctrine']['orm']['mappings'];
            $mappingsArr[$this->APINamespace]['is_bundle'] = false;
            $mappingsArr[$this->APINamespace]['type'] = 'annotation';
            $mappingsArr[$this->APINamespace]['dir'] = '%kernel.project_dir%/plugins/'.$this->pluginName.'/api/Entity';
            $mappingsArr[$this->APINamespace]['prefix'] = $this->APINamespace.'\Entity';
            $mappingsArr[$this->APINamespace]['alias'] = $this->APINamespace;
            $doctrineYamlContents['doctrine']['orm']['mappings'] = $mappingsArr;
            $yamlToSave = Yaml::dump($doctrineYamlContents);
            $this->filesystem->dumpFile($this->rootDir.'/config/packages/doctrine.yaml', $yamlToSave);
        }
    }

    private function removePluginFromComposerJson()
    {
        if($this->filesystem->exists($this->rootDir.'/plugin-composer.json')) {
            $fileContentsJson = file_get_contents($this->rootDir.'/plugin-composer.json');
            $composerArr = json_decode($fileContentsJson, true);
            $psr4Arr = $composerArr['autoload']['psr-4'];
            $targetIndex = $this->APINamespace.'\\';
            unset($psr4Arr[$targetIndex]);
            $composerArr['autoload']['psr-4'] = $psr4Arr;
            $jsonToSave = json_encode($composerArr);
            $this->filesystem->dumpFile($this->rootDir.'/plugin-composer.json', $jsonToSave);
        }
    }

    private function addPluginToComposerJson()
    {
        if($this->filesystem->exists($this->rootDir.'/plugin-composer.json')) {
            $fileContentsJson = file_get_contents($this->rootDir.'/plugin-composer.json');
            $composerArr = json_decode($fileContentsJson, true);
            $psr4Arr = $composerArr['autoload']['psr-4'];
            $targetIndex = $this->APINamespace.'\\';
            $targetValue = 'plugins/'.$this->pluginName.'/api/';
            $psr4Arr[$targetIndex] = $targetValue;
            $composerArr['autoload']['psr-4'] = $psr4Arr;
            $jsonToSave = json_encode($composerArr);
            $this->filesystem->dumpFile($this->rootDir.'/plugin-composer.json', $jsonToSave);
        }
    }

    private function disablePluginInConfig()
    {
        $newConfigArr = array();
        if($this->filesystem->exists($this->rootDir.'/config/plugin-config.json')) {
            $fileContentsJson = file_get_contents($this->rootDir.'/config/plugin-config.json');
            $configArr = json_decode($fileContentsJson, true);
            if($configArr) {
                foreach($configArr as $i => $pArr){
                    if($pArr['name'] === $this->pluginName) {
                        $pArr['enabled'] = false;
                    }
                    $newConfigArr[] = $pArr;
                }
            }
            $jsonToSave = json_encode($newConfigArr);
            $this->filesystem->dumpFile($this->rootDir.'/config/plugin-config.json', $jsonToSave);
        }
    }

    private function enablePluginInConfig()
    {
        $newConfigArr = array();
        if($this->filesystem->exists($this->rootDir.'/config/plugin-config.json')) {
            $fileContentsJson = file_get_contents($this->rootDir.'/config/plugin-config.json');
            $configArr = json_decode($fileContentsJson, true);
            if($configArr) {
                foreach($configArr as $i => $pArr){
                    if($pArr['name'] === $this->pluginName) {
                        $pArr['enabled'] = true;
                    }
                    $newConfigArr[] = $pArr;
                }
            }
            $jsonToSave = json_encode($newConfigArr);
            $this->filesystem->dumpFile($this->rootDir.'/config/plugin-config.json', $jsonToSave);
        }
    }

}
