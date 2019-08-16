<?php
require_once 'helpers/security.hp.php'; //security package
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (Session::authenticate()) {  // Authenticate and regenerate session id to mitigate session hijacking

        //print_r($_POST);
        $i_edit_paymentID = sanitize($_POST['edit_paymentID']);
        $i_customerID = sanitize($_POST['edit_customer']);
        $s_Package = sanitize($_POST['edit_packages']);
        $s_Status = sanitize($_POST['edit_status']);


        /**
         * Update information
         */
        $userExecute->editPayments( $i_edit_paymentID, $s_Package, $s_Status  );

    }


}