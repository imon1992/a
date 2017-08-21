<?php
namespace TinyURL\DbUsers;

use illuminate\Support\ServiceProvider;

class TinyURLDbUsersProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('\TinyURL\DbUsers\DbUserInterface', '\TinyURL\DbUsers\DbUser');
    }

}