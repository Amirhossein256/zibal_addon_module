<?php

use is\sec\models\CustomField;

add_hook('AdminAreaClientSummaryPage', 1, function ($vars) {

    $command = 'GetClientsDetails';
    $postData = array(
        'clientid' => $vars['userid'],
        'stats' => true,
    );
    $results = localAPI($command, $postData);

    $phone_number = $results['phonenumber'];


    if (!empty($phone_number)) {
        $authenticate = true; # need to check
        $color = ($authenticate) ? '#4c954c' : 'red';

        return '<span id="mobile-status" style="color:' . $color . ';display:inline-block"><i class="fa fa-phone fa-flip-horizontal"></i> ' . $phone_number . ' </span>';
    }
});