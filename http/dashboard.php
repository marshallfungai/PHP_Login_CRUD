<?php
require 'helpers/session.hp.php';
$userAccess = $_SESSION['a_USER']['permission']; //access control
//print_r($_SESSION['a_USER']);

//Mini templating Engine
switch ($userAccess) {
    case 'subscriber':
        include 'sections/subscriber.php'; // get subscriber template
        break;
    case 'member':
        include 'sections/member.php'; //get pro member template
        break;
    case 'admin':
        include 'sections/admin.php';  //get admin template
        break;
}



//Session::logOut();
