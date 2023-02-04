<?php
class User extends Sql{
    protected $username;
    protected $user_id;
    protected $table = "Users";

    function init($conn)
    {
        $this->conn = $conn;
    }
}