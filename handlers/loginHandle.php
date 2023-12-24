<?php

session_start();

require_once("../classes/validation/Validator.php");
require_once("../classes/User.php");

use validation\Validator;

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // validation
    $v = new Validator;

    $v->rules('email', $email, ['required', 'email', 'max:100']);
    $v->rules('password', $password, ['required']);
    $errors = $v->errors;
    if ($errors == []) {
        $user = new User;
        $result = $user->attempt($email, md5($password));
        if ($result !== null) {
            $_SESSION['id'] = $result['id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['name'] = $result['name'];
            header('location: ../index.php');
        } else {
            $_SESSION['errors'] = [' email or password is not correct'];
            header('location: ../login.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ../login.php');
    }
} else {
    header('location: ../login.php');
}
