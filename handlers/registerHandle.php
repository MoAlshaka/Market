<?php

session_start();


require_once("../classes/validation/Validator.php");
require_once("../classes/User.php");

use validation\Validator;

if (isset($_POST["submit"])) {
    $date['name'] = $_POST['name'];
    $date['email'] = $_POST['email'];
    $password = $_POST['password'];
    // validation
    $v = new Validator;

    $v->rules('name', $date['name'], ['required', 'max:100']);
    $v->rules('email', $date['email'], ['required', 'email', 'max:100']);
    $v->rules('password', $password, ['required']);
    $errors = $v->errors;

    if ($errors == []) {
        $date['password'] = md5($password);
        $user = new User;
        $result = $user->register($date);
        if ($result == 1) {
            $info = $user->attempt($date['email'], $date['password']);
            $_SESSION['id'] = $info['id'];
            $_SESSION['email'] = $info['email'];
            $_SESSION['name'] = $info['name'];
            header('location: ../index.php');
        } else {
            $_SESSION['errors'] = [' Error in store'];
            header('location: ../register.php');
        }
    } else {

        $_SESSION['errors'] = $errors;
        header('location: ../register.php');
    }
} else {
    header('location: ../register.php');
}
