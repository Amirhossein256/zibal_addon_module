<?php

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('AdminAreaClientSummaryPage', 1, function ($vars) {

    $id =$vars['userid'];
    $command = 'GetClientsDetails';
    $postData = array(
        'clientid' => $id,
        'stats' => true,
    );
    $results = localAPI($command, $postData);

    $phone_number = $results['phonenumber'];
    $user = Capsule::table('zibal_users')->where('user_id', $id)->where('mobile', $phone_number)->first();
    if (!empty($user)) {
        $return = '<button disabled class="btn btn-success">کاربر احزار هویت شده</button>
                       <button id="deleteAuth" class="btn btn-danger" style="display:inline-block">ابطال احراز هویت</button>
                       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                       <script>
                $(document).ready(function() {
                    $("#deleteAuth").click(function (){
                        Swal.fire({
                            title: "ایا مطمئن هستید؟",
                            showCancelButton: true,
                            cancelButtonText: "عملیات متوقف شود",
                            confirmButtonText: "احراز هویت لغو شود",
                            preConfirm: async () => {
                                const phone_number = ' . json_encode($phone_number) . ';
                                const id = ' . $id . ';
                                const formData = new FormData();
                                formData.append("phone_number", phone_number);
                                formData.append("id", id);
                                const response = fetch("addonmodules.php?module=zibal&action=zibal/deleteAuth", {
                                    method: "POST",
                                    body: formData
                                });
                            },
                        }).then((result) => {
                        window.location.reload();
                        });
                    });
                });
            </script>';
    } else {
        $return = '
            <button id="auth" class="btn btn-warning" style="display:inline-block">احراز هویت دستی کاربر</button>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).ready(function() {
                    $("#auth").click(function (){
                        Swal.fire({
                            title: "کد ملی کاربر را وارد نمایید",
                            input: "tel",
                            showCancelButton: true,
                            cancelButtonText: "لغو",
                            confirmButtonText: "احراز هویت",
                            preConfirm: async (code) => {
                                const phone_number = ' . json_encode($phone_number) . ';
                                const id = ' . $id . ';
                                const formData = new FormData();
                                formData.append("code", code);
                                formData.append("phone_number", phone_number);
                                formData.append("id", id);
                                const response = fetch("addonmodules.php?module=zibal&action=zibal/manualAuth", {
                                    method: "POST",
                                    body: formData
                                });
                            },
                        }).then((result) => {
                           window.location.reload();
                        });
                    });
                });
            </script>';
    }
    return $return;
});

