<?php
use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('AdminAreaClientSummaryPage', 1, function ($vars) {

    $user = Capsule::table('zibal_users')->where('user_id', $vars['userid'])->first();

    if (!empty($user)){
        return '<span style="color:green;display:inline-block">کاربر احراز هویت شده</button>';
    }else{
        $command = 'GetClientsDetails';
        $postData = array(
            'clientid' => $vars['userid'],
            'stats' => true,
        );
        $results = localAPI($command, $postData);

        $phone_number = $results['phonenumber'];

        $script = '
            <button id="auth" class="btn btn-warning" style="display:inline-block">احراز هویت کاربر</button>
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
                                const phone_number = '.json_encode($phone_number).';
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
            </script>
        ';

        return $script;
    }
});
?>
