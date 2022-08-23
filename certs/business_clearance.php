<?php
include('../includes/db.php');

session_start();
$id = $_SESSION['id'];
$resident_id = $_GET['resident_id'];

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
    <link rel="shortcut icon" href="images/logo.png" type="image/png">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>

    <!-- DataTable CDN -->
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="button-container">
        <a href="../residents.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
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
                        <h4>
                            <?php echo $barangay_name; ?> Barangay Officials
                        </h4>
                    </div>
                    <div class="official-clearance-body">
                        <div class="clearance-official-body-header text-center">
                            <span>Concurrent</span>
                            <h5 class="captain-name mt-4">
                                <?php echo $barangay_captain; ?>
                            </h5>
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
                            <h5 class="sk-chairman-name mt-4">
                                <?php echo $sk_chairman; ?>
                            </h5>
                            <span class="official-title">
                                SK Chairman
                            </span>
                            <h5 class="secretary-name mt-4">
                                <?php echo $secretary; ?>
                            </h5>
                            <span class="official-title">
                                Kalihim
                            </span>
                            <h5 class="treasurer-name mt-4">
                                <?php echo $treasurer; ?>
                            </h5>
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
                    <h3>Barangay
                        <?php echo $barangay_name; ?>
                    </h3>
                    <h3 class="mt-4">Office of the Punong Barangay</h3>
                </div>
                <div class="clearance-body">
                    <h1>Business Clearance 2022</h1>

                    <div class="body-text">

                        <h5 class="mb-4">To Whom it may concern:</h5>

                        <p class="body-letter">
                            Clearance is hereby granted to <?php echo $first_name . "&nbsp" . $middle_name . "&nbsp" . $last_name; ?> to engage in business as owner / proprietor / operator of Sari- Sari Store the period ending 2022. 
                        </p>
                        <br>
                        <p class="body-letter fw-bold">
                            Issued this
                            <?php echo date("d"); ?>'th day of
                            <?php echo date("M, Y"); ?> at
                            <?php echo $address; ?>
                            for whatever legal purposes this may serve.
                        </p>
                    </div>
                </div>
                <div class="clearance-footer">
                    <div class="footer-text">
                        <h3>
                            <?php echo $barangay_captain; ?>
                        </h3>
                        <span>Punong Barangay</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../includes/foot.php'); ?>

</body>

</html>