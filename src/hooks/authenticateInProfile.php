<?php

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('AdminAreaClientSummaryPage', 1, function ($vars) {

    $authService = Capsule::table('zibal_settings')->where('key', 'authService')->first()->value;
    if ($authService == 'shahkarInquiry') {
        $command = 'GetClientsDetails';
        $postData = array(
            'clientid' => $vars['userid'],
            'stats' => true,
        );
        $results = localAPI($command, $postData);

        $phone_number = $results['phonenumber'];
        $user = Capsule::table('zibal_users')->where('user_id', $vars['userid'])->where('mobile', $phone_number)->first();
        if (!empty($user)) {
            $return = '<button disabled class="btn btn-success">شماره موبایل با کد ملی مطابق است</button>
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
                            showLoaderOnConfirm: true,
                            preConfirm: async (code) => {
                                const phone_number = ' . json_encode($phone_number) . ';
                                const formData = new FormData();
                                formData.append("code", code);
                                formData.append("phone_number", phone_number);
                                const response = await fetch("/your-endpoint", {
                                    method: "POST",
                                    body: formData
                                });
                                if (!response.ok) {
                                    return Swal.showValidationMessage(`${JSON.stringify(await response.json())}`);
                                }
                                return response.json();
                            },
                        }).then((result) => {
                            console.log(result)
                        });
                    });
                });
            </script>';
        } else {
            $return = '
            <button id="auth" class="btn btn-warning" style="display:inline-block">تطبیق شماره موبایل با کد ملی</button>
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
                            showLoaderOnConfirm: true,
                            preConfirm: async (code) => {
                                const phone_number = ' . json_encode($phone_number) . ';
                                const formData = new FormData();
                                formData.append("code", code);
                                formData.append("phone_number", phone_number);
                                const response = await fetch("/your-endpoint", {
                                    method: "POST",
                                    body: formData
                                });
                                if (!response.ok) {
                                    return Swal.showValidationMessage(`${JSON.stringify(await response.json())}`);
                                }
                                return response.json();
                            },
                        }).then((result) => {
                            console.log(result)
                        });
                    });
                });
            </script>';
        }
    } else {
        $user = Capsule::table('zibal_users')->where('user_id', $vars['userid'])->first();
        if (!empty($user)) {
            $return = '<button disabled class="btn btn-success">اطلاعات هویتی کاربر معتبر میباشد</button>
                       <button id="deleteAuth" class="btn btn-danger" style="display:inline-block">ابطال اعتبار اطلاعات هویتی</button>
                       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                       <script>
                $(document).ready(function() {
                    $("#deleteAuth").click(function (){
                        Swal.fire({
                            title: "ایا مطمئن هستید؟",
                            text: "توجه کنید بعد انجام این عملیات احراز هویت مجدد باید انجام شود",
                            showCancelButton: true,
                            cancelButtonText: "عملیات متوقف شود",
                            confirmButtonText: "اعتبار اطلاعات هویتی ابطال شود ",
                            showLoaderOnConfirm: true,
                            preConfirm: async (code) => {
                                const phone_number = ' . json_encode($phone_number) . ';
                                const formData = new FormData();
                                formData.append("code", code);
                                formData.append("phone_number", phone_number);
                                const response = await fetch("/your-endpoint", {
                                    method: "POST",
                                    body: formData
                                });
                                if (!response.ok) {
                                    return Swal.showValidationMessage(`${JSON.stringify(await response.json())}`);
                                }
                                return response.json();
                            },
                        }).then((result) => {
                            console.log(result)
                        });
                    });
                });
            </script>';
        } else {
            $return = '
            <button id="auth" class="btn btn-warning" style="display:inline-block">احراز اطلاعات هویتی</button>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                $(document).ready(function() {
                    $("#auth").click(function (){
                        Swal.fire({
                            title: "اطلاعات مورد نظر را وار نمایید",
                            html:`کدملی<input class="form-input " id="input1" type="text">
                                    <br>
                                    تاریخ تولد<input class="form-input" id="input3" type="date">`,
                            showCancelButton: true,
                            cancelButtonText: "لغو",
                            confirmButtonText: "احراز هویت",
                            showLoaderOnConfirm: true,
                            preConfirm: async (code) => {
                                const formData = new FormData();
                                formData.append("code", code);
                                const response = await fetch("/your-endpoint", {
                                    method: "POST",
                                    body: formData
                                });
                                if (!response.ok) {
                                    return Swal.showValidationMessage(`${JSON.stringify(await response.json())}`);
                                }
                                return response.json();
                            },
                        }).then((result) => {
                            console.log(result)
                        });
                    });
                });
            </script>';
        }
    }
    return $return;
});

