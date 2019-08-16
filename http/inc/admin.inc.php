<?php
require_once 'user.inc.php';
require_once 'member.inc.php';

class Admin extends User
{

    protected $i_level;


    public function __construct()
    {
        parent::__construct();
    }

    public function readDatabasePayments() {
        return parent::readDatabasePayments(); //from parent class
    }

    public function editPayments($i_paymentId, $s_package , $s_status) {

        //use the member class edit method
        $EditUsers = new Member();
        $EditUsers->editPayments($i_paymentId, $s_package , $s_status);
    }

    public function deletePayment($i_paymentID) {
        /**
         * delete Payment data
         */
        try {

            //Prepare statement
            $sql = " DELETE FROM payments WHERE id =  :paymentID ";
            $stmnt = $this->connect()->prepare($sql);

            //Execute statement
            $stmnt->bindParam(':paymentID', $i_paymentID);
            $stmnt->execute();



        }   catch (PDOException $e) {
            return "ERROR:" . $e->getMessage();
        }
    }


}