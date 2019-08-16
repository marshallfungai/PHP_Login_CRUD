<?php
require 'helpers/session.hp.php';
$loggein = Session::authenticate();
if(!$loggein) {
    header('Location: index.php');
}
$userAccess = $_SESSION['a_USER']['permission']; //access control

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
