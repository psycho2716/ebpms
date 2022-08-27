<?php
include('includes/db.php');
$barangay_id = $_GET['barangay_id'];

session_start();

if (!isset($_SESSION['id'])) {
    header('location: login.php');
}

// Get barangay id from barangays
$sql = "SELECT * FROM barangays WHERE barangay_id = '$barangay_id'";
$run_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($run_query);

// barangay id final result
$result_barangay_id = $row['barangay_id'];
$barangay_name = $row['barangay_name'];


// Upload Profile
if (isset($_POST['upload_profile'])) {
    // Get barangay id
    $barangay_id = $_GET['barangay_id'];

    $official_name = $_POST['official_name'];
    $official_title = $_POST['official_title'];

    //image upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    $official_query = mysqli_query($conn, "SELECT * FROM officials WHERE barangay_id = '$barangay_id' AND official_name = '$official_name'");
    $check_official = mysqli_fetch_assoc($official_query);

    if (!$check_official) {
        mysqli_query($conn, "INSERT INTO officials (official_name, official_title, profile_img, barangay_id) VALUES('$official_name', '$official_title', '$image', '$barangay_id')");
        header('location: officials.php?barangay_id=' . $barangay_id . '&&edit=success');
        exit;
    } else {
        $sql = "UPDATE officials SET profile_img ='$image', official_name = '$official_name', official_title = '$official_title', barangay_id = '$barangay_id' WHERE official_name = '$official_name'";
        $result = mysqli_query($conn, $sql);
        header('location: officials.php?barangay_id=' . $barangay_id . '&&edit=success');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EBPMS</title>
    <?php include('includes/head.php'); ?>
</head>

<body class="dashboard-body">
    <?php include('includes/dashboard_nav.php'); ?>

    <?php include('includes/off_canvas_menu.php'); ?>

    <div class="barangay-content">
        <div class="container document-format-container">
            <div class="document-header-container">
                <div class="document-header">
                    <div class="document-logo-container">
                        <img src="images/logo.png" alt="">
                    </div>
                    <div class="document-header-text">
                        <h4>Republic of the Philippines</h4>
                        <span>Municipality of Romblon</span>
                    </div>
                    <div class="document-logo-container">
                        <img src="images/seal.png" alt="">
                    </div>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM barangays WHERE barangay_id = '$barangay_id'";
            $run_query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($run_query)) {
                $id = $row['id'];
                $barangay_name = $row['barangay_name'];
                $address = $row['address'];
                $barangay_captain = $row['barangay_captain'];
                $secretary = $row['secretary'];
                $treasurer = $row['treasurer'];
                $kagawad_1 = $row['kagawad_1'];
                $kagawad_2 = $row['kagawad_2'];
                $kagawad_3 = $row['kagawad_3'];
                $kagawad_4 = $row['kagawad_4'];
                $kagawad_5 = $row['kagawad_5'];
                $kagawad_6 = $row['kagawad_6'];
                $kagawad_7 = $row['kagawad_7'];
                $bhw = $row['bhw'];
                $sk_chairman = $row['sk_chairman'];

            ?>
                <div class="document-body">
                    <h3>Barangay <?php echo $barangay_name; ?> Officials</h3>
                    <div class="officials">

                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewCaptain' class="official-card-link officials-official-link-1">
                            <div class="card custom-card card-1 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$barangay_captain'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Barangay Captain</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $barangay_captain; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewSecretary' class="official-card-link officials-official-link-2">
                            <div class="card custom-card card-2 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$secretary'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Secretary</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $secretary; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewTreasurer' class="official-card-link officials-official-link-3">
                            <div class="card custom-card card-3 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$treasurer'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Treasurer</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $treasurer; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad1' class="official-card-link officials-official-link-4">
                            <div class="card custom-card card-4 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_1'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 1</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_1; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad2' class="official-card-link officials-official-link-5">
                            <div class="card custom-card card-5 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_2'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 2</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_2; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad3' class="official-card-link officials-official-link-6">
                            <div class="card custom-card card-6 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_3'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 3</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_3; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad4' class="official-card-link officials-official-link-7">
                            <div class="card custom-card card-7 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_4'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 4</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad5' class="official-card-link officials-official-link-8">
                            <div class="card custom-card card-8 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_5'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 5</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_5; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad6' class="official-card-link officials-official-link-9">
                            <div class="card custom-card card-9 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_6'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 6</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_6; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewKagawad7' class="official-card-link officials-official-link-10">
                            <div class="card custom-card card-10 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_7'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 7</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_7; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewBhw' class="official-card-link officials-official-link-11">
                            <div class="card custom-card card-11 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$bhw'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Barangay Health Worker</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $bhw; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="#" data-bs-toggle='modal' role='button' data-bs-target='#viewSkChairman' class="official-card-link officials-official-link-12">
                            <div class="card custom-card card-12 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <?php

                                        // Get Official data from Officials
                                        $get_data_official = "SELECT * FROM officials WHERE official_name = '$sk_chairman'";
                                        $run_query_data = mysqli_query($conn, $get_data_official);
                                        $official_data = mysqli_fetch_assoc($run_query_data);

                                        // Official final result
                                        if ($official_data === null) {
                                            $official_image = "";
                                        } else {
                                            $official_image = $official_data['profile_img'];
                                        }



                                        if (!$official_image) {
                                        ?>
                                            <img src="images/logo.png" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="uploads/<?php echo $official_image; ?>" class="img-fluid rounded-start" style="width: 200px; ">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">SK Chairman</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $sk_chairman; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                    <?php
                }
                    ?>
                    </div>
                </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewCaptain" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$barangay_captain'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $barangay_captain; ?></h4>
                                <span>
                                    Barangay Captain
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editCaptainPhoto">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editCaptainPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $barangay_captain; ?>" hidden>
                        <input type="text" name="official_title" value="Barangay Captain" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewCaptain'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewSecretary" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$secretary'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $secretary; ?></h4>
                                <span>
                                    Barangay Secretary
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editSecretaryPhoto">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editSecretaryPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $secretary; ?>" hidden>
                        <input type="text" name="official_title" value="Secretary" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewSecretary'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewTreasurer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$treasurer'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $treasurer; ?></h4>
                                <span>
                                    Barangay Treasurer
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editTreasurerPhoto">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editTreasurerPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $treasurer; ?>" hidden>
                        <input type="text" name="official_title" value="Treasurer" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewTreasurer'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_1'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_1; ?></h4>
                                <span>
                                    Barangay Kagawad 1
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto1">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_1; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 1" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad1'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_2'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_2; ?></h4>
                                <span>
                                    Barangay Kagawad 2
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto2">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_2; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 2" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad2'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_3'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_3; ?></h4>
                                <span>
                                    Barangay Kagawad 3
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto3">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_3; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 3" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad3'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_4'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_4; ?></h4>
                                <span>
                                    Barangay Kagawad 4
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto4">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_4; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 4" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad4'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_5'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_5; ?></h4>
                                <span>
                                    Barangay Kagawad 5
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto5">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_5; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 5" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad5'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_6'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_6; ?></h4>
                                <span>
                                    Barangay Kagawad 6
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto6">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_6; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 6" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad6'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewKagawad7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$kagawad_7'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $kagawad_7; ?></h4>
                                <span>
                                    Barangay Kagawad 7
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editKagawadPhoto7">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editKagawadPhoto7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $kagawad_7; ?>" hidden>
                        <input type="text" name="official_title" value="Kagawad 7" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewKagawad7'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewBhw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_data_official = "SELECT * FROM officials WHERE official_name = '$bhw'";
                            $run_query_data = mysqli_query($conn, $get_data_official);
                            $official_data = mysqli_fetch_assoc($run_query_data);

                            // Official final result
                            if ($official_data === null) {
                                $official_image = "";
                            } else {
                                $official_image = $official_data['profile_img'];
                            }



                            if (!$official_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $official_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $bhw; ?></h4>
                                <span>
                                    Barangay Health Worker
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editBhw">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editBhw" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $bhw; ?>" hidden>
                        <input type="text" name="official_title" value="Barangay Health Worker" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewbhw'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Official Profile Modal -->

    <div class="modal fade" id="viewSkChairman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-profile-card">
                        <div class="profile-header">
                            <?php

                            // Get Official data from Officials
                            $get_sk_chairman = "SELECT * FROM officials WHERE official_name = '$sk_chairman'";
                            $sk_chairman_query = mysqli_query($conn, $get_sk_chairman);
                            $sk_chairman_data = mysqli_fetch_assoc($sk_chairman_query);

                            // Official final result
                            if ($sk_chairman_data === null) {
                                $sk_chairman_image = "";
                            } else {
                                $sk_chairman_image = $sk_chairman_data['profile_img'];
                            }



                            if (!$sk_chairman_image) {
                            ?>
                                <img src="images/logo.png" class="img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="uploads/<?php echo $sk_chairman_image; ?>" class="img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="profile-body mt-2">
                            <div class="body-header text-center">
                                <h4><?php echo $sk_chairman; ?></h4>
                                <span>
                                    SK Chairman
                                </span>
                            </div>
                            <div class="profile-text mt-3">
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Address: <?php echo $address; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#editSkChairman">Update Profile Photo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Official Profile Photo Modal -->
    <div class="modal fade" id="editSkChairman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Official Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="officials.php?barangay_id=<?php echo $barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <input type="text" name="official_name" value="<?php echo $sk_chairman; ?>" hidden>
                        <input type="text" name="official_title" value="SK Chairman" hidden>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#viewSkChairman'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>