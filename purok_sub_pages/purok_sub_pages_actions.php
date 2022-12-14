<?php
include('../includes/db.php');

$password_err = "";

// Add Resident
if (isset($_POST['add_resident'])) {
    $purok_id = $_GET['purok_id'];
    $barangay_id = $_GET['barangay_id'];

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


    mysqli_query($conn, "INSERT INTO residents (first_name, residents_address, gender, dob, purok_id, barangay_id, civil_status, citizenship, last_name, middle_name, occupation, school_attainment, skills, blood_type, household_type, 4p_s, pwd, senior)
        VALUES('$first_name', '$residents_address', '$gender', '$dob', '$purok_id', '$barangay_id', '$civil_status', '$citizenship', '$last_name', '$middle_name', '$occupation', '$school_attainment', '$skills', '$blood_type', '$household_type', '$four_ps', '$pwd', 'No')");

    header('location: view_purok.php?purok_id=' . $purok_id . '&&add=success');
}

// Delete Resident
if (isset($_GET['delete_resident'])) {
    $id = $_GET['delete_resident'];
    $purok_id = $_GET['purok_id'];
    $username = $_GET['username'];

    if (empty(trim($_POST['password']))) {
        $password_err = "Please enter your password!";
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if (empty($password_err)) {
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result_query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result_query) == 1) {
            $sql = "DELETE FROM residents WHERE id=$id";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header('location: view_purok.php?purok_id=' . $purok_id . '&&delete=success');
                exit;
            } else {
                header('location: view_purok.php?purok_id=' . $purok_id . '&&delete=failed');
            }
        } else {
            $password_err = "Incorrect Password!";
        }
    }
}

// Delete Purok
if (isset($_GET['delete_purok'])) {
    $purok_id = $_GET['delete_purok'];

    $sql1 = "DELETE FROM purok WHERE purok_id = '$purok_id'";
    $sql2 = "DELETE FROM residents WHERE purok_id = '$purok_id'";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    if ($result1 || $result2) {
        header('location: ../purok.php?delete=success');
        exit;
    } else {
        header('location: ../purok.php?delete=failed');
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

    $currentDate = date("Y-m-d");
    $age = date_diff(date_create($dob), date_create($currentDate));
    $age_result = intval($age->format("%y"));




    if ($age_result >= 60) {

        $sql = "UPDATE residents SET first_name ='$first_name', middle_name ='$middle_name', last_name ='$last_name', occupation ='$occupation', school_attainment ='$school_attainment', skills ='$skills', blood_type ='$blood_type', residents_address = '$residents_address', gender = '$gender', dob = '$dob', citizenship = '$citizenship', civil_status = '$civil_status', household_type = '$household_type', 4p_s = '$four_ps', pwd = '$pwd', senior = 'Yes' WHERE id = $id ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=success');
            exit;
        } else {
            header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=failed');
            exit;
        }
    } else {
        $sql = "UPDATE residents SET first_name ='$first_name', middle_name ='$middle_name', last_name ='$last_name', occupation ='$occupation', school_attainment ='$school_attainment', skills ='$skills', blood_type ='$blood_type', residents_address = '$residents_address', gender = '$gender', dob = '$dob', citizenship = '$citizenship', civil_status = '$civil_status', household_type = '$household_type', 4p_s = '$four_ps', pwd = '$pwd', senior = 'No' WHERE id = $id ";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=success');            exit;
        } else {
            header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=failed');
            exit;
        }
    }
}

// Edit Purok
if (isset($_POST['edit_purok'])) {
    // Get edit purok id
    $purok_id = $_GET['purok_id'];

    // Store post values in a variable
    $purok_name = $_POST['purok_name'];
    $purok_address = $_POST['purok_address'];


    $sql = "UPDATE purok SET purok_name ='$purok_name', purok_address ='$purok_address' WHERE purok_id = $purok_id ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=success');
        exit;
    } else {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=failed');
        exit;
    }
}

// Upload Profile
if (isset($_POST['upload_profile'])) {
    // Get purok id
    $purok_id = $_GET['purok_id'];

    //image upload
    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }


    $sql = "UPDATE purok SET img ='$image' WHERE purok_id = '$purok_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&info=success');
        exit;
    } else {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&info=failed');
        exit;
    }
}
