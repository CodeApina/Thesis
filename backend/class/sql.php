<?php
class Sql{
    protected $conn;
    protected $table;

    function __construct()
    {
        $this->conn = new mysqli("https://ovela.fi:8443/", "sakky", "Sakky123#!", "sakky_henri_saren");
        $this->init($this->conn);
    }
}