<?php

namespace Core\Controller;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Core\Service\MailerService;

class UserController extends AbstractController
{
    private const KEY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    private $em;
    private $tokenStorage;
    private $userPasswordEncoder;
    private $mailer;

    public function __construct(
        EntityManagerInterface $em,
        UserPasswordEncoderInterface $userPasswordEncoder,
        MailerService $mailer,
        TokenStorageInterface $tokenStorage
    )
    {
        $this->em = $em;
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->tokenStorage = $tokenStorage;
        $this->mailer = $mailer;
    }

    /**
     * @Route(
     *     name="authenticated_user",
     *     path="/api/users/authuser",
     *     methods={"GET"}
     * )
     */
    public function getAuthenticatedUser()
    {
        $permissionArr = array();
        $token = $this->tokenStorage->getToken();
        $user = $token->getUser();

        if (!$token || !$token->isAuthenticated() || !$user instanceof Users) {
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
     */
    public function verifyUser($id,$token)
    {
        $repository = $this->em->getRepository('Core\Entity\Users');
        $user = $repository->find($id);

        if(!$user instanceof Users) {
            return new JsonResponse([]);
        }

        $userToken = $user->getVerificationToken();

        if($token == $userToken) {
            $user->setVerified(1);
            $user->setVerificationToken(null);
            $this->em->flush();
        }

        return $this->redirect('http://localhost:4200');
    }

    /**
     * @Route(
     *     name="reset_password",
     *     path="/api/users/resetpassword",
     *     methods={"POST"}
     * )
     */
    public function resetUserPassword(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $username = $data['username'];
        $repository = $this->em->getRepository('Core\Entity\Users');
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
     */
    public function retrieveUserLogin(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $repository = $this->em->getRepository('Core\Entity\Users');
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
    public function logoutUser()
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
     */
    public function checkUsername($username)
    {
        $repository = $this->em->getRepository('Core\Entity\Users');
        $result = $repository->findBy(['username' => $username]);

        if (!$result) {
            return new JsonResponse([
                'available' => false
            ]);
        }

        return new JsonResponse([
            'available' => true
        ]);
    }

    /**
     * @Route(
     *     name="check_user_email",
     *     path="/api/users/checkemail/{email}",
     *     methods={"GET"}
     * )
     */
    public function checkEmail($email)
    {
        $repository = $this->em->getRepository('Core\Entity\Users');
        $result = $repository->findBy(['email' => $email]);

        if (!$result) {
            return new JsonResponse([
                'available' => false
            ]);
        }

        return new JsonResponse([
            'available' => true
        ]);
    }
}
