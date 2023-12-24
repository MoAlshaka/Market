<?php

require_once('Mysql.php');

class User extends Mysql
{
    public function attempt($email, $password)
    {
        $query = "SELECT * FROM users 
        WHERE email = '$email'  AND `password` = '$password' ";
        $result = $this->connect()->query($query);
        $user = null;
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
        }
        return $user;
    }

    public function register(array $date)
    {
        $query = "INSERT INTO  users (`name`,email,`password`,created_at)
        VALUES('{$date['name']}','{$date['email']}','{$date['password']}',CURRENT_TIME())";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
