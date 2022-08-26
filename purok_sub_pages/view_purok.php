<?php
include('../includes/db.php');

session_start();
$id = $_SESSION['id'];
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

// barangay id final result
$result_barangay_id = $row['barangay_id'];
$barangay_name = $row['barangay_name'];

// Get Purok data from purok
$get_data_purok = "SELECT * FROM purok WHERE purok_id = '$purok_id'";
$run_query_data = mysqli_query($conn, $get_data_purok);
$purok_data = mysqli_fetch_assoc($run_query_data);

// Purok final result
$result_purok_name = $purok_data['purok_name'];
$result_purok_address = $purok_data['purok_address'];
$result_purok_img = $purok_data['img'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png" type="image/png">
    <title>EBPMS</title>
    <?php include('../includes/head.php'); ?>
    <link rel="stylesheet" href="../css/style.css">


    <style>
        <?php
        if (!isset($_GET['edit'])) {
        ?>.alert.edit {
            display: none;
        }

        <?php
        }

        if (!isset($_GET['delete'])) {
        ?>.alert.delete {
            display: none;
        }

        <?php
        }

        if (!isset($_GET['add'])) {
        ?>.alert.add {
            display: none;
        }

        <?php
        }
        ?>
    </style>

</head>

<body class="dashboard-body">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
        <div class="navbar-logo-container">
            <a href="../index.php" class="navbar-brand">
                <img src="../images/logo.png"><span> EBPMS</span>
            </a>
        </div>
        <a class="navbar-brand" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class='bx bx-menu-alt-left menu-btn'></i>
        </a>

        <div class="container-fluid">
            <h5 class="welcome-message text-light">Welcome! Barangay <?php echo $barangay_name; ?></h5>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li>
                        <h3 class="welcome-message ">Welcome</h3>
                    </li>
                    <li class="nav-item">
                        <a href="../logout.php" class="nav-link logout-btn text-light"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Off Canvas Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="sidebar-header">
            <img src="../images/logo.png">
            <div class="sidebar-text-container">
                <h4><strong>EBPMS</strong></h4>
            </div>
            <div class="close-btn-container">
                <a class="close-btn-sidebar text-dark" role="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class='bx bx-x'></i></a>
            </div>
        </div>
        <div class="sidebar-body">
            <h5 class="welcome-message welcome-sidebar text-dark text-center mt-3">Welcome! <strong>Barangay
                    <?php echo $barangay_name; ?></strong></h5>
            <div class="sidebar-links">
                <ul>
                    <li class="<?= ($activePage == 'index') ? 'active' : ''; ?>">
                        <a href="../index.php" class="sidebar-link">Dashboard</a>
                    </li>
                    <li class="<?= ($activePage == 'view_purok') ? 'active' : ''; ?>">
                        <a href="../purok.php" class="sidebar-link">Purok/Sitio</a>
                    </li>
                    <li class="<?= ($activePage == 'population') ? 'active' : ''; ?>">
                        <a href="../population.php" class="sidebar-link">Population</a>
                    </li>
                    <li class="<?= ($activePage == 'household') ? 'active' : ''; ?>">
                        <a href="../household.php" class="sidebar-link">Household</a>
                    </li>
                    <li class="<?= ($activePage == 'beneficiaries') ? 'active' : ''; ?>">
                        <a href="../beneficiaries.php" class="sidebar-link">Beneficiaries</a>
                    </li>
                    <li class="<?= ($activePage == 'residents') ? 'active' : ''; ?>">
                        <a href="../residents.php" class="sidebar-link">Residents</a>
                    </li>
                    <li class="<?= ($activePage == 'certificates') ? 'active' : ''; ?>">
                        <a href="../certificates.php" class="sidebar-link">Certificates</a>
                    </li>
                    <li class="<?= ($activePage == 'officials') ? 'active' : ''; ?>">
                        <a href="../officials.php?barangay_id=<?php echo $result_barangay_id; ?>" class="sidebar-link">Barangay Officials</a>
                    </li>
                    <li>
                        <a href="../logout.php" class="sidebar-link logout-alt">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="button-container">
        <a href="../purok.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addResident"><i class="fa-solid fa-circle-plus"></i> Add Resident</button>
        <div class="btn-right">
            <button class="btn btn-success profile-button1" type="button" data-bs-toggle="modal" data-bs-target="#editPurok"><i class="fa-solid fa-address-card"></i></button>
        </div>
    </div>

    <div class="container">
        <div class="alert alert-success text-center m-3 delete"><span>Data has been Deleted!</span></div>
        <div class="alert alert-success text-center m-3 add"><span>Data has been Added!</span></div>
        <div class="alert alert-success text-center m-3 edit"><span>Data has been Edited!</span></div>
    </div>

    <?php
    if (!empty($purok_err)) {
    ?>
        <span class="alert alert-danger mb-3 m-3 d-flex justify-content-center" role="alert" style="display: block; ">
            <?php echo $first_name, $purok_err ?>
        </span>
    <?php
    }
    ?>

    <div class="dashboard-content pt-5">
        <div class="table-container table-responsive p-2">
            <table class="table table-striped table-hover table-sm text-center align-middle" id="datatable">
                <thead class="table-dark">
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM residents WHERE purok_id = '$purok_id'";
                    $run_query = mysqli_query($conn, $sql);
                    $i = 0;

                    while ($row = mysqli_fetch_assoc($run_query)) {
                        $no = ++$i;
                        $resident_id = $row['id'];
                        $first_name = $row['first_name'];
                        $middle_name = $row['middle_name'];
                        $last_name = $row['last_name'];
                        $residents_address = $row['residents_address'];
                        $gender = $row['gender'];
                        $dob = $row['dob'];

                        echo "
                        <tr>
                            <th>$no</th>
                            <td>$first_name " . "" . "$middle_name " . "" . "$last_name</td>
                            <td>$residents_address</td>
                            <td>$gender</td>
                            <td>$dob</td>
                            <td>
                                <div class='container d-flex justify-content-center'>
                                    <div class='m-1'>
                                        <a class='btn btn-success' data-bs-toggle='modal' role='button' data-bs-target='#print$resident_id'>
                                            <i class='fa-solid fa-print'></i>
                                        </a>
                                    </div>
                                    <div class='m-1'>
                                        <a class='btn btn-primary' data-bs-toggle='modal' role='button' data-bs-target='#view$resident_id'>
                                            <i class='fa-solid fa-id-card'></i>
                                        </a>
                                    </div>
                                    <div class='m-1'>
                                        <a class='btn btn-warning' data-bs-toggle='modal' role='button' data-bs-target='#edit$resident_id'>
                                            <i class='fa-solid fa-pen'></i>
                                        </a>
                                    </div>
                                    <div class='m-1'>
                                        <a href='#' class='btn btn-danger' data-bs-toggle='modal' role='button' data-bs-target='#delete$resident_id'>
                                            <i class='fa-solid fa-trash'></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include('modals.php'); ?>

    <?php include('../includes/foot.php'); ?>

</body>

</html>