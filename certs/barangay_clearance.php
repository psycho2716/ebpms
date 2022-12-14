<?php
include('../includes/db.php');

session_start();
$id = $_SESSION['id'];
$resident_id = $_GET['resident_id'];
$purok_id = $_GET['purok_id'];

if (!isset($_SESSION['id'])) {
    header('location: login.php');
}

// Fetch Barangay ID from Users
$get_data = "SELECT * FROM users WHERE id = $id";
$run_data = mysqli_query($conn, $get_data);
$fetch = mysqli_fetch_assoc($run_data);

$barangay_id = $fetch['barangay_id'];
// Fetch End

// Get barangay id from barangays
$sql = "SELECT * FROM barangays WHERE barangay_id = '$barangay_id'";
$run_query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($run_query);

$barangay_name = $row['barangay_name'];
$address = $row['address'];
$barangay_captain = $row['barangay_captain'];
$treasurer = $row['treasurer'];
$secretary = $row['secretary'];
$kagawad_1 = $row['kagawad_1'];
$kagawad_2 = $row['kagawad_2'];
$kagawad_3 = $row['kagawad_3'];
$kagawad_4 = $row['kagawad_4'];
$kagawad_5 = $row['kagawad_5'];
$kagawad_6 = $row['kagawad_6'];
$kagawad_7 = $row['kagawad_7'];
$sk_chairman = $row['sk_chairman'];

// Get barangay id from barangays
$get_resident = "SELECT * FROM residents WHERE id = '$resident_id'";
$run_data_query = mysqli_query($conn, $get_resident);
$result_query = mysqli_fetch_assoc($run_data_query);

