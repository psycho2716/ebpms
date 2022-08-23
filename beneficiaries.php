<?php
include('includes/db.php');
include('includes/user_actions.php');

session_start();
$id = $_SESSION['id'];

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

// barangay id final result
$result_barangay_id = $row['barangay_id'];
$barangay_name = $row['barangay_name'];


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

    <div class="button-container">
        <a href="index.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
    </div>

    <div class="dashboard-content">
        <div class="container-fluid grid-container">
            <div class="card dashboard-card h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to view <?php echo $purok_name; ?>">
                <img src="images/logo_copy.png" class="official-logo">
                <a href="pwd.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">PWD's</h3>
                        <div class="barangay-card-img-container">
                            <img src="images/pwd-logo.png" class="beneficiaries-card-img img-fluid">
                        </div>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>

            <div class="card dashboard-card h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to view <?php echo $purok_name; ?>">
                <img src="images/logo_copy.png" class="official-logo">
                <a href="solo_parent.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">Solo Parent's</h3>
                        <div class="barangay-card-img-container">
                            <img src="images/solo-logo.png" class="beneficiaries-card-solo-img img-fluid">
                        </div>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>

            <div class="card dashboard-card h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to view <?php echo $purok_name; ?>">
                <img src="images/logo_copy.png" class="official-logo">
                <a href="4p_s.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">4P's Members</h3>
                        <div class="barangay-card-img-container">
                            <img src="images/4ps-logo.png" class="beneficiaries-card-img img-fluid">
                        </div>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>

            <div class="card dashboard-card h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to view <?php echo $purok_name; ?>">
                <img src="images/logo_copy.png" class="official-logo">
                <a href="senior.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">Senior Citizens</h3>
                        <div class="barangay-card-img-container">
                            <img src="images/senior-logo.png" class="beneficiaries-card-img img-fluid">
                        </div>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>