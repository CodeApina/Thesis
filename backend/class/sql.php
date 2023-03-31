<?php
class Sql{
    protected $conn;
    protected $table;
    //protected $db = "store";
    //protected $user = "root";
    //protected $pass = "root";
    //protected $address = "localhost:3306";

    protected $db = "sakky";
    protected $user = "sakky";
    protected $pass = "Sakky123#!";
    protected $address = "ovela.fi:8443";


    function __construct()
    {
        $this->conn = new mysqli($this->address, $this->user, $this->pass, $this->db);
        $this->init($this->conn);
    }
}