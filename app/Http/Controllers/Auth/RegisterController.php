<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Mail;


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
    protected $redirectTo = '/';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|max:255|unique:users',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'image' => 'image',

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
        if(isset($data['image']) != null)
        {
            $featured = $data['image'];
            $featured_new_name = time().str_replace(' ', '', $featured->getClientOriginalName());
            $featured->move('uploads' , $featured_new_name);

            $image =  '/uploads/' . $featured_new_name;
        }else
        {
            $image =  '/uploads/logo.png';
        }
        

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'mobile' => $data['mobile'],
            'country' => $data['country'],
            'city' => $data['city'],
            'image' => $image,
        ]);

        $name = $user->name;
        $email = $user->email;

        $sent = Mail::send('emailWelcome', ['name' => $name, 'email' => $email ], function ($message) use ($email)
        {

            $message->from('no-replay@ksatranslators.com' , 'no-replay Translation');

            $message->to($email,$name = null);

            $message->subject("أهلا ومرحباً بكم في موقعنا");

        });

        Session::flash('success-toastr', Lang::get('main.success_register'));
        return $user;
    }
}
