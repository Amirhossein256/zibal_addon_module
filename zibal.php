<?php

function zibal_output($vars)
{
    include __DIR__  . '/src/router/loader.php';
}

function zibal_clientarea($vars)
{
    return array(
        'pagetitle' => 'احراز هویت',
        'breadcrumb' => array('index.php?m=zibal' => 'احراز هویت'),
        'templatefile' => 'zibal.tpl',
        'requirelogin' => true,
        'vars' => $vars
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