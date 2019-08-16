<?php
// In the include files (where direct access isn't permitted):
defined('_ACCESS_ALLOWED') or exit('Restricted Access');
require_once  'db.inc.php';
require_once 'user.inc.php';


class Member extends User
{

    protected $a_Payments;

    public function __construct()
    {

    }

    public function readDatabasePayments() {
       $this->a_Payments = parent::readDatabasePayments();
       return $this->a_Payments;
    }

    public function editPayments($i_paymentId, $s_package , $s_status) {

        //Attempt at Mysqli escape (if we were using mysqli)
//        $i_paymentId = escape($this->connect(),$i_paymentId);
//        $s_package = escape($this->connect(),$s_package);
//        $s_status= escape($this->connect(),$s_status);

        /**
         * Update data
         */
        try {

            $d_lastModified = date("Y-m-d"); //Last modified date
            //Prepare statement
            $sql = "UPDATE `payments` SET `Package` = :packages, `date` = :M_date , `status` = :status WHERE `id` = :paymentid";
            $stmnt = $this->connect()->prepare($sql);

            //Execute statement
            $stmnt->bindValue(':packages', $s_package);
            $stmnt->bindValue(':status', $s_status);
            $stmnt->bindValue(':M_date', $d_lastModified);
            $stmnt->bindValue(':paymentid', $i_paymentId);
            $stmnt->execute();



        }   catch (PDOException $e) {
            return "ERROR:" . $e->getMessage();
        }
    }


}



