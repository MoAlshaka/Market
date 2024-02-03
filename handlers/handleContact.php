<?php

use validation\Validator;


session_start();

require_once("../classes/validation/Validator.php");
require_once("../classes/ContactUs.php");

if (isset($_POST["submit"])) {

    $date['name'] = $_POST['name'];
    $date['email'] = $_POST['email'];
    $date['subject'] = $_POST['subject'];


    $v = new Validator;
    $v->rules('name', $date['name'], ['required', 'max:100']);
    $v->rules('email', $date['email'], ['required', 'email', 'max:100']);
    $v->rules('subject', $date['subject'], ['required']);


    $errors = $v->errors;

    if ($errors == []) {
        $contact_us = new ContactUs;
        $result = $contact_us->store($date);
        if ($result == true) {
            $_SESSION['add'] = "add contact_us successfully";
            header('location: ../index.php');
        } else {
            $_SESSION['errors'] = ['error happend when store'];
            header("location: ../index.php#contact");
        }
    } else {
        $_SESSION['errors'] = $errors;
        header("location: ../index.php#contact");
    }
}
