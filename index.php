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


    <!-- Off Canvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="sidebar-header">
            <img src="images/logo.png">
            <div class="sidebar-text-container">
                <h4>EBPMS</h4>
            </div>
            <div class="close-btn-container">
                <span class="close-btn-sidebar"><i class='bx bx-x'></i></span>
            </div>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>