<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Helper\MyHelper;

class AuthController extends BaseController
{
    private $userRepo;
    private $jwtManager;
    private $passwordHasherFactory;

    public function __construct(
        UserRepository $user,
        JWTTokenManagerInterface $jwtManager, 
        PasswordHasherFactoryInterface $hasherFactory
    ){
        $this->userRepo = $user;
        $this->jwtManager = $jwtManager;
        $this->passwordHasherFactory = $hasherFactory;
    }

    #[Route('api/auth/login', methods: ["POST"], name: 'auth_login')]
    public function login(Request $request) : JsonResponse 
    {
        $request = $this->transformJsonBody($request);
        $email = $request->get('email');
        $password = $request->get('password');
        $remember = $request->get("remember");
        
        $user = $this->userRepo->findByEmail($email);

        if(is_null($user)){
            $this->setStatusCode(401);
            return $this->respondWithErrors("Your login credentials don't match an account in our system.");
        }

        $status = (int) $user->getStatus();
        $hasher = $this->passwordHasherFactory->getPasswordHasher(User::class);
        $validPassword = $hasher->verify($user->getPassword(), $password);
        $user_id = $user->getId();

        if($status == 0){
            $this->setStatusCode(400);
            return $this->respondWithErrors("You need to confirm your account. We have sent you an activation code, please check your email.");
        }

        if(!$validPassword){
            $this->setStatusCode(400);
            return $this->respondWithErrors("That's an invalid password.");
        }

        $timeout = $this->getParameter('lexik_jwt_authentication.token_ttl'); 
        $startTime = date("Y-m-d H:i:s");
        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$timeout.' seconds',strtotime($startTime)));       
        $token = $this->jwtManager->create($user);
        return $this->response(["token"=> $token, "expired_at"=> $cenvertedTime]);

    }

    #[Route('api/auth/register', methods: ["POST"], name: 'auth_register')]
    public function register(Request $request) : JsonResponse 
    {
        $request = $this->transformJsonBody($request);
        $email = $request->get('email');
        $password = $request->get('password');

        $user = $this->userRepo->findByEmail($email);

        if(!is_null($user)){
            $this->setStatusCode(400);
            return $this->respondWithErrors("The email address has already been taken.");
        }

        $passwordHasher = $this->passwordHasherFactory->getPasswordHasher(User::class);
        $hash = $passwordHasher->hash($password);
        $token = MyHelper::genUUID();
        $token = md5($token);

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($hash);
        $user->setStatus(0);
        $user->setConfirmToken($token);
        $user->setRoles(["ROLE_USER"]);
        $this->userRepo->saveOrUpdate($user);

        return $this->respondWithSuccess("You need to confirm your account. We have sent you an activation code, please check your email.", [], ["token"=> $token]);
    }

    #[Route('api/auth/confirm/{token}', methods: ["GET"], name: 'auth_confirm')]
    public function confirm(string $token) : JsonResponse 
    {
        $user = $this->userRepo->findByConfirmToken($token);

        if(is_null($user)){
            $this->setStatusCode(400);
            return $this->respondWithErrors("We can't find a user with that  token is invalid.!");
        }
      
        $status = (int) $user->getStatus();

        if($status == 1){
            return $this->respondWithSuccess("Your e-mail is already verified. You can now login.");
        }else{
            $user->setStatus(1);
            $this->userRepo->saveOrUpdate($user);
            return $this->respondWithSuccess("Your e-mail is verified. You can now login.");
        }

    }

    #[Route('api/auth/email/forgot', methods: ["POST"], name: 'auth_email_forgot')]
    public function forgot(Request $request) : JsonResponse 
    {
        $request = $this->transformJsonBody($request);
        $email = $request->get('email');

        $user = $this->userRepo->findByEmail($email);
        if(is_null($user)){
            $this->setStatusCode(400);
            return $this->respondWithErrors("We can't find a user with that e-mail address or password reset token is invalid.!");
        }

        $token = MyHelper::genUUID();
        $token = md5($token);
        $user->setResetToken($token);
        $this->userRepo->saveOrUpdate($user);
        return $this->respondWithSuccess("We have e-mailed your password reset link!", [], ["token"=> $token]);
    }

    #[Route('api/auth/email/reset/{token}', methods: ["POST"], name: 'auth_email_reset')]
    public function reset($token, Request $request) : JsonResponse 
    {
        $request = $this->transformJsonBody($request);
        $email = $request->get('email');
        $password = $request->get('password');

        $user = $this->userRepo->findByEmail($email);
        if(is_null($user)){
            $this->setStatusCode(400);
            return $this->respondWithErrors("We can't find a user with that e-mail address or password reset token is invalid.!");
        }

        if($user->getResetToken() != $token){
            $this->setStatusCode(400);
            return $this->respondWithErrors("We can't find a user with that  token is invalid.!");
        }

        $passwordHasher = $this->passwordHasherFactory->getPasswordHasher(User::class);
        $hash = $passwordHasher->hash($password);
        $user->setPassword($hash);
        $user->setResetToken(null);
        $this->userRepo->saveOrUpdate($user);
        return $this->respondWithSuccess("Your password has been reset!");

    }

}