
<?php
use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('AdminAreaClientSummaryPage', 1, function ($vars) {

    $command = 'GetClientsDetails';
    $postData = array(
        'clientid' => $vars['userid'],
        'stats' => true,
    );
    $results = localAPI($command, $postData);

    $phone_number = $results['phonenumber'];


    if (!empty($phone_number)) {
        $authenticate = false; # need to check

        if ($authenticate){
            return '<span style="color:green;display:inline-block">کاربر احراز هویت شده</button>';

        }else{
            return '<button id="auth" class="btn btn-warning" style="display:inline-block">احراز هویت کاربر</button> 
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>$("#auth").click(function (){
                        Swal.fire({
                        title: "کد ملی کاربر را وارد نمایید",
                        input: "tel",
                        showCancelButton: true,
                        cancelButtonText: "لغو",
                        confirmButtonText: "احراز هویت",
                        showLoaderOnConfirm: true,
                        preConfirm: async (code) => {
                                const Url = `https://api.github.com/users/${code}`;
                                const response = await fetch(Url);
                                  if (!response.ok) {
                                     return Swal.showValidationMessage(`${JSON.stringify(await response.json())}`);
                                    }
                                    return response.json();
                        },
                        }).then((result) => {
                        console.log(result)
                        });
                    }) </script>';
        }
    }
});
//add_hook('ClientAreaRegister', 1, function($vars) {
//    var_dump($vars, 'registerrrrrr');
//    die();
//});
//
//add_hook('UserLogin', 1, function($vars) {
//    $data = Capsule::table('zibal_settings')->where('key','AfterLogin')->first();
//    if ($data->value == 'on'){
//        $isVerified = Capsule::table('zibal_users')->where('user_id', $vars['userid'])->first();
//        if (is_null($isVerified)){
//            header('Location: /index.php?m=zibal');
//            exit;
//        }
//    }
//});
?>

<script>
    document.getElementById('auth').addEventListener('click', function() {
        console.log('ok');
    });

</script>


