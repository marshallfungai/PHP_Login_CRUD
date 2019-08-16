<?php
require_once 'helpers/security.hp.php'; //security package
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (Session::authenticate()) {  // Authenticate and regenerate session id to mitigate session hijacking

        $i_delete_paymentID = sanitize($_POST['delete_paymentID']);
        /**
         * Update information
         */
        $userExecute->deletePayment($i_delete_paymentID );

    }


}
