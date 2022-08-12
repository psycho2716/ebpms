<?php
include('includes/db.php');
$barangay_name = $barangay_captain = $address = $treasurer = $secretary = $kagawad_1 = $kagawad_2 = $kagawad_3 = $kagawad_4 = $kagawad_5 = $kagawad_6 = $kagawad_7 = $bhw = $sk_kagawad = $username = "";
$errors = array();

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
        array_push($errors, "Please Enter your username!");
    } elseif (empty($password)) {
        array_push($errors, "Please Enter your password!");
    } elseif (empty($confirm_password)) {
        array_push($errors, "Please Confirm your username!");
    }

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $username_check = mysqli_fetch_assoc($result);

    if ($username_check) { // if user exists
        if ($username_check['username'] === $username) {
            array_push($errors, "Username is not available!");
        }
    }

    if ($password !== $confirm_password) {
        array_push($errors, "Password not match, Please try again!");
    }


    if (count($errors) == 0) {
        $password = md5($password); //encrypt the password before saving in the database
  
        $query = "INSERT INTO users (barangay_name, barangay_captain, address, treasurer, secretary, kagawad_1, kagawad_2, kagawad_3, kagawad_4, kagawad_5, kagawad_6, kagawad_7, bhw,  sk_kagawad,  username, password) 
                  VALUES('$barangay_name','$barangay_captain','$address','$treasurer','$secretary','$kagawad_1','$kagawad_2','$kagawad_3','$kagawad_4','$kagawad_5','$kagawad_6','$kagawad_7','$bhw','$sk_kagawad','$username', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: login.php');
    }
}
