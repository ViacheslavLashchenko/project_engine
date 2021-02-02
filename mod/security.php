<?php

class Secur{

    const ACCESS_LEVEL_ADMIN = 1;
    const ACCESS_LEVEL_USER = 2;
    
    public static function check_admin_access()
    {
        if ($_SESSION['user']['level'] != self::ACCESS_LEVEL_ADMIN) {
            header("Location:" . ROOT_URL . ROOT_PAGE . "/home"); exit();
        }
    }
}


?>