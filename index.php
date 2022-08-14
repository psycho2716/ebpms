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
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-house-user card-logo"></i>
                </div>
                <a href="officials.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">Barangay Officials</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="shine"></div>
                </a>

            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-group card-logo"></i>
                </div>
                <a href="population.php" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">Population</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

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
                        <h3 class="card-title text-center">Household</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

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
                        <h3 class="card-title text-center">Beneficiaries</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-users-line card-logo"></i>
                </div>
                <a href="residents" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">Residents</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-certificate card-logo"></i>
                </div>
                <a href="certificates" class="card-link">
                    <div class="card-body mt-5 text-light">
                        <h3 class="card-title text-center">Certificates</h3>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                    <div class="shine"></div>
                </a>
            </div>
        </div>

    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>