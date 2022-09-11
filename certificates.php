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
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addCertificate"><i class="fa-solid fa-circle-plus"></i> Add Certificate</button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addCertificate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>New Certificate</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="certificates.php?barangay_id=<?php echo $result_barangay_id; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container mb-2 row">
                            <div class="col">
                                <label>Certificate Name</label>
                                <input type="text" name="certificate_name" class="form-control" placeholder="Certificate Name" required>
                            </div>
                        </div>
                        <div class="form-input-container mb-2 row">
                            <div class="col">
                                <label>Upload Certificate Image</label>
                                <input type="file" name="image" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary my-3" name="certificate_add">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <?php
        $sql = "SELECT * FROM certificates";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $certificate_id = $row['id'];

        echo "
                <div class='modal fade' id='deleteCertificate$certificate_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='staticBackdropLabel'>Are you sure you want to delete?</h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <h6>Certificate data will be deleted.</h6>
                            </div>
                            <div class='modal-footer'>
                                <a href='includes/user_actions.php?delete_certificate=$certificate_id' type='button' class='btn btn-danger'>Delete</a>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    }
    ?>

    <!-- View Certificate Modal -->
    <?php
    $sql = "SELECT * FROM certificates";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $certificate_id = $row['id'];
        $certificate_name = $row['certificate_name'];
        $img = $row['img'];

        echo "
                <div class='modal fade' id='certificate$certificate_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='staticBackdropLabel'>$certificate_name Document</h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <h6>Download Document.</h6>
                            </div>
                            <div class='modal-footer'>
                                <a href='uploads/$img' type='button' class='btn btn-success'><i class='fa-solid fa-download'></i> Download Document</a>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteCertificate$certificate_id'>Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    }
    ?>

    <?php
    if (!empty($purok_err)) {
    ?>
        <span class="alert alert-danger mb-3 m-3 d-flex justify-content-center" role="alert" style="display: block; ">
            <?php echo $purok_name, $purok_err ?>
        </span>
    <?php
    }
    ?>

    <div class="dashboard-content">
        <div class="container-fluid grid-container">
            <?php
            $sql = "SELECT * FROM certificates WHERE barangay_id = '$result_barangay_id'";
            $run_query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($run_query)) {
                $certificate_id = $row['id'];
                $certificate_name = $row['certificate_name'];
                $img = $row['img'];

            ?>
                <div class="card dashboard-card h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to view <?php echo $purok_name; ?>">
                    <img src="images/logo_copy.png" class="official-logo">
                    <a href="uploads/<?php echo $img; ?>" class="card-link">
                        <div class="card-body mt-5 text-light">
                            <h3 class="card-title text-center"><?php echo $certificate_name; ?></h3>
                            <div class="barangay-card-img-container">
                                <?php
                                if (!$img) {
                                ?>
                                    <img src="images/logo.png" class="certificate-card-img img-fluid">
                                <?php
                                } else {
                                ?>
                                    <img src="uploads/<?php echo $img; ?>" class="certificate-card-img img-fluid">
                                <?php
                                }
                                ?>
                                
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