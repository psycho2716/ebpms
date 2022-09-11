<?php
include('db.php');
$barangay_captain = $address = $treasurer = $secretary = $kagawad_1 = $kagawad_2 = $kagawad_3 = $kagawad_4 = $kagawad_5 = $kagawad_6 = $kagawad_7 = $bhw = $sk_chairman = $username = "";
$username_err = $password_err = $confirm_password_err = $barangay_err = $barangay_name_err = "";
$error = "";
$barangay_name = "";

// Signup Starts Here!
if (isset($_POST['signup'])) {
    $barangay_id = mt_rand(0000, 9999);
    $barangay_name = trim($_POST['barangay_name']);
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
    $sk_chairman = $_POST['sk_chairman'];
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

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $username_check = mysqli_fetch_assoc($result);

    if ($username_check) { // if user exists
        $username_err = "Username is not available!";
    }

    // if ($username_check) {
    //     if ($username_check['barangay_name'] === $barangay_name) {
    //         $barangay_err = $barangay_name . " is already registered!";
    //     }
    // }

    if ($password !== $confirm_password) {
        $error = "Password is not match, Please try again!";
    }

    $sql1 = "SELECT * FROM  barangays WHERE barangay_name = '$barangay_name'";
    $result1 = mysqli_query($conn, $sql1);
    $barangay_check = mysqli_fetch_assoc($result1);

    if ($barangay_check) {
        $barangay_name_err = $barangay_name . " is already registered!";
    }


    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($barangay_err) && empty($barangay_name_err)) {
        $password = md5($password); //encrypt the password before saving in the database

        $query1 = "INSERT INTO users (username, barangay_id, password) 
                  VALUES('$username', '$barangay_id', '$password')";
        mysqli_query($conn, $query1);
        $query2 = "INSERT INTO barangays (barangay_id, barangay_name, barangay_captain, address, treasurer, secretary, kagawad_1, kagawad_2, kagawad_3, kagawad_4, kagawad_5, kagawad_6, kagawad_7, bhw,  sk_chairman) 
                  VALUES('$barangay_id','$barangay_name','$barangay_captain','$address','$treasurer','$secretary','$kagawad_1','$kagawad_2','$kagawad_3','$kagawad_4','$kagawad_5','$kagawad_6','$kagawad_7','$bhw','$sk_chairman')";
        mysqli_query($conn, $query2);
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

$purok_err = $purok_name = "";

// Add Purok
if (isset($_POST['purok_add'])) {
    $barangay_id = $_GET['barangay_id'];
    $purok_id = mt_rand(0000, 9999);
    $purok_name = $_POST['purok_name'];
    $purok_address = $_POST['purok_address'];

    $query = mysqli_query($conn, "SELECT * FROM purok WHERE purok_name = '$purok_name'");
    $fetch = mysqli_fetch_array($query);

    if (!$fetch) {
        mysqli_query($conn, "INSERT INTO purok (purok_address, purok_name, purok_id, barangay_id)
        VALUES('$purok_address', '$purok_name', '$purok_id', '$barangay_id')");
        header('location: purok.php?add=success');
    } else {
        $purok_err = " is already registered!";
    }
}

$certificate_err = $certificate_name_err = "";

// Add Certificate
if (isset($_POST['certificate_add'])) {
    $barangay_id = $_GET['barangay_id'];
    $certificate_name = $_POST['certificate_name'];

    //image upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    $query = mysqli_query($conn, "SELECT * FROM certificates WHERE certificate_name = '$certificate_name'");
    $fetch = mysqli_fetch_array($query);

    if (!$fetch) {
        mysqli_query($conn, "INSERT INTO certificates (certificate_name, img, barangay_id)
        VALUES('$certificate_name', '$image', '$barangay_id')");
        header('location: certificates.php?add=success');
    } else {
        $certificate_err = " is already added!";
    }
}

// Delete certificate
if (isset($_GET['delete_certificate'])) {
    $id = $_GET['delete_certificate'];

    $sql = "DELETE FROM certificates WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: ../certificates.php?delete=success');
        exit;
    } else {
        header('location: ../certificates.php?delete=failed');
    }
}

// Add Resident
if (isset($_POST['add_resident'])) {
    $purok_id = $_GET['purok_id'];
    $barangay_id = $_GET['barangay_id'];

    $residents_name = $_POST['residents_name'];
    $residents_address = $_POST['residents_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ethnicity = $_POST['ethnicity'];
    $civil_status = $_POST['civil_status'];

    $query = mysqli_query($conn, "SELECT * FROM residents WHERE residents_name = '$residents_name'");
    $fetch = mysqli_fetch_array($query);

    if (!$fetch) {
        mysqli_query($conn, "INSERT INTO residents (residents_name, residents_address, gender, dob, purok_id, barangay_id, civil_status, ethnicity)
        VALUES('$residents_name', '$residents_address', '$gender', '$dob', '$purok_id', '$barangay_id', '$civil_status', '$ethnicity')");

        header('location: residents.php?add=success');
    } else {
        $purok_err = " is already registered!";
    }
}

// Delete Resident
if (isset($_GET['delete_resident'])) {
    $id = $_GET['delete_resident'];
    $purok_id = $_GET['purok_id'];

    $sql = "DELETE FROM residents WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: residents.php?delete=success');
        exit;
    } else {
        header('location: residents.php?delete=failed');
    }
}

// Edit Resident
if (isset($_POST['edit_resident'])) {
    // Get edit id and purok id
    $id = $_GET['edit_id'];
    $purok_id = $_GET['purok_id'];

    // Store post values in a variable
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $occupation = $_POST['occupation'];
    $school_attainment = $_POST['school_attainment'];
    $skills = $_POST['skills'];
    $blood_type = $_POST['blood_type'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $citizenship = $_POST['citizenship'];
    $civil_status = $_POST['civil_status'];
    $residents_address = $_POST['residents_address'];
    $household_type = $_POST['household_type'];
    $four_ps = $_POST['four_ps'];
    $pwd = $_POST['pwd'];


    $sql = "UPDATE residents SET first_name ='$first_name', middle_name ='$middle_name', last_name ='$last_name', occupation ='$occupation', school_attainment ='$school_attainment', skills ='$skills', blood_type ='$blood_type', residents_address = '$residents_address', gender = '$gender', dob = '$dob', citizenship = '$citizenship', civil_status = '$civil_status', household_type = '$household_type', 4p_s = '$four_ps', pwd = '$pwd' WHERE id = $id ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: residents.php?edit=success');
        exit;
    } else {
        header('location: residents.php?edit=failed');
        exit;
    }
}
