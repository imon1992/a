<?php

use TinyURL\DbUsers\DbUserInterface;

class AuthController extends BaseController
{

    protected $register;

    public function __construct(DbUserInterface $register)
    {
        $this->register = $register;
    }

    public function getLogin()
    {
        if(Auth::check())
            return Redirect::to('/');
        return View::make('auth.login');
    }

    public function postLogin()
    {
        $rules = array('email'=>'required|email',
            'password'=>'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            $failMessage = $validator->messages();

            return Redirect::to('auth/login')->withErrors($failMessage);
        }else {

            $data = array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            );
            if (Auth::attempt($data))
            {
                return Redirect::intended('/url');
            }else{

                return Redirect::to('auth/login')->withErrors(['wrong'=>'wrong email or pass']);
            }
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function getRegister()
    {
        return View::make('register.register');
    }

    public function postRegister()
    {
        $rules = array('name' => 'required',
            'email'=>'required|email',
            'password'=>'confirmed|required',
            'password_confirmation'=>"required"
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            $trueValue = array_diff_key(Input::all(), $validator->failed());

            foreach($trueValue as $key=>$val)
            {
                Session::flash($key,$val);
            }

            Session::reflash();

            $failMessage = $validator->messages();

            return Redirect::to('auth/register')->withErrors($failMessage);
        }else
        {
            $this->register->registerNewUser(Input::get('name'),
                                            Input::get('email'),
                                            Input::get('password')
                                        );
            return Redirect::to('auth/login');
        }
    }
}

