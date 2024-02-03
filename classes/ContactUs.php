<?php



require_once("Mysql.php");


class ContactUs  extends Mysql
{
    public function get_all()
    {

        $query = "SELECT * FROM contact_us";
        $result = $this->connect()->query($query);
        $contact_us = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($contact_us, $row);
            }
        }
        return $contact_us;
    }

    public function get_one($id)
    {
        $query = "SELECT * FROM contact_us WHERE id = '$id'";
        $result = $this->connect()->query($query);
        $contact_us = null;
        if ($result->num_rows == 1) {
            $contact_us = $result->fetch_assoc();
        }
        return $contact_us;
    }

    public function store(array $date)
    {
        $date['subject'] = mysqli_real_escape_string($this->connect(), $date['subject']);
        $date['name'] = mysqli_real_escape_string($this->connect(), $date['name']);
        $query = "INSERT INTO contact_us (`name`,`subject`,`email`,`created_at`)
        VALUES('{$date['name']}','{$date['subject']}','{$date['email']}',CURRENT_TIME())";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function update(array $date, $id)
    {
        $date['subject'] = mysqli_real_escape_string($this->connect(), $date['subject']);
        $date['name'] = mysqli_real_escape_string($this->connect(), $date['name']);
        $query = "UPDATE  contact_us SET 
        `name` = '{$date['name']}',
        `email` = '{$date['email']}',
        `subject` = '{$date['subject']}',
        `updated_at` = CURRENT_TIME()
        where id ='$id'";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE from contact_us WHERE id ='$id'";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
