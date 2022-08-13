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
    <style>
        body {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/seal.png');
            background-position: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
        <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class='bx bx-menu-alt-left menu-btn'></i>
        </a>

        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dashboard-content">
        <div class="container-fluid grid-container">
            <div class="card dashboard-card card-1 h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-house-user card-logo"></i>
                </div>
                <div class="card-body mt-5 text-light">
                    <h3 class="card-title text-center">Barangay Officials</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div>
            </div>
            <div class="card dashboard-card card-2 h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-group card-logo"></i>
                </div>
                <div class="card-body mt-5 text-light">
                    <h3 class="card-title text-center">Population</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div>
            </div>
            <div class="card dashboard-card card-3 h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-roof card-logo"></i>
                </div>
                <div class="card-body mt-5 text-light">
                    <h3 class="card-title text-center">Household</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-people-arrows card-logo"></i>
                </div>
                <div class="card-body mt-5 text-light">
                    <h3 class="card-title text-center">Beneficiaries</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-users-line card-logo"></i>
                </div>
                <div class="card-body mt-5 text-light">
                    <h3 class="card-title text-center">Residents</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div>
            </div>
            <div class="card dashboard-card h-100">
                <div class="icon-background">
                    <i class="fa-solid fa-certificate card-logo"></i>
                </div>
                <div class="card-body mt-5 text-light">
                    <h3 class="card-title text-center">Certificates</h3>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                </div>
            </div>
        </div>

    </div>

    <!-- Off Canvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="sidebar-header">
            <img src="images/logo.png">
            <div class="sidebar-text-container">
                <h4>EBPMS</h4>
            </div>
            <div class="close-btn-container">
                <a class="close-btn-sidebar text-dark" role="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class='bx bx-x'></i></a>
            </div>
        </div>
        <div class="sidebar-body">
            <div class="sidebar-links">
                <ul>
                    <li class="active">
                        <a href="#" class="sidebar-link">Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Barangay Officials</a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Population</a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Household</a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Beneficiaries</a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Residents</a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link">Certificates</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>