<?php

use validation\Validator;


session_start();

require_once("../classes/validation/Validator.php");
require_once("../classes/Order.php");

if (isset($_POST["submit"])) {
    $date['product_id'] = $_GET['id'];
    $date['name'] = $_POST['name'];
    $date['email'] = $_POST['email'];
    $date['phone'] = $_POST['phone'];
    $date['address1'] = $_POST['address1'];
    $date['address2'] = $_POST['address2'];

    $v = new Validator;
    $v->rules('name', $date['name'], ['required', 'max:100']);
    $v->rules('email', $date['email'], ['required', 'email', 'max:100']);
    $v->rules('phone', $date['phone'], ['required', 'max:100']);
    $v->rules('address1', $date['address1'], ['required', 'max:100']);
    $v->rules('address2', $date['address2'], ['required', 'max:100']);

    $errors = $v->errors;

    if ($errors == []) {
        $order = new Order;
        $result = $order->store($date);
        if ($result == true) {
            $_SESSION['add'] = "add order successfully";
            header('location: ../index.php');
        } else {
            $_SESSION['errors'] = ['error happend when store'];
            header("location: ../buynow.php?id=" . $_GET['id']);
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: ../buynow.php?id=" . $_GET['id']);
    }
}
