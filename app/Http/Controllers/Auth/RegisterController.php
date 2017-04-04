<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use ReCaptcha\ReCaptcha;

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
        $respone = Input::get('g-recaptcha-response');
        $rempoteip = $_SERVER['REMOTE_ADDR'];
        $secret = '6LePDxsUAAAAAPUj6N-PDZmL1Oyt6iJrA7KoAVbk';

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($respone);

        if($resp->isSuccess()) {
            $data['captcha'] = 1;
        }
        else {
            $data['captcha'] = 0;
        }

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required',
            'captcha' => 'required|min:1',
        ],
        [
            'g-recaptcha-response.required' => 'Captcha is required',
            'captcha.min' => 'Bad captcha! Buahhahahaha!',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'], // TODO: example
            'password' => bcrypt($data['password']),
        ]);
    }
}
