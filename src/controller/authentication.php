<?php

class authentication extends mainController
{
    public function authenticate()
    {
        if (isset($_POST['mobile']) &&
            isset($_POST['national_id']) &&
            isset($_POST['birthdate']))
            //api call if authenticate add to our database
        var_dump($_POST);
        die();
    }

}