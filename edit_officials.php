<?php
include('includes/db.php');
$barangay_id = $_GET['barangay_id'];

session_start();

if (!isset($_SESSION['id'])) {
    header('location: /login.php');
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

                        
                    <?php
                }
                    ?>
                    </div>
                </div>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>