<?php
include('includes/db.php');
session_start();

include('includes/db.php');
include('includes/user_actions.php');





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap Meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>

    <?php include('includes/head.php'); ?>

</head>

<body class="landing-body">
    <?php include('includes/landing_nav.php'); ?>


    <div class="container-fluid content">
        <div class="form-container">
            <div class="header-text-container">
                <h2>Barangay Registration Form</h2>
                <img src="images/logo.png">
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Barangay Name</label>
                        <select name="barangay_name" class="form-control" value="<?php echo $barangay_name; ?>" placeholder="Enter Barangay Name" required>
                            <option selected disabled> -- Select Barangay -- </option>
                            <option value="Agbaluto">Agbaluto</option>
                            <option value="Agpanabat">Agpanabat</option>
                            <option value="Agbudia">Agbudia</option>
                            <option value="Agnaga">Agnaga</option>
                            <option value="Agnay">Agnay</option>
                            <option value="Agnipa">Agbaluto</option>
                            <option value="Agbaluto">Agnipa</option>
                            <option value="Agtongo">Agtongo</option>
                            <option value="Alad (island barangay)">Alad (island barangay)</option>
                            <option value="Bagacay">Bagacay</option>
                            <option value="Cajimos">Cajimos</option>
                            <option value="Calabogo">Calabogo</option>
                            <option value="Capaclan">Capaclan</option>
                            <option value="Ginablan">Ginablan</option>
                            <option value="Guimpingan">Guimpingan</option>
                            <option value="Ilauran">Ilauran</option>
                            <option value="Lamao">Lamao</option>
                            <option value="Li-o">Li-o</option>
                            <option value="Logbon (island baranagay)">Logbon (island baranagay)</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Lonos">Lonos</option>
                            <option value="Macalas">Macalas</option>
                            <option value="Mapula">Mapula</option>
                            <option value="Cobrador(Naguso)">Cobrador(Naguso)</option>
                            <option value="palje">palje</option>
                            <option value="Barangay I (Poblacion)">Barangay I (Poblacion)</option>
                            <option value="Barangay II (Poblacion)">Barangay II (Poblacion)</option>
                            <option value="Barangay III (Poblacion)">Barangay III (Poblacion)</option>
                            <option value="Barangay IV (Poblacion)" >Barangay IV (Poblacion)</option>
                            <option value="Sablayan">Sablayan</option>
                            <option value="Sawang">Sawang</option>
                            <option value="Tambac">Tambac</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Barangay Captain</label>
                        <input type="text" name="barangay_captain" class="form-control" value="<?php echo $barangay_captain; ?>" placeholder="Enter Barangay Captain" required>
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $address; ?>" placeholder="Complete Address" required>
                    </div>
                </div>
                <div class="row mb-3 g-3">
                    <div class="col-md-6">
                        <label for="">Secretary</label>
                        <input type="text" name="secretary" class="form-control" value="<?php echo $secretary; ?>" placeholder="Secretary" required>
                    </div>
                    <div class="col-md-6">
                        <label for="">Treasurer</label>
                        <input type="text" name="treasurer" class="form-control" value="<?php echo $treasurer; ?>" placeholder="Treasurer" required>
                    </div>
                </div>
                <div class="row mb-3 mt-5">
                    <hr>
                    <div class="col-md-6 g-2">
                        <label for="">Kagawad 1</label>
                        <input type="text" name="kagawad_1" class="form-control" value="<?php echo $kagawad_1; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                    <div class="col-md-6 g-2">
                        <label for="">Kagawad 2</label>
                        <input type="text" name="kagawad_2" class="form-control" value="<?php echo $kagawad_2; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 g-2">
                        <label for="">Kagawad 3</label>
                        <input type="text" name="kagawad_3" class="form-control" value="<?php echo $kagawad_3; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                    <div class="col-md-6 g-2">
                        <label for="">Kagawad 4</label>
                        <input type="text" name="kagawad_4" class="form-control" value="<?php echo $kagawad_4; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6 g-2">
                        <label for="">Kagawad 5</label>
                        <input type="text" name="kagawad_5" class="form-control" value="<?php echo $kagawad_5; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                    <div class="col-md-6 g-2">
                        <label for="">Kagawad 6</label>
                        <input type="text" name="kagawad_6" class="form-control" value="<?php echo $kagawad_6; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6 g-2 mb-4">
                        <label for="">Kagawad 7</label>
                        <input type="text" name="kagawad_7" class="form-control" value="<?php echo $kagawad_7; ?>" placeholder="Barangay Kagawad" required>
                    </div>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Barangay Health Worker</label>
                        <input type="text" name="bhw" class="form-control" value="<?php echo $bhw; ?>" placeholder="Barangay Health Worker" required>
                    </div>
                    <div class="col">
                        <label for="">SK Kagawad</label>
                        <input type="text" name="sk_kagawad" class="form-control" value="<?php echo $sk_kagawad; ?>" placeholder="SK Kagawad" required>
                    </div>
                </div>
                <?php
                if (!empty($error)) {
                ?>
                    <span class="error-message mb-3" style="display: block; ">
                        <?php echo $error ?>
                    </span>
                <?php
                }
                ?>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username">
                        <?php
                        if ($username_err !== "") {
                        ?>
                            <span class="error-message" style="display: block; ">
                                <?php echo $username_err ?>
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <?php
                        if ($password_err !== "") {
                        ?>
                            <span class="error-message" style="display: block; ">
                                <?php echo $password_err ?>
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        <?php
                        if ($confirm_password_err !== "") {
                        ?>
                            <span class="error-message" style="display: block; ">
                                <?php echo $confirm_password_err ?>
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="container d-flex justify-content-end gap-2">
                    <button type="submit" name="signup" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('includes/foot.php'); ?>


</body>

</html>