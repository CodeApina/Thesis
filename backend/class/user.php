<?php
class User extends Sql{
    protected $username;
    protected $user_id;
    protected $table = "users";

    function init($conn)
    {
        $this->conn = $conn;
    }

    function log_in_handler($username, $password){
        $stmt = $this->conn->prepare("SELECT salt FROM $this->table WHERE username=?");
        $stmt->bind_param("s" ,$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();
        $salt = $rows['salt'];
        $hash_password = hash("sha256", $salt.$password, false);

        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE username=?, password=?");
        $stmt->bind_param("ss", $username, $hash_password);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();
        $user_id = $rows['user_id'];
        if ($result->num_rows === 1){
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;
            return 0;
        }
        else
            return 1;
    }
    

    function register_handler($email, $username, $password){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = $result->num_rows;
        if ($rows === 0){
            $salt = $this->generateRandomString();
            $success = false;
            do{
                $user_id = uniqid($prefix = "", $more_entropy = false);
                $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE user_id = ?");
                $stmt->bind_param("s", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows === 0){
                    $success = true;
                }
            } while($success != true);
            $hash_password = hash("sha256", $salt.$password, false);
            $stmt = $this->conn->prepare("INSERT INTO $this->table (username, salt, password, email, user_id) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssss", $username, $salt, $hash_password, $email, $user_id);
            if ($stmt->execute())
                return 1;
            else
                return 0;

        }
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}