<?php
class Sql{
    protected $conn;
    protected $table;

    function __construct()
    {
        $this->conn = new mysqli("localhost:3306", "root", "root", "Store");
        $this->init($this->conn);
    }
}