<?php
class User extends Sql{
    protected $username;
    protected $user_id;
    protected $table = "users";

    function init($conn)
    {
        $this->conn = $conn;
    }
}