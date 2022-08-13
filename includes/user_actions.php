<?php
include('includes/db.php');
$barangay_name = $barangay_captain = $address = $treasurer = $secretary = $kagawad_1 = $kagawad_2 = $kagawad_3 = $kagawad_4 = $kagawad_5 = $kagawad_6 = $kagawad_7 = $bhw = $sk_kagawad = $username = "";
$username_err = $password_err = $confirm_password_err = "";
$error = "";

// Signup Starts Here!
if (isset($_POST['signup'])) {
    $barangay_name = $_POST['barangay_name'];
    $barangay_captain = $_POST['barangay_captain'];
    $address = $_POST['address'];
    $treasurer = $_POST['treasurer'];
    $secretary = $_POST['secretary'];
    $kagawad_1 = $_POST['kagawad_1'];
    $kagawad_2 = $_POST['kagawad_2'];
    $kagawad_3 = $_POST['kagawad_3'];
    $kagawad_4 = $_POST['kagawad_4'];
    $kagawad_5 = $_POST['kagawad_5'];
    $kagawad_6 = $_POST['kagawad_6'];
    $kagawad_7 = $_POST['kagawad_7'];
    $bhw = $_POST['bhw'];
    $sk_kagawad = $_POST['sk_kagawad'];
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (empty($username)) {
        $username_err = "Username is Empty!";
    } elseif (empty($password)) {
        $password_err = "Password is Empty!";
    } elseif (empty($confirm_password)) {
        $confirm_password_err = "Please Confirm Password!";
    }

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $username_check = mysqli_fetch_assoc($result);

    if ($username_check) { // if user exists
        if ($username_check['username'] === $username) {
            $username_err = "Username is not available!";
        }
    }

    if ($password !== $confirm_password) {
        $error = "Password is not match, Please try again!";
    }


    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $password = md5($password); //encrypt the password before saving in the database

        $query = "INSERT INTO users (barangay_name, barangay_captain, address, treasurer, secretary, kagawad_1, kagawad_2, kagawad_3, kagawad_4, kagawad_5, kagawad_6, kagawad_7, bhw,  sk_kagawad,  username, password) 
                  VALUES('$barangay_name','$barangay_captain','$address','$treasurer','$secretary','$kagawad_1','$kagawad_2','$kagawad_3','$kagawad_4','$kagawad_5','$kagawad_6','$kagawad_7','$bhw','$sk_kagawad','$username', '$password')";
        mysqli_query($conn, $query);
        header('location: login.php');
    }
}

// Login Starts Here!
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        $username_err = "Username is Empty";
    }
    if (empty($password)) {
        $password_err = "Password is Empty!";
    }

    if ($username_err === "" && $password_err === "") {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);

            session_start();
            
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            header('location: index.php');
            exit();
        } else {
            $error = "Username or Password is Incorrect!";
        }
    }
}
