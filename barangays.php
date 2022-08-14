<?php
include('includes/db.php');

session_start();

if (!isset($_SESSION['id'])) {
    header('location: login.php');
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

    <div class="dashboard-content">
        <div class="container-fluid grid-container">
            <?php
            $sql = "SELECT * FROM users";
            $run_query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($run_query)) {
                $id = $row['id'];
                $barangay_name = $row['barangay_name'];

            ?>
                <div class="card dashboard-card h-100">
                    <img src="images/logo_copy.png" class="official-logo">
                    <a href="officials.php" class="card-link">
                        <div class="card-body mt-5 text-light">
                            <h3 class="card-title text-center"><?php echo $barangay_name; ?></h3>
                            <div class="barangay-card-img-container">
                                <img src="images/bg.jpg" class="barangay-card-img">
                            </div>

                        </div>
                        <div class="shine"></div>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>

    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>