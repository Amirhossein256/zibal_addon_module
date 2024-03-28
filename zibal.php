<?php
use Illuminate\Database\Capsule\Manager as Capsule;

function zibal_output($vars)
{
    include __DIR__  . '/src/router/loader.php';
}

function zibal_clientarea($vars)
{
    $user = json_decode($_SESSION['login_auth_tk']);
    $postData = array(
        'email' => $user->email,
        'stats' => true,
    );
    $results = localAPI('GetClientsDetails', $postData);
    $mobile = $results['client']['phonenumber'];
    $checkUserAuth = Capsule::table('zibal_users')->where('user_id', $user->id)->first();
    $currentUser = new \WHMCS\Authentication\CurrentUser;
    if ($checkUserAuth or !$currentUser->isAuthenticatedUser()) return '';
    $userContact = Capsule::table('tblcontacts')->where('userid', $user->id)->first();
    $authService = Capsule::table('zibal_settings')->where('key', 'authService')->first();
    $data = [
        'authService' => $authService->value == 'nationalIdentityInquiry',
        'mobile' => $mobile,
        'userid' => $user->id,
    ];
    include __DIR__  . '/src/router/loader.php';
    return array(
        'pagetitle' => 'احراز هویت',
        'breadcrumb' => array('index.php?m=zibal' => 'احراز هویت'),
        'templatefile' => 'zibal.tpl',
        'requirelogin' => false,
        'forcessl' => false,
        'vars' => $data
        );
}

function zibal_config()
{

    return [
        "name" => 'zibal',
        "description" => "ماژول احراز هویت وبسرویس زیبال",
        "version" => '1.0',
        "author" => "<a href='https://t.me/Amirhossein_nb'>amirhossein_nb</a>",
        "language" => "farsi",
        "fields" => [
            'accessToken' => [
                "FriendlyName" => 'توکن زیبال',
                "Type" => "text",
                "Size" => "200",
                "Default" => ""
            ]
        ]
    ];

}

function zibal_activate()
{

    try {
        require_once __DIR__ . "/vendor/autoload.php";
        $migrations = new \Amirhossein256\Zibal\database\migrations\create();
        $migrations->run();

        return [
            'status' => 'success',
            'description' => 'Activate successfully enjoy Use :)'
        ];
    } catch (\Exception $e) {
        return [
            'status' => "error",
            'description' => 'Unable to create zibal: ' . $e->getMessage(),
        ];
    }

}

function zibal_deactivate()
{

}

function zibal_upgrade($vars)
{

}