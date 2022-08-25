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

// Get barangay Info from Barangays
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

// Get barangay Info from Residents
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

// Get Info from Purok
$get_purok = "SELECT * FROM purok WHERE purok_id = '$purok_id'";
$run_data_query_purok = mysqli_query($conn, $get_purok);
$purok_result = mysqli_fetch_assoc($run_data_query_purok);

$purok_name = $purok_result['purok_name'];

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <div class="barangay-clearance cot" id="data">
            <div class="document-body cot">
                <div class="clearance-logo d-flex justify-content-center">
                    <img src="../images/logo.png">
                </div>
                <div class="clearance-header text-center">
                    <h4>Republic of the Philippines <br> Province of Romblon <br> Municipality of Romblon</h4>
                    <span>o00o</span>
                    <h3>Barangay
                        <?php echo $barangay_name; ?>
                    </h3>
                    <h3 class="mt-4">Office of the Punong Barangay</h3>
                </div>
                <div class="clearance-body">
                    <h1>Certification</h1>

                    <div class="body-text">

                        <h5 class="mb-4">To Whom it may concern:</h5>

                        <p class="body-letter">
                            This is to certify that <strong>ACCEPTANCE IS GRANTED</strong> to the following-named
                            persons to proceed to Purok <?php echo $purok_name; ?>, this Barangay, upon their arrival to Romblon, Romblon from <input type="text" class="input-1 cot-input"> on <input type="date" class="input-4 cot-input">.
                        </p>
                        <br>
                        <p class="body-letter">
                            <textarea cols="90" rows="10" class="form-control" placeholder="List the names here..."></textarea>
                        </p>
                        <p class="body-letter">
                            Issued this
                            <?php echo date("d"); ?>'th day of
                            <?php echo date("M, Y"); ?> prior to their travel from <input type="text" class="input-2 cot-input">
                            to Romblon, Romblon and for any other purpose this may serve.

                        </p>
                    </div>
                </div>
                <div class="clearance-footer clearance-footer-2">
                    <div class="fees-2">
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
    <script>
        const input1 = document.querySelector(".input-1");
        const input2 = document.querySelector(".input-2");
        const input3 = document.querySelector(".input-3");
        input1.addEventListener('input', resizeInput1);
        resizeInput1.call(input1);

        function resizeInput1() {
            this.style.width = this.value.length + "ch";
        }

        input2.addEventListener('input', resizeInput2);
        resizeInput2.call(input2);

        function resizeInput2() {
            this.style.width = this.value.length + "ch";
        }

        input3.addEventListener('input', resizeInput3);
        resizeInput3.call(input3);

        function resizeInput3() {
            this.style.width = this.value.length + "ch";
        }
    </script>
</body>

</html>