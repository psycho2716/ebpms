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
    <?php include('includes/dashboard_nav.php'); ?>

    <?php include('includes/off_canvas_menu.php'); ?>

    <div class="button-container">
        <a href="index.php" class="btn btn-danger"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addPurok"><i class="fa-solid fa-circle-plus"></i> Add Purok</button>
    </div>

    <div class="container">
        <div class="alert alert-success text-center m-3 delete"><span>Data has been Deleted!</span></div>
        <div class="alert alert-success text-center m-3 add"><span>Data has been Added!</span></div>
        <div class="alert alert-success text-center m-3 edit"><span>Data has been Edited!</span></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addPurok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>New Purok</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="purok.php?barangay_id=<?php echo $result_barangay_id; ?>" method="post">
                        <div class="form-input-container mb-2 row">
                            <div class="col">
                                <label>Purok/Sitio Name</label>
                                <input type="text" name="purok_name" class="form-control" placeholder="Purok or Sitio" required>
                            </div>
                        </div>
                        <div class="form-input-container row">
                            <div class="col">
                                <label>Address</label>
                                <input type="text" name="purok_address" class="form-control" placeholder="Complete Address" required>
                            </div>
                        </div>
                        <button class="btn btn-primary my-3" name="purok_add">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
            $sql = "SELECT * FROM purok WHERE barangay_id = '$result_barangay_id'";
            $run_query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($run_query)) {
                $id = $row['id'];
                $purok_name = $row['purok_name'];
                $purok_image = $row['img'];

            ?>
                <div class="card dashboard-card h-100" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to view <?php echo $purok_name; ?>">
                    <img src="images/logo_copy.png" class="official-logo">
                    <a href="purok_sub_pages/view_purok.php?purok_id=<?php echo $row['purok_id']; ?>" class="card-link">
                        <div class="card-body mt-5 text-light">
                            <h3 class="card-title text-center"><?php echo $purok_name; ?></h3>
                            <div class="barangay-card-img-container">
                                <?php
                                if (!$purok_image) {
                                ?>
                                    <img src="images/logo.png" class="barangay-card-img img-fluid">
                                <?php
                                } else {
                                ?>
                                    <img src="uploads/<?php echo $purok_image; ?>" class="barangay-card-img img-fluid">
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