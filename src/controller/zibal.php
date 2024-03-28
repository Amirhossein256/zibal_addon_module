<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Carbon;

class zibal extends mainController
{

    public function setting()
    {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
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

    public function manualAuth()
    {
        if (isset($_POST['code']) && isset($_POST['phone_number']) && isset($_POST['id'])) {
            $code = $_POST['code'];
            $mobile = $_POST['phone_number'];
            $id = $_POST['id'];

            $command = 'GetClientsDetails';
            $postData = array(
                'clientid' => $id,
                'stats' => true,
            );

            $results = localAPI($command, $postData);
            Capsule::table('zibal_users')->insert([
                'user_id' => $id,
                'full_name' => $results['client']['fullname'],
                'national_code' => $code,
                'birthday' => null,
                'mobile' => $mobile,
                'verify' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return $this->response(['result' => 'success'], 200);

        } else {
            return $this->response(['result' => 'fail', 'msg' => 'لطفا فیلد مورد نظر را پر نمایید'], 422);
        }

    }

    public function deleteAuth()
    {
        if (isset($_POST['phone_number']) && isset($_POST['id'])) {
            $phone_number = $_POST['phone_number'];
            $id = $_POST['id'];
            Capsule::table('zibal_users')->where('user_id', $id)->where('mobile', $phone_number)->delete();
            return $this->response(['result' => 'success'], 200);
        }
    }
}