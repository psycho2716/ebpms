<?php
include('includes/db.php');

session_start();
$id = $_SESSION['id'];

if (!isset($_SESSION['id'])) {
    header('location: login.php');
}

$sql1 = "SELECT * FROM users WHERE id = $id";
$run_query1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($run_query1);
// Fetch barangay id from users table
$barangay_id = $row1['barangay_id'];

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

    <div class="dashboard-content">
        <div class="container-fluid grid-container">
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-house-user card-logo"></i>
                </div>
                <a href="purok.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h4 class="card-title text-center">Purok/Sitio</h4>
                        
                    </div>
                    <div class="card-footer">
                        <span class="text-light">More Details</span>
                    </div>
                    <div class="shine"></div>
                </a>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-group card-logo"></i>
                </div>
                <a href="residents.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h4 class="card-title text-center">Residents</h4>
                        
                    </div>
                    <div class="card-footer">
                        <span class="text-light">More Details</span>
                    </div>
                    <div class="shine"></div>
                </a>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-roof card-logo"></i>
                </div>
                <a href="household.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h4 class="card-title text-center">Household</h4>
                        
                    </div>
                    <div class="card-footer">
                        <span class="text-light">More Details</span>
                    </div>
                    <div class="shine"></div>
                </a>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-arrows card-logo"></i>
                </div>
                <a href="beneficiaries.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h4 class="card-title text-center">Beneficiaries</h4>
                        
                    </div>
                    <div class="card-footer">
                        <span class="text-light">More Details</span>
                    </div>
                    <div class="shine"></div>
                </a>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-certificate card-logo"></i>
                </div>
                <a href="certificates.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h4 class="card-title text-center">Certificates</h4>
                        <h2 class="card-text text-center">
                            
                        </h2>
                    </div>
                    <div class="card-footer">
                        <span class="text-light">More Details</span>
                    </div>
                    <div class="shine"></div>
                </a>
            </div>

        </div>

    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>