<?php

use Amirhossein256\Zibal\Clients\ZibalApi;
use Illuminate\Database\Capsule\Manager as Capsule;

class authentication extends mainController
{
    public function authenticate()
    {
        //todo
        $authService = Capsule::table('zibal_settings')->where('key', 'authService')->first();
        if ($authService->value == 'shahkarInquiry') {
            $national_id = $_POST['national_id'];
            $mobile = $_POST['mobile'];
            if (isset($mobile) && isset($national_id)) {
                $token = Capsule::table('tbladdonmodules')->where('module', 'zibal')
                    ->where('setting', 'accessToken')->first()->value;
                $api = new ZibalApi('ss');
                $response = $api->checkNationalCodeAndMobile($national_id, $mobile);
                if ($response->result == 1){
                    Capsule::table('zibal_users')->create([
                        'user_id' => '',
                        'full_name' => '',
                        'national_code' => '',
                        'mobile' => '',
                        'birthday' => '',
                        'verify' => 1,
                    ]);
                    $this->response($response, '422');
                }
            } else {
                $this->response(['status' => 'failed', 'msg' => 'مقدار های ورودی نمیتوانند خالی باشند'], '422');
            }
        } else {
            $birthdate = $_POST['birthdate'];
            $national_id = $_POST['national_id'];
            if (isset($birthdate) && isset($national_id)) {
                $token = Capsule::table('tbladdonmodules')->where('module', 'zibal')
                    ->where('setting', 'accessToken')->first()->value;
                $api = new ZibalApi('sas');
                $response = $api->checkNationalCodeAndBirthdate($national_id, $birthdate);
                if ($response->result == 1){
                    Capsule::table('zibal_users')->create([
                       'user_id' => '',
                       'full_name' => '',
                       'national_code' => '',
                       'mobile' => '',
                       'birthday' => '',
                       'verify' => 1,
                    ]);
                    $this->response($response, '422');
                }
            } else {
                $this->response(['status' => 'failed', 'msg' => 'مقدار های ورودی نمیتوانند خالی باشند'], '422');
            }

        }
        //api call if authenticate add to our database
    }

    public function authenticateShahkarInquiry()
    {
        if (isset($_POST['mobile']) &&
            isset($_POST['national_id']) &&
            isset($_POST['birthdate']))
            //api call if authenticate add to our database
            var_dump($_POST);
        die();
    }

}