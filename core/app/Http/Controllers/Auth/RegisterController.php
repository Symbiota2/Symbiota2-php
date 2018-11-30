<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use EntityManager;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:45|unique:App\Entities\User',
            'password' => 'required|string|min:6|max:255|confirmed',
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|string|email|max:100|unique:App\Entities\User',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->setFirstname($data['firstname']);
        $user->setMiddleinitial($data['middleinitial']);
        $user->setLastname($data['lastname']);
        $user->setUsername($data['username']);
        $user->setTitle($data['title']);
        $user->setInstitution($data['institution']);
        $user->setDepartment($data['department']);
        $user->setAddress($data['address']);
        $user->setCity($data['city']);
        $user->setState($data['state']);
        $user->setZip($data['zip']);
        $user->setCountry($data['country']);
        $user->setEmail($data['email']);
        $user->setUrl($data['url']);
        $user->setIspublic($data['ispublic']);
        $user->setPassword(bcrypt($data['password']));
        EntityManager::persist($user);
        EntityManager::flush();
        return $user;
    }
}
