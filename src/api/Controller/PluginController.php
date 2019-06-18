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

class PluginController extends AbstractController
{
    private $em;
    private $params;

    public function __construct(
        EntityManagerInterface $em,
        ParameterBagInterface $params
    )
    {
        $this->em = $em;
        $this->params = $params;
    }

    /**
     * @Route(
     *     name="plugin_configurations",
     *     path="/api/pluginconfigurations",
     *     methods={"GET"}
     * )
     */
    public function getPluginConfigurations()
    {
        $fileContents = '';
        $rootDir = $this->params->get('kernel.project_dir');
        if(file_exists($rootDir.'/config/plugin-config.json')) {
            $fileContents = file_get_contents($rootDir.'/config/plugin-config.json');
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
    public function getPluginRegistry()
    {
        $fileContents = '';
        $rootDir = $this->params->get('kernel.project_dir');
        if(file_exists($rootDir.'/symbiota2-plugin-registry.json')) {
            $fileContents = file_get_contents($rootDir.'/symbiota2-plugin-registry.json');
        }

        return new Response($fileContents);
    }

    /**
     * @Route(
     *     name="disable_plugins",
     *     path="/api/disableplugins",
     *     methods={"POST"}
     * )
     */
    public function disablePlugins(Request $request)
    {
        $rootDir = $this->params->get('kernel.project_dir');
        $dataArr = json_decode($request->getContent(), true);
        $pluginArr = $dataArr['plugins'];
        $pluginConfigArr = $this->getPluginConfigArr($rootDir);
        if($pluginConfigArr) {
            foreach($pluginArr as $plugin){
                $pluginConfigData = $pluginConfigArr[$plugin];
                if(isset($pluginConfigData['api_namespace'])) {
                    $apiNamespace = $pluginConfigData['api_namespace'];
                    $this->removePluginFromApiPlatformYaml($plugin,$rootDir);
                    $this->removePluginFromDoctrineYaml($apiNamespace,$rootDir);
                    $this->removePluginFromComposerJson($apiNamespace,$rootDir);
                }
                $this->disablePluginInConfig($plugin,$rootDir);
            }
        }
        return new JsonResponse(
            true
        );
    }

    /**
     * @Route(
     *     name="enable_plugins",
     *     path="/api/enableplugins",
     *     methods={"POST"}
     * )
     */
    public function enablePlugins(Request $request)
    {
        $rootDir = $this->params->get('kernel.project_dir');
        $dataArr = json_decode($request->getContent(), true);
        $pluginArr = $dataArr['plugins'];
        $pluginConfigArr = $this->getPluginConfigArr($rootDir);
        if($pluginConfigArr) {
            foreach($pluginArr as $plugin){
                $pluginConfigData = $pluginConfigArr[$plugin];
                if(isset($pluginConfigData['api_namespace'])) {
                    $apiNamespace = $pluginConfigData['api_namespace'];
                    $this->addPluginToApiPlatformYaml($plugin,$rootDir);
                    $this->addPluginToDoctrineYaml($plugin,$apiNamespace,$rootDir);
                    $this->addPluginToComposerJson($plugin,$apiNamespace,$rootDir);
                }
                $this->enablePluginInConfig($plugin,$rootDir);
            }
        }
        return new JsonResponse(
            true
        );
    }

    private function getPluginConfigArr($rootDir)
    {
        $returnArr = array();
        if(file_exists($rootDir.'/config/plugin-config.json')) {
            $pluginConfigJson = file_get_contents($rootDir.'/config/plugin-config.json');
            $pluginConfigArr = json_decode($pluginConfigJson, true);
            if($pluginConfigArr) {
                foreach($pluginConfigArr as $i => $pArr){
                    $returnArr[$pArr['plugin']] = $pArr;
                }
            }
        }
        return $returnArr;
    }

    private function removePluginFromApiPlatformYaml($plugin,$rootDir)
    {
        $newPathsArr = array();
        if(file_exists($rootDir.'/config/packages/api_platform.yaml')) {
            $apiPlatformYamlContents = Yaml::parseFile($rootDir.'/config/packages/api_platform.yaml');
            $pathsArr = $apiPlatformYamlContents['api_platform']['mapping']['paths'];
            $targetPath = '%kernel.project_dir%/plugins/'.$plugin.'/api/Entity';
            foreach($pathsArr as $path){
                if($path != $targetPath) {
                    $newPathsArr[] = $path;
                }
            }
            $apiPlatformYamlContents['api_platform']['mapping']['paths'] = $newPathsArr;
            $yamlToSave = Yaml::dump($apiPlatformYamlContents);
            file_put_contents($rootDir.'/config/packages/api_platform.yaml', $yamlToSave);
        }
    }

    private function addPluginToApiPlatformYaml($plugin,$rootDir)
    {
        if(file_exists($rootDir.'/config/packages/api_platform.yaml')) {
            $apiPlatformYamlContents = Yaml::parseFile($rootDir.'/config/packages/api_platform.yaml');
            $pathsArr = $apiPlatformYamlContents['api_platform']['mapping']['paths'];
            $targetPath = '%kernel.project_dir%/plugins/'.$plugin.'/api/Entity';
            $pathsArr[] = $targetPath;
            $apiPlatformYamlContents['api_platform']['mapping']['paths'] = $pathsArr;
            $yamlToSave = Yaml::dump($apiPlatformYamlContents);
            file_put_contents($rootDir.'/config/packages/api_platform.yaml', $yamlToSave);
        }
    }

    private function removePluginFromDoctrineYaml($apiNamespace,$rootDir)
    {
        if(file_exists($rootDir.'/config/packages/doctrine.yaml')) {
            $doctrineYamlContents = Yaml::parseFile($rootDir.'/config/packages/doctrine.yaml');
            $mappingsArr = $doctrineYamlContents['doctrine']['orm']['mappings'];
            unset($mappingsArr[$apiNamespace]);
            $doctrineYamlContents['doctrine']['orm']['mappings'] = $mappingsArr;
            $yamlToSave = Yaml::dump($doctrineYamlContents);
            file_put_contents($rootDir.'/config/packages/doctrine.yaml', $yamlToSave);
        }
    }

    private function addPluginToDoctrineYaml($plugin,$apiNamespace,$rootDir)
    {
        if(file_exists($rootDir.'/config/packages/doctrine.yaml')) {
            $doctrineYamlContents = Yaml::parseFile($rootDir.'/config/packages/doctrine.yaml');
            $mappingsArr = $doctrineYamlContents['doctrine']['orm']['mappings'];
            $mappingsArr[$apiNamespace]['is_bundle'] = false;
            $mappingsArr[$apiNamespace]['type'] = 'annotation';
            $mappingsArr[$apiNamespace]['dir'] = '%kernel.project_dir%/plugins/'.$plugin.'/api/Entity';
            $mappingsArr[$apiNamespace]['prefix'] = $apiNamespace.'\Entity';
            $mappingsArr[$apiNamespace]['alias'] = $apiNamespace;
            $doctrineYamlContents['doctrine']['orm']['mappings'] = $mappingsArr;
            $yamlToSave = Yaml::dump($doctrineYamlContents);
            file_put_contents($rootDir.'/config/packages/doctrine.yaml', $yamlToSave);
        }
    }

    private function removePluginFromComposerJson($apiNamespace,$rootDir)
    {
        if(file_exists($rootDir.'/plugin-composer.json')) {
            $fileContentsJson = file_get_contents($rootDir.'/plugin-composer.json');
            $composerArr = json_decode($fileContentsJson, true);
            $psr4Arr = $composerArr['autoload']['psr-4'];
            $targetIndex = $apiNamespace.'\\';
            unset($psr4Arr[$targetIndex]);
            $composerArr['autoload']['psr-4'] = $psr4Arr;
            $jsonToSave = json_encode($composerArr);
            file_put_contents($rootDir.'/plugin-composer.json', $jsonToSave);
        }
    }

    private function addPluginToComposerJson($plugin,$apiNamespace,$rootDir)
    {
        if(file_exists($rootDir.'/plugin-composer.json')) {
            $fileContentsJson = file_get_contents($rootDir.'/plugin-composer.json');
            $composerArr = json_decode($fileContentsJson, true);
            $psr4Arr = $composerArr['autoload']['psr-4'];
            $targetIndex = $apiNamespace.'\\';
            $targetValue = 'plugins/'.$plugin.'/api/';
            $psr4Arr[$targetIndex] = $targetValue;
            $composerArr['autoload']['psr-4'] = $psr4Arr;
            $jsonToSave = json_encode($composerArr);
            file_put_contents($rootDir.'/plugin-composer.json', $jsonToSave);
        }
    }

    private function disablePluginInConfig($plugin,$rootDir)
    {
        $newConfigArr = array();
        if(file_exists($rootDir.'/config/plugin-config.json')) {
            $fileContentsJson = file_get_contents($rootDir.'/config/plugin-config.json');
            $configArr = json_decode($fileContentsJson, true);
            if($configArr) {
                foreach($configArr as $i => $pArr){
                    if($pArr['plugin'] == $plugin) {
                        $pArr['enabled'] = false;
                    }
                    $newConfigArr[] = $pArr;
                }
            }
            $jsonToSave = json_encode($newConfigArr);
            file_put_contents($rootDir.'/config/plugin-config.json', $jsonToSave);
        }
    }

    private function enablePluginInConfig($plugin,$rootDir)
    {
        $newConfigArr = array();
        if(file_exists($rootDir.'/config/plugin-config.json')) {
            $fileContentsJson = file_get_contents($rootDir.'/config/plugin-config.json');
            $configArr = json_decode($fileContentsJson, true);
            if($configArr) {
                foreach($configArr as $i => $pArr){
                    if($pArr['plugin'] == $plugin) {
                        $pArr['enabled'] = true;
                    }
                    $newConfigArr[] = $pArr;
                }
            }
            $jsonToSave = json_encode($newConfigArr);
            file_put_contents($rootDir.'/config/plugin-config.json', $jsonToSave);
        }
    }

}
