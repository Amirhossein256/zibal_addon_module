<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class main extends mainController
{
    public function index()
    {
        $userCount = Capsule::table('zibal_users')->count();
        $this->render('index', ['userCount' => $userCount]);
    }
}