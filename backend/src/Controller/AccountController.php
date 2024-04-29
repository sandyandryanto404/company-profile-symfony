<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends BaseController
{
    private $userRepo;
    private $passwordHasherFactory;

    public function __construct(
        UserRepository $user,
        PasswordHasherFactoryInterface $hasherFactory
    ){
        $this->userRepo = $user;
        $this->passwordHasherFactory = $hasherFactory;
    }

    #[Route('api/account/profile', methods: ["GET"], name: 'account_profile_detail')]
    public function detailProfile()
    {
        $user = $this->getUser();
        $user = $this->responseData($user);
        return $this->respondWithSuccess("ok", [], ["data"=> $user]);
    }

    #[Route('api/account/upload', methods: ["POST"], name: 'account_profile_upload')]
    public function upload(Request $request)
    {
        $user = $this->getUser();
        $image = $user->getImage();

        if(isset(($_FILES["file"]["name"]))){
            
        }

        return $this->respondWithSuccess("Yor profile picture has been changed !!", [], ["image"=> $image]);
    }

    #[Route('api/account/profile', methods: ["POST"], name: 'account_profile_update')]
    public function updateProfile(Request $request)
    {
        $request = $this->transformJsonBody($request);
        $user = $this->getUser();

        $id = $user->getId();
        $email = $request->get("email");
        $phone = $request->get("phone");
        $first_name = $request->get("first_name");
        $last_name = $request->get("last_name");
        $gender = $request->get("gender");
        $country = $request->get("country");
        $address = $request->get("address");
        $about_me = $request->get("about_me");

        $checkUserEmail =  $this->userRepo->findByValidation('email', $email, $id);
        $checkUserPhone  = $this->userRepo->findByValidation('phone', $phone, $id);

        if(!is_null($checkUserEmail)){
            $this->setStatusCode(400);
            return $this->respondWithErrors("The email address has already been taken.!");
        }

        if(!is_null($checkUserPhone)){
            $this->setStatusCode(400);
            return $this->respondWithErrors("The phone number has already been taken.!");
        }

        $user->setFirstName($first_name);
        $user->setLastName($last_name);
        $user->setGender($gender);
        $user->setCountry($country);
        $user->setAddress($address);
        $user->setAboutMe($about_me);
        $user->setEmail($email);
        $user->setPhone($phone);
        $this->userRepo->saveOrUpdate($user);

        return $this->respondWithSuccess("Yor profile has been changed !!");

    }

    #[Route('api/account/password', methods: ["POST"], name: 'account_password_update')]
    public function updatePassword(Request $request)
    {
        $request = $this->transformJsonBody($request);
        $user = $this->getUser();
        $current_password = $request->get('current_password');
        $password = $request->get("password");

        $hasher = $this->passwordHasherFactory->getPasswordHasher(User::class);
        $validPassword = $hasher->verify($user->getPassword(), $current_password);

        if(!$validPassword){
            $this->setStatusCode(400);
            return $this->respondWithErrors("Incorrect current password please try again !!");
        }

        $hash = $hasher->hash($password);
        $user->setPassword($hash);
        $this->userRepo->saveOrUpdate($user);
        return $this->respondWithSuccess("Your password has been reset!");

    }

}