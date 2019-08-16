<?php
/**
 * Custom Security package
 * @return string
 */


//
function sanitize($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
  }


//MySQL Escape
function escape($conn, $string)
{
    $return = mysqli_real_escape_string($conn, $string);
    return $return;
}

//Encrypt Password
function passwordEncyrpt($password)
{

    //Chosen Algorithm
    /***/
    $Encrypted = $password;

    //return
    return $Encrypted;
}

