<?php

namespace TinyURL\DbUsers;

interface DbUserInterface
{
    public function registerNewUser($name,$email,$password);

}