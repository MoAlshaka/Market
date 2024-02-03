<?php



require_once("Mysql.php");


class Order  extends Mysql
{
    public function get_all()
    {

        $query = "SELECT * FROM orders";
        $result = $this->connect()->query($query);
        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($orders, $row);
            }
        }
        return $orders;
    }

    public function get_one($id)
    {
        $query = "SELECT * FROM orders WHERE id = '$id'";
        $result = $this->connect()->query($query);
        $order = null;
        if ($result->num_rows == 1) {
            $order = $result->fetch_assoc();
        }
        return $order;
    }

    public function store(array $date)
    {
        $date['address1'] = mysqli_real_escape_string($this->connect(), $date['address1']);
        $date['address2'] = mysqli_real_escape_string($this->connect(), $date['address2']);
        $query = "INSERT INTO orders (`name`,`email`,`phone`,`address1`,`address2`,`product_id`,`created_at`)
        VALUES('{$date['name']}','{$date['email']}','{$date['phone']}','{$date['address1']}','{$date['address2']}','{$date['product_id']}',CURRENT_TIME())";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function update(array $date, $id)
    {
        $date['address1'] = mysqli_real_escape_string($this->connect(), $date['address1']);
        $date['address12'] = mysqli_real_escape_string($this->connect(), $date['address2']);
        $query = "UPDATE  orders SET 
        `name` = '{$date['name']}',
        `email` = '{$date['email']}',
        `phone` = '{$date['phone']}',
        `address1` = '{$date['address1']}',
        `address2` = '{$date['address2']}',
        `product_id` = '{$date['product_id']}',
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
        $query = "DELETE from orders WHERE id ='$id'";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
