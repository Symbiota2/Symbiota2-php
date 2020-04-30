<?php

namespace Core\Controller;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Core\Service\MailerService;

class UserController extends AbstractController
{
    private const KEY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    private $em;
    private $tokenStorage;
    private $userPasswordEncoder;
    private $tokenManager;
    private $mailer;

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $userPasswordEncoder,
        MailerService $mailer,
        JWTTokenManagerInterface $tokenManager,
        TokenStorageInterface $tokenStorage
    )
    {
        $this->em = $em;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->tokenStorage = $tokenStorage;
        $this->tokenManager = $tokenManager;
        $this->mailer = $mailer;
    }

    /**
     * @Route(
     *     name="authenticated_user",
     *     path="/api/users/authuser",
     *     methods={"GET"}
     * )
     */
    public function getAuthenticatedUser(): JsonResponse
    {
        $permissionArr = array();
        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if (!$token || !$user instanceof Users || !$token->isAuthenticated()) {
            return new JsonResponse([]);
        }

        $userId = $user->getId();

        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$userId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $permissionArr[$row[0]->getRole()][] = $row[0]->getTableId();
        }

        return new JsonResponse([
            'id' => $userId,
            'firstName' => $user->getFirstName(),
            'permissions' => $permissionArr,
            'maintainLogin' => $user->getMaintainLogin(),
            'tokenExpire' => $user->getTokenExpiration()
        ]);
    }

    /**
     * @Route(
     *     name="verify_user",
     *     path="/api/users/{id}/verify/{token}",
     *     methods={"GET"}
     * )
     * @param $id
     * @param $token
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function verifyUser($id,$token)
    {
        $repository = $this->em->getRepository(Users::class);
        $user = $repository->find($id);

        if(!$user instanceof Users) {
            return new JsonResponse([]);
        }

        $userToken = $user->getVerificationToken();

        if($token === $userToken) {
            $user->setVerified(1);
            $user->setVerificationToken(null);
            $this->em->flush();
        }

        return $this->redirect($_SERVER['SERVER_NAME']);
    }

    /**
     * @Route(
     *     name="reset_password",
     *     path="/api/users/resetpassword",
     *     methods={"POST"}
     * )
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function resetUserPassword(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $username = $data['username'];
        $repository = $this->em->getRepository(Users::class);
        $user = $repository->findOneBy(['username' => $username]);

        if(!$user instanceof Users) {
            return new JsonResponse([
                'result' => false
            ]);
        }

        $newPassword = '';
        $maxNumber = strlen(self::KEY);

        for($i = 0; $i < 12; $i++) {
            $newPassword .= self::KEY[random_int(0, $maxNumber - 1)];
        }

        $user->setPassword(
            $this->userPasswordEncoder->encodePassword(
                $user, $newPassword
            )
        );

        $user->setPasswordChangeDate(time());
        $this->em->flush();
        $this->mailer->sendPasswordResetEmail($user, $newPassword);
        return new JsonResponse([
            'result' => true
        ]);
    }

    /**
     * @Route(
     *     name="retrieve_login",
     *     path="/api/users/retrievelogin",
     *     methods={"POST"}
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function retrieveUserLogin(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $repository = $this->em->getRepository(Users::class);
        $user = $repository->findOneBy(['email' => $email]);

        if(!$user instanceof Users) {
            return new JsonResponse([
                'result' => false
            ]);
        }

        $this->mailer->sendRetrieveLoginEmail($user);
        return new JsonResponse([
            'result' => true
        ]);
    }

    /**
     * @Route(
     *     name="logout_user",
     *     path="/api/logout",
     *     methods={"GET"}
     * )
     */
    public function logoutUser(): Response
    {
        $res = new Response();
        $res->headers->clearCookie('BEARER');
        $res->send();
        return $res;
    }

    /**
     * @Route(
     *     name="check_user_username",
     *     path="/api/users/checkusername/{username}",
     *     methods={"GET"}
     * )
     * @param $username
     * @return JsonResponse
     */
    public function checkUsername($username): JsonResponse
    {
        $in_use = false;
        $userId = 0;

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if ($token && $user instanceof Users) {
            $userId = $user->getId();
        }

        $repository = $this->em->getRepository(Users::class);
        $result = $repository->findOneBy(['username' => $username]);

        if ($result && ($result->getId() !== $userId)) {
            $in_use = true;
        }

        return new JsonResponse([
            'in_use' => $in_use
        ]);
    }

    /**
     * @Route(
     *     name="check_user_email",
     *     path="/api/users/checkemail/{email}",
     *     methods={"GET"}
     * )
     * @param $email
     * @return JsonResponse
     */
    public function checkEmail($email): JsonResponse
    {
        $in_use = false;
        $userId = 0;

        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if ($token && $user instanceof Users) {
            $userId = $user->getId();
        }

        $repository = $this->em->getRepository(Users::class);
        $result = $repository->findOneBy(['email' => $email]);

        if ($result && ($result->getId() !== $userId)) {
            $in_use = true;
        }

        return new JsonResponse([
            'in_use' => $in_use
        ]);
    }

    /**
     * @Route(
     *     name="login_as_user",
     *     path="/api/users/loginas",
     *     methods={"POST"}
     * )
     * @IsGranted("SuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function loginAsUser(Request $request): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);
        $username = $requestData['username'];
        $repository = $this->em->getRepository(Users::class);
        $user = $repository->findOneBy(['username' => $username]);

        if(!$user instanceof Users) {
            return new JsonResponse([
                false
            ]);
        }

        $res = new Response();
        $res->headers->clearCookie('BEARER');
        $res->send();

        $permissionArr = array();
        $data = array();
        $userId = $user->getId();
        $maintainLogin = 0;
        $cookieExp = 9000;
        $token = $this->tokenManager->create($user);
        $baseUrl = $request->getBaseUrl();

        $cookie = new Cookie(
            'BEARER',
            $token,
            time() + $cookieExp,
            '',
            $baseUrl
        );

        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$userId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $permissionArr[$row[0]->getRole()][] = $row[0]->getTableId();
        }

        $data['id'] = $userId;
        $data['firstName'] = $user->getFirstName();
        $data['permissions'] = $permissionArr;
        $data['maintainLogin'] = $maintainLogin;
        $data['tokenExpire'] = $cookieExp;

        $response = new JsonResponse(
            $data
        );

        $response->headers->setCookie($cookie);
        return $response;
    }
}
