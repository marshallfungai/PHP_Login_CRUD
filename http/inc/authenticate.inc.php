<?php

require("db.inc.php");
require_once '../helpers/security.hp.php'; //security functions


class AuthenticateUser extends DbConnect  {

    protected $b_status = false;
    protected $s_username;
    protected $s_password;


    public function __construct($s_FormUsername, $s_FormPassword)
    {
        parent::connect(); //Connect to

        //echo $hashed_password;
        $this->s_username = $s_FormUsername;
        $this->s_password = $s_FormPassword;
    }


    /**
     * Checks for the requested user
     * from database and
     * sets to session
     *
     */
    public function getLoginUser () {


        $s_FormUsername = $this->s_username;
        $s_FormPassword = $this->s_password;

        ////MySQLi Escape from security package
//            $s_FormUsername = escape($this->connect(),$s_FormUsername);
//            $s_FormPassword = escape($this->connect(),$s_FormPassword);


        /**
         * Retrieve user from database
         */
        try {
            //Prepare statement
            $sql = "SELECT * FROM users WHERE uname= :uname AND upass= :upass";
            $stmnt = $this->connect()->prepare($sql);

            //Execute statement
            $stmnt->bindParam(':uname', $s_FormUsername);
            $stmnt->bindParam(':upass', $s_FormPassword);
            $stmnt->execute();

            //Get results
            if($stmnt->rowCount()){

                $this->b_status = true;  // user/s found

                //Fetch from Database
                $row = $stmnt->fetch(PDO::FETCH_ASSOC);


                //assign row to session
                session_regenerate_id(); // Regenerate session id to mitigate session hijacking
                $_SESSION['a_USER'] = $row; //user object as array in session
                $_SESSION['a_USER']['b_loggedin'] = $this->b_status; //keep track of logged user

                return $this->b_status; // True: user found

            }


            return $this->b_status; // False: user not found
        }   catch (PDOException $e) {
            return "ERROR:" . $e->getMessage();
        }

    }


    /**
     * Returns boolean to show if user is logged in
     */
    public  function getUserStatus () {
        //check user status
        if(isset( $_SESSION['a_USER']['b_loggedin'])) {
            $this->b_status =  $_SESSION['a_USER']['b_loggedin'];       //True: if user is logged in
        }

        return $this->b_status;

    }



}