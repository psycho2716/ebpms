<?php
include('../includes/db.php');

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


    mysqli_query($conn, "INSERT INTO residents (first_name, residents_address, gender, dob, purok_id, barangay_id, civil_status, citizenship, last_name, middle_name, occupation, school_attainment, skills, blood_type, household_type, 4p_s, pwd)
        VALUES('$first_name', '$residents_address', '$gender', '$dob', '$purok_id', '$barangay_id', '$civil_status', '$citizenship', '$last_name', '$middle_name', '$occupation', '$school_attainment', '$skills', '$blood_type', '$household_type', '$four_ps', '$pwd')");

    header('location: view_purok.php?purok_id=' . $purok_id . '&&add=success');
}

// Delete Resident
if (isset($_GET['delete_resident'])) {
    $id = $_GET['delete_resident'];
    $purok_id = $_GET['purok_id'];

    $sql = "DELETE FROM residents WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&delete=success');
        exit;
    } else {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&delete=failed');
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
        header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=success');
        exit;
    } else {
        header('location: view_purok.php?purok_id=' . $purok_id . '&&edit=failed');
        exit;
    }
}

// Edit Purok
if (isset($_POST['edit_purok'])) {
    // Get edit purok id
    $purok_id = $_GET['purok_id'];
    echo $purok_id;
    
    // // Store post values in a variable
    // $purok_name = $_POST['purok_name'];
    // $purok_address = $_POST['purok_address'];


    // $sql = "UPDATE purok SET purok_name ='$purok_name', purok_address ='$purok_address' WHERE id = $purok_id ";
    // $result = mysqli_query($conn, $sql);

    // if ($result) {
    //     header('location: view_purok.php?purok_id=' . $purok_id . '&&info=success');
    //     exit;
    // } else {
    //     header('location: view_purok.php?purok_id=' . $purok_id . '&&info=failed');
    //     exit;
    // }
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
