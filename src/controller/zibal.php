<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class zibal extends mainController
{

    public function setting()
    {
        if (!empty($_POST)){
            foreach ($_POST as $key=>$value){
                Capsule::table('zibal_settings')->where('key', $key)->update(['value' => $value]);
            }
        }
        $setting = $this->getSetting();
        $this->render('setting', ['setting' => $setting]);
    }

    public function getSetting()
    {
        return Capsule::table('zibal_settings')->pluck('value', 'key');
    }

    public function user()
    {
        $user = Capsule::table('zibal_users')->orderBy('created_at')->get()->toArray();
        $this->render('user', ['user' => $user]);
    }
}