<?php
include('includes/db.php');

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

// Add Resident
if (isset($_POST['add_resident'])) {
    $purok_id = $_GET['purok_id'];
    $barangay_id = $_GET['barangay_id'];

    $residents_name = $_POST['residents_name'];
    $residents_address = $_POST['residents_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $ethnicity = $_POST['ethnicity'];
    $civil_status = $_POST['civil_status'];

    $query = mysqli_query($conn, "SELECT * FROM residents WHERE residents_name = '$residents_name'");
    $fetch = mysqli_fetch_array($query);

    if (!$fetch) {
        mysqli_query($conn, "INSERT INTO residents (residents_name, residents_address, gender, dob, purok_id, barangay_id, civil_status, ethnicity)
        VALUES('$residents_name', '$residents_address', '$gender', '$dob', '$purok_id', '$barangay_id', '$civil_status', '$ethnicity')");

        header('location: residents.php?info=success');
    } else {
        $purok_err = " is already registered!";
    }
}

// Delete Resident
if (isset($_GET['delete_resident'])) {
    $id = $_GET['delete_resident'];
    $purok_id = $_GET['purok_id'];

    $sql = "DELETE FROM residents WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: residents.php?info=success');
        exit;
    } else {
        header('location: residents.php?info=failed');
    }
}

// Edit Resident
if (isset($_POST['edit_resident'])) {
    // Get edit id and purok id
    $id = $_GET['edit_id'];
    $purok_id = $_GET['purok_id'];

    // Store post values in a variable
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $occupation = $_POST['occupation'];
    $school_attainment = $_POST['school_attainment'];
    $blood_type = $_POST['blood_type'];
    $skills = $_POST['skills'];
    $citizenship = $_POST['citizenship'];
    $residents_address = $_POST['residents_address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $sql = "UPDATE residents SET first_name ='$first_name', residents_address = '$residents_address', gender = '$gender', dob = '$dob', middle_name = '$middle_name', last_name = '$last_name', occupation = '$occupation', school_attainment = '$school_attainment', blood_type = '$blood_type', skills = '$skills', citizenship = '$citizenship' WHERE id = $id ";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: residents.php?info=success');
        exit;
    } else {
        header('location: residents.php?info=failed');
        exit;
    }
}

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
        <a href="#" class="btn btn-success"><i class="fa-solid fa-file-arrow-down"></i> Export Data</a>
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

        echo "
                <div class='modal fade' id='edit$resident_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='staticBackdropLabel'><strong>Edit Resident Data</strong></h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form action='residents.php?purok_id=$purok_id&&edit_id=$resident_id' method='post'>
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
                                            <label>Address</label>
                                            <input type='text' name='residents_address' class='form-control' value='$residents_address' placeholder='Complete Address' required>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Gender</label>
                                            <select name='gender' class='form-control' >
                                                <option selected disabled> -- Select Gender -- </option>
                                                <option selected disabled value='$gender'>$gender</option>
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
                                            <select name='citizenship' class='form-control'>
                                                <option disabled> -- Select citizenship -- </option>
                                                <option selected disabled value='$citizenship'>$citizenship</option>
                                                <option value='Foreign'>Foreign</option>
                                                <option value='Filipino'>Filipino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Civil Status</label>
                                            <select name='civil_status' class='form-control'>
                                                <option selected disabled> -- Select Status -- </option>
                                                <option selected disabled value='$civil_status'>$civil_status</option>
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
                                    <button class='btn btn-primary my-3' name='edit_resident'>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>       
                ";
    }
    ?>

    <!-- Delete Modal -->
    <?php
    $sql = "SELECT * FROM residents";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $resident_id = $row['id'];
        $purok_id = $row['purok_id'];

        echo "
                    <div class='modal fade' id='delete$resident_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header bg-dark text-light'>
                                    <h5 class='modal-title' id='staticBackdropLabel'>Are you sure you want to delete?</h5>
                                    <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <h6>Resident data will be deleted.</h6>
                                </div>
                                <div class='modal-footer'>
                                    <a href='residents.php?delete_resident=$resident_id&&purok_id=$purok_id' type='button' class='btn btn-danger'>Delete</a>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
    }
    ?>

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
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id'>Barangay Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/certification.php?resident_id=$resident_id'>Certification</a>
                                </li>
                                <li>
                                    <a href='certs/business_clearance.php?resident_id=$resident_id'>Business Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id'>Barangay Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id'>Barangay Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id'>Barangay Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id'>Barangay Clearance</a>
                                </li>
                                <li>
                                    <a href='certs/barangay_clearance.php?resident_id=$resident_id'>Barangay Clearance</a>
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