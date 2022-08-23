<?php
include('includes/db.php');
$barangay_id = $_GET['barangay_id'];

session_start();

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
    <title>EBPMS</title>
    <?php include('includes/head.php'); ?>
</head>

<body class="dashboard-body">
    <?php include('includes/dashboard_nav.php'); ?>

    <?php include('includes/off_canvas_menu.php'); ?>

    <div class="barangay-content">
        <div class="container document-format-container">
            <div class="document-header-container">
                <div class="document-header">
                    <div class="document-logo-container">
                        <img src="images/logo.png" alt="">
                    </div>
                    <div class="document-header-text">
                        <h4>Republic of the Philippines</h4>
                        <span>Municipality of Romblon</span>
                    </div>
                    <div class="document-logo-container">
                        <img src="images/seal.png" alt="">
                    </div>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM barangays WHERE barangay_id = '$barangay_id'";
            $run_query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($run_query)) {
                $id = $row['id'];
                $barangay_name = $row['barangay_name'];
                $barangay_captain = $row['barangay_captain'];
                $secretary = $row['secretary'];
                $treasurer = $row['treasurer'];
                $kagawad_1 = $row['kagawad_1'];
                $kagawad_2 = $row['kagawad_2'];
                $kagawad_3 = $row['kagawad_3'];
                $kagawad_4 = $row['kagawad_4'];
                $kagawad_5 = $row['kagawad_5'];
                $kagawad_6 = $row['kagawad_6'];
                $kagawad_7 = $row['kagawad_7'];
                $bhw = $row['bhw'];
                $sk_chairman = $row['sk_chairman'];

            ?>
                <div class="document-body">
                    <h3>Barangay <?php echo $barangay_name; ?> Officials</h3>
                    <div class="officials">

                        <a href="edit_officials.php?official_name=<?php echo $barangay_captain; ?>&&position=Barangay Captain" class="official-card-link officials-official-link-1">
                            <div class="card custom-card card-1 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Barangay Captain</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $barangay_captain; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $secretary; ?>&&position=Secretary" class="official-card-link officials-official-link-2">
                            <div class="card custom-card card-2 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Secretary</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $secretary; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $treasurer; ?>&&position=Treasurer" class="official-card-link officials-official-link-3">
                            <div class="card custom-card card-3 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Treasurer</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $treasurer; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_1; ?>&&position=Kagawad 1" class="official-card-link officials-official-link-4">
                            <div class="card custom-card card-4 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 1</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_1; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_2; ?>&&position=Kagawad 2" class="official-card-link officials-official-link-5">
                            <div class="card custom-card card-5 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 2</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_2; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_3; ?>&&position=Kagawad 3" class="official-card-link officials-official-link-6">
                            <div class="card custom-card card-6 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 3</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_3; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_4; ?>&&position=Kagawad 4" class="official-card-link officials-official-link-7">
                            <div class="card custom-card card-7 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 4</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_4; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_5; ?>&&position=Kagawad 5" class="official-card-link officials-official-link-8">
                            <div class="card custom-card card-8 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 5</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_5; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_6; ?>&&position=Kagawad 6" class="official-card-link officials-official-link-9">
                            <div class="card custom-card card-9 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 6</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_6; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $kagawad_7; ?>&&position=Kagawad 7" class="official-card-link officials-official-link-10">
                            <div class="card custom-card card-10 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Kagawad 7</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $kagawad_7; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $bhw; ?>&&position=Barangay Health Worker" class="official-card-link officials-official-link-11">
                            <div class="card custom-card card-11 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">Barangay Health Worker</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $bhw; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                        <a href="edit_officials.php?official_name=<?php echo $sk_chairman; ?>&&position=SK Kagawad" class="official-card-link officials-official-link-12">
                            <div class="card custom-card card-12 mb-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-3 custom-card-img-container">
                                        <img src="images/logo.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body custom-card-body">
                                            <div class="custom-card-header">
                                                <h4 class="card-title text-center">SK Kagawad</h4>
                                            </div>
                                            <div class="custom-card-text">
                                                <h5 class="card-text text-center"><?php echo $sk_chairman; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="official-shine"></div>
                            </div>
                        </a>
                    <?php
                }
                    ?>
                    </div>
                </div>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>

</body>

</html>