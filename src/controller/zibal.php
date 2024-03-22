<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class zibal extends mainController
{
    public function setting()
    {

        $setting = $this->getSetting();
        $this->render('setting', ['setting' => $setting]);
    }

    public function settingUpdate()
    {
        if (!empty($_POST)){
            foreach ($_POST as $key=>$value){
                Capsule::table('zibal_settings')->where('key', $key)->update(['value' => $value]);
            }


        }else{
            $this->response('اطلاعات وارد شده صحبح نمیباشد','422');
        }
        $setting = $this->getSetting();
        $this->render('setting', ['setting' => $setting]);
    }

    public function getSetting()
    {
        return Capsule::table('zibal_settings')->pluck('value', 'key');
    }
}