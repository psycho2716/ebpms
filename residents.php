<?php
session_start();
$id = $_SESSION['id'];
$barangay_id = $_SESSION['barangay_id'];
$username = $_SESSION['username'];

include('includes/db.php');
include('includes/user_actions.php');

if (!isset($_SESSION['id'])) {
    header('location: login.php');
}

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
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <title>EBPMS</title>
    <?php include('includes/head.php'); ?>
    <link rel="stylesheet" href="css/style.css">

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
            <a href="index.php" class="navbar-brand">
                <img src="images/logo.png"><span> EBPMS</span>
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
                        <a href="logout.php" class="nav-link logout-btn text-light"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
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
                        <a href="index.php" class="sidebar-link">Dashboard</a>
                    </li>
                    <li class="<?= ($activePage == 'residents') ? 'active' : ''; ?>">
                        <a href="purok.php" class="sidebar-link">Purok/Sitio</a>
                    </li>
                    <li class="<?= ($activePage == 'population') ? 'active' : ''; ?>">
                        <a href="population.php" class="sidebar-link">Population</a>
                    </li>
                    <li class="<?= ($activePage == 'household') ? 'active' : ''; ?>">
                        <a href="household.php" class="sidebar-link">Household</a>
                    </li>
                    <li class="<?= ($activePage == 'beneficiaries') ? 'active' : ''; ?>">
                        <a href="beneficiaries.php" class="sidebar-link">Beneficiaries</a>
                    </li>
                    <li class="<?= ($activePage == 'residents') ? 'active' : ''; ?>">
                        <a href="residents.php" class="sidebar-link">Residents</a>
                    </li>
                    <li class="<?= ($activePage == 'certificates') ? 'active' : ''; ?>">
                        <a href="certificates.php" class="sidebar-link">Certificates</a>
                    </li>
                    <li class="<?= ($activePage == 'officials') ? 'active' : ''; ?>">
                        <a href="officials.php?barangay_id=<?php echo $result_barangay_id; ?>" class="sidebar-link">Barangay Officials</a>
                    </li>
                    <li>
                        <a href="logout.php" class="sidebar-link logout-alt">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="button-container">
        <a href="index.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <form method="post" action="includes/export.php?barangay_id=<?php echo $barangay_id; ?>">
            <button type="submit" name="export" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i> Export Data</button>
        </form>
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
            <?php echo $residents_name, $purok_err ?>
        </span>
    <?php
    }
    ?>
    
    <?php include('includes/delete_error.php'); ?>
    
    <div class="dashboard-content pt-4">
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
                    $sql = "SELECT * FROM residents WHERE barangay_id = '$barangay_id'";
                    $run_query = mysqli_query($conn, $sql);
                    $i = 0;

                    while ($row = mysqli_fetch_assoc($run_query)) {
                        $no = ++$i;
                        $resident_id = $row['id'];
                        $first_name = $row['first_name'];
                        $middle_name = $row['middle_name'];
                        $last_name = $row['last_name'];
                        $occupation = $row['occupation'];
                        $school_attainment = $row['school_attainment'];
                        $blood_type = $row['blood_type'];
                        $skills = $row['skills'];
                        $citizenship = $row['citizenship'];
                        $residents_address = $row['residents_address'];
                        $gender = $row['gender'];
                        $dob = $row['dob'];

                        echo "
                        <tr>
                            <th>$no</th>
                            <td>$first_name " . " $middle_name<span> $last_name</span></td>
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

    <!-- Residents Profile Modal -->
    <?php
    $sql = "SELECT * FROM residents";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $resident_id = $row['id'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $residents_address = $row['residents_address'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $citizenship = $row['citizenship'];
        $civil_status = $row['civil_status'];
        $occupation = $row['occupation'];
        $school_attainment = $row['school_attainment'];
        $skills = $row['skills'];
        $blood_type = $row['blood_type'];
        $purok_id = $row['purok_id'];
        $household_type = $row['household_type'];
        $four_ps = $row['4p_s'];
        $pwd = $row['pwd'];
    ?>
        <div class="modal fade" id="view<?php echo $resident_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="staticBackdropLabel"><strong>Informations</strong></h5>
                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-profile-card">
                            <div class="profile-header">
                                <img src="images/logo.png">
                            </div>
                            <div class="profile-body mt-2">
                                <div class="body-header text-center">
                                    <h4><?php echo $last_name . ", " . $first_name; ?><span> <?php echo $middle_name; ?></span></h4>
                                    <span>
                                        <?php
                                        if ($household_type === "Head") {
                                            echo "Head of Household";
                                        } else {
                                            echo "Member of Household";
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="profile-text mt-3">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Date of Birth: <?php echo $dob; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Address: <?php echo $residents_address; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Citizenship: <?php echo $citizenship; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Civil Status: <?php echo $civil_status; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>School Attainment: <?php echo $school_attainment; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Occupation: <?php echo $occupation; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Skills: <?php echo $skills; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Blood Type: <?php echo $blood_type; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>4P's: <?php echo $four_ps; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>PWD: <?php echo $pwd; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- Edit Modal -->
    <?php
    $sql = "SELECT * FROM residents";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $resident_id = $row['id'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $residents_address = $row['residents_address'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $civil_status = $row['civil_status'];
        $occupation = $row['occupation'];
        $school_attainment = $row['school_attainment'];
        $skills = $row['skills'];
        $blood_type = $row['blood_type'];
        $citizenship = $row['citizenship'];
        $purok_id = $row['purok_id'];
        $household_type = $row['household_type'];
        $four_ps = $row['4p_s'];
        $pwd = $row['pwd'];

        if ($household_type === "Head") {
            $household_type_result = "Head of Household";
        } else {
            $household_type_result = "Member of Household";
        }

        echo "
                <div class='modal fade' id='edit$resident_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='staticBackdropLabel'><strong>Edit Resident Data</strong></h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form action='residents.php?edit_id=$resident_id' method='post'>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col-md-4'>
                                            <label>Last Name</label>
                                            <input type='text' name='last_name' class='form-control' value='$last_name' placeholder='Last Name' required>
                                        </div>
                                        <div class='col-md-4'>
                                            <label>First Name</label>
                                            <input type='text' name='first_name' class='form-control' value='$first_name' placeholder='First Name' required>
                                        </div>
                                        <div class='col-md-4'>
                                            <label>M.I</label>
                                            <input type='text' name='middle_name' class='form-control' value='$middle_name' placeholder='Middle Name' required>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Household Type</label>
                                            <select name='household_type' class='form-control'>
                                                <option selected value='$household_type'> $household_type_result </option>
                                                <option value='Head'>Head of Household</option>
                                                <option value='Member'>Member of Household</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Address</label>
                                            <input type='text' name='residents_address' class='form-control' value='$residents_address' placeholder='Complete Address' required>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Gender</label>
                                            <select name='gender' class='form-control' >
                                                <option disabled> -- Select Gender -- </option>
                                                <option class='selected-item' selected value='$gender'>$gender</option>
                                                <option value='Male'>Male</option>
                                                <option value='Female'>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Date of Birth</label>
                                            <input type='date' name='dob' class='form-control' value='$dob' required>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Citizenship</label>
                                            <input type='text' name='citizenship' class='form-control' value='$citizenship' placeholder='Citizenship' required>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Civil Status</label>
                                            <select name='civil_status' class='form-control'>
                                                <option disabled> -- Select Status -- </option>
                                                <option selected value='$civil_status'>$civil_status</option>
                                                <option value='Single'>Single</option>
                                                <option value='Married'>Married</option>
                                                <option value='Divorced'>Divorced</option>
                                                <option value='Single Parent'>Single Parent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Occupation</label>
                                            <input type='text' name='occupation' value='$occupation' placeholder='Occupation' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>School Attainment</label>
                                            <input type='text'  name='school_attainment' value='$school_attainment' placeholder='School Attainment' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Skills</label>
                                            <input type='text'  name='skills' value='$skills' placeholder='Skills' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Blood Type</label>
                                            <input type='text'  name='blood_type' value='$blood_type' placeholder='Blood Type' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>4P's</label>
                                            <select name='four_ps' class='form-control'>
                                                <option selected value='$four_ps'>$four_ps</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>PWD</label>
                                            <select name='pwd' class='form-control'>
                                                <option selected value='$pwd'>$pwd</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button class='btn btn-primary my-3' name='edit_resident'>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>       
                ";
    }
    ?>

    <?php include('includes/delete_modals.php'); ?>

    <!-- Print Modal -->
    <?php
    $sql = "SELECT * FROM residents";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $resident_id = $row['id'];

        echo "
                <div class='modal fade' id='print$resident_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='staticBackdropLabel'>Certificates and Documents</h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='cert-modal-body modal-body'>
                            <ol>
                                <li>
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Barangay Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/business_clearance.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Business Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/certification.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Certification</a>
                                </li>
                                <li>
                                    <a href='certs/certificate_of_travel.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Certificate of Travel</a>
                                </li>
                                <li>
                                    <a href='certs/requirements_to_travel.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Requirements to Travel Certification</a>
                                </li>
                                <li>
                                    <a href='certs/travel_acceptance.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Travel Acceptance Certification</a>
                                </li>
                                <li>
                                    <a href='certs/cattle_sale.php?resident_id=$resident_id&&purok_id=$purok_id&&residents'>Certification Sale of Large Cattle</a>
                                </li>
                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    }
    ?>

    <?php include('includes/foot.php'); ?>

</body>

</html>