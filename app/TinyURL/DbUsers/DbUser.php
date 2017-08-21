<?php

namespace TinyURL\DbUsers;


class DbUser implements DbUserInterface
{

    public function registerNewUser($name,$email,$password)
    {
        $user = new \User;
        $user->name = $name;
        $user->email = $email;
        $user->password = \Hash::make($password);
        $user->save();
    }
}