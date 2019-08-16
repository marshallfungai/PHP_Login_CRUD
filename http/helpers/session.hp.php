<?php
class Session {


    public function __construct()
    {   // Starting session
        session_start();

        //$_SESSION['a_USER'] contains all user information as Array
        if (!isset($_SESSION['a_USER'])) {
            header('Location: ../index.php');
        }
    }

    public static function authenticate() {
        if (isset( $_SESSION['a_USER']['b_loggedin'])) {
            if ( $_SESSION['a_USER']['b_loggedin'] === true) {
                session_regenerate_id(); // Regenerate session id to mitigate session hijacking
                return true;
            }
        }
        return false;
    }


    public static function logOut() {

        //Unset $_SESSION
        unset($_SESSION['a_USER']);
        session_destroy();
        header('Location: index.php');
    }


}

