<?php

$input_error = "";

// Signup Starts Here!
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $input_error = "Please complete fill up!";
    }

    

}