$first_name = $result_query['first_name'];
$middle_name = $result_query['middle_name'];
$last_name = $result_query['last_name'];
$occupation = $result_query['occupation'];
$school_attainment = $result_query['school_attainment'];
$blood_type = $result_query['blood_type'];
$skills = $result_query['skills'];
$residents_address = $result_query['residents_address'];
$dob = $result_query['dob'];
$civil_status = $result_query['civil_status'];
$citizenship = $result_query['citizenship'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../images/logo.png" type="image/png">
    <title>EBPMS</title>
    <?php include('../includes/head.php'); ?>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="button-container">
        <?php
        if (isset($_GET['senior'])) {
        ?>
            <a href="../senior.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        if (isset($_GET['residents'])) {
        ?>
            <a href="../residents.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        if (isset($_GET['4p_s'])) {
        ?>
            <a href="../4p_s.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        if (isset($_GET['pwd'])) {
        ?>
            <a href="../pwd.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        if (isset($_GET['solo_parent'])) {
        ?>
            <a href="../solo_parent.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        if (isset($_GET['household'])) {
        ?>
            <a href="../household.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        if (isset($_GET['view_purok'])) {
        ?>
            <a href="../purok_sub_pages/view_purok.php?purok_id=<?php echo $purok_id; ?>" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <?php
        }
        ?>
        <button class="btn btn-primary print-btn" type="button"><i class="fa-solid fa-print"></i> Print</button>
    </div>

    <div class="clearance">
        <div class="barangay-clearance" id="data">
            <div class="left py-2">
                <div class="clearance-logo d-flex justify-content-center">
                    <img src="../images/logo.png">
                </div>
                <div class="official-container my-2">
                    <div class="official-clearance-header text-center">
                        <h4><?php echo $barangay_name; ?> Barangay Officials</h4>
                    </div>
                    <div class="official-clearance-body">
                        <div class="clearance-official-body-header text-center">
                            <span>Concurrent</span>
                            <h5 class="captain-name mt-4"><?php echo $barangay_captain; ?></h5>
                            <span class="official-title">
                                Punong Barangay
                            </span>
                        </div>
                        <div class="clearance-official-body-content mt-4 text-center">
                            <span class="official-title">
                                Barangay Kagawad
                            </span>
                            <span class="Kagawad-name d-block mt-3">
                                <?php echo $kagawad_1; ?>
                            </span>
                            <span class="Kagawad-name d-block mt-3">
                                <?php echo $kagawad_2; ?>
                            </span>
                            <span class="Kagawad-name d-block mt-3">
                                <?php echo $kagawad_3; ?>
                            </span>
                            <span class="Kagawad-name d-block mt-3">
                                <?php echo $kagawad_4; ?>
                            </span>
                            <span class="Kagawad-name d-block mt-3">
                                <?php echo $kagawad_5; ?>
                            </span>
                            <span class="Kagawad-name d-block mt-3">
                                <?php echo $kagawad_6; ?>
                            </span>
                            <span class="Kagawad-name d-block my-3">
                                <?php echo $kagawad_7; ?>
                            </span>
                            <h5 class="sk-chairman-name mt-4"><?php echo $sk_chairman; ?></h5>
                            <span class="official-title">
                                SK Chairman
                            </span>
                            <h5 class="secretary-name mt-4"><?php echo $secretary; ?></h5>
                            <span class="official-title">
                                Kalihim
                            </span>
                            <h5 class="treasurer-name mt-4"><?php echo $treasurer; ?></h5>
                            <span class="official-title">
                                Ingat-Yaman
                            </span>
                        </div>
                    </div>
                </div>
                <div class="fees">
                    <div class="fee-input-container">
                        <span class="fee-title">Clearance Fee: </span>
                        <input type="text" class="fee-input">
                    </div>
                    <div class="fee-input-container">
                        <span class="fee-title">OR No. </span>
                        <input type="text" class="fee-input">
                    </div>
                    <div class="fee-input-container">
                        <span class="fee-title">Date Issued </span>
                        <input type="text" class="fee-input">
                    </div>
                    <div class="fee-input-container">
                        <span class="fee-title">CTC No. </span>
                        <input type="text" class="fee-input">
                    </div>
                    <div class="fee-input-container">
                        <span class="fee-title">Date Issued: </span>
                        <input type="text" class="fee-input">
                    </div>
                    <div class="fee-input-container">
                        <span class="fee-title">Doc Stamp: </span>
                        <input type="text" class="fee-input">
                    </div>
                </div>
            </div>
            <div class="document-body">
                <div class="clearance-header text-center">
                    <h4>Republic of the Philippines <br> Province of Romblon <br> Municipality of Romblon</h4>
                    <span>o00o</span>
                    <h3>Barangay <?php echo $barangay_name; ?></h3>
                    <h3 class="mt-4">Office of the Punong Barangay</h3>
                </div>
                <div class="clearance-body">
                    <h1>Barangay Clearance 2022</h1>

                    <div class="body-text">

                        <h5 class="mb-4">To Whom it may concern:</h5>

                        <p class="body-letter">
                            This is to certify that <strong><?php echo $first_name . "&nbsp" . $middle_name . "&nbsp" . $last_name; ?></strong>, <?php $diff = date_diff(date_create($dob), date_create(date("Y-m-d")));
                                                                                                                                                    echo $diff->format('%y'); ?> years of age, <?php echo $citizenship; ?>
                            <span style="text-transform: lowercase;"><?php echo $civil_status; ?></span> is a bona fide resident of <?php echo $address; ?>.
                        </p>
                        <br>
                        <p class="body-letter">This certifies further that he/she has never been accused or violated any
                            ordinance of this barangay.
                        </p>
                        <br>
                        <p class="body-letter">Issued upon request of the interested party this <?php echo date("d"); ?>'th day of <?php echo date("M, Y"); ?> at
                            <?php echo $address; ?>.
                        </p>
                        <br>
                        <p><strong>Purpose:</strong> Reference for Enrollment in College.</p>
                    </div>
                </div>
                <div class="clearance-footer">
                    <div class="footer-text">
                        <h3><?php echo $barangay_captain; ?></h3>
                        <span>Punong Barangay</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../includes/foot.php'); ?>

</body>

</html>