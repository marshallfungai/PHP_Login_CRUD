<?php

class DbConnect {

    private $s_servername;
    private $s_dbname;
    private $s_username;
    private $s_password;


    /**
     * Connecting to Database
     * @return PDO
     */
    public function connect () {

        $this->s_servername = 'localhost';
        $this->s_dbname = 'nethouse';
        $this->s_username = 'root';
        $this->s_password = '';
       //$this->charset = $charset;

        try {
            $dsn = "mysql:host=".$this->s_servername.";dbname=".$this->s_dbname;
            $pdo = new PDO($dsn, $this->s_username, $this->s_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'connection successful';
            return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed:". $e->getMessage();
        }

    }
}