<?php
require '../helpers/security.hp.php'; //sanitize functions
require("authenticate.inc.php"); //Authenticate class


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $s_username = strip_tags(trim($_POST["login_username"]));
    $s_username = sanitize($s_username);
    $s_pwd= strip_tags(trim($_POST["login_pwd"]));
    $s_pwd = sanitize($s_pwd);




    $LoginUser = new AuthenticateUser($s_username, $s_pwd);
    $b_status = $LoginUser->getLoginUser(); //Login operation == returns boolean


    if($b_status === false){

        header('Location:../index.php?status=invalid'); //return invalid user from Authentication class
        //$hashed_password = password_hash($s_pwd, PASSWORD_DEFAULT);
        //var_dump($hashed_password);

        exit(1);
    }

    header('Location:../dashboard.php');  //valid login


}

else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}





