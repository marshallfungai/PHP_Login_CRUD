<?php
require_once 'db.inc.php'; //database connection
require_once 'helpers/security.hp.php'; //security functions

class User extends DbConnect {


    protected $a_PAYMENTS = array();


    public function __construct()
    {
        parent::connect(); //connect database
    }

    //Read All Payment data from database
    public function readDatabasePayments() {

        /**
         * Retrieve data
         */
        try {
            //Prepare statement
            $sql = "SELECT * FROM payments";
            $stmnt = $this->connect()->prepare($sql);
            $stmnt->setFetchMode(PDO::FETCH_ASSOC);
            $stmnt->execute();

            //Get results
            if($stmnt->rowCount()){
                while ($row = $stmnt->fetch()) {
                    //Push to local variable
                    array_push($this->a_PAYMENTS, $row); //user object as array in session
                }


            }

            return $this->a_PAYMENTS;

        }   catch (PDOException $e) {
            return "ERROR:" . $e->getMessage();
        }
    }



}