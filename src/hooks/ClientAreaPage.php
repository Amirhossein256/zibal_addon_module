<?php

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAreaPage', 1, function () {
    $AfterLogin = Capsule::table('zibal_settings')->where('key', 'AfterLogin')->first()->value;
    if ($AfterLogin == 'on') {
        $currentUser = new \WHMCS\Authentication\CurrentUser;
        if ($currentUser->isAuthenticatedUser()) {
            if ($_SERVER['REQUEST_URI'] != '/whmcs/index.php?m=zibal') {
                $websiteBaseUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/';
                header('Location: ' . $websiteBaseUrl . 'whmcs/index.php?m=zibal');
                exit();
            }
        }
    }
});