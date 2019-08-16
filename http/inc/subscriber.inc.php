<?php
require 'inc/user.inc.php';


class Subscriber extends User
{

    protected $i_level;


    public function __construct()
    {
        parent::__construct();
    }

    public static function read() {
        parent::read();
    }

}