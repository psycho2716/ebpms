<?php
include('includes/db.php');
include('includes/user_actions.php');
session_start();

if (isset($_SESSION['id'])) {
    header('location: index.php');
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <?php include('includes/head.php'); ?>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="landing-body">
    <?php include('includes/landing_nav.php'); ?>

    <div class="login-container">
        <div class="card mx-auto mt-5 login-form" style="max-width: 350px;">
            <div class="card-header login-header">
                <h1>Log In</h1>
                <img src="images/logo.png" class="card-logo" width="50px" height="50px">
            </div>
            <div class="card-body mt-2">

                <?php
                if (!empty($error)) {
                ?>
                    <span class="error-message mb-3" style="display: block; ">
                        <?php echo $error ?>
                    </span>
                <?php
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Enter Username">
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
                    </div>
                    <div class="row mb-3">
                        <div class="col input-container">
                            <label for="username">Password</label>
                            <input type="password" class="form-control form-input-password" name="password" placeholder="Enter Password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>
                        <div class="input-container">
                            <?php
                            if ($password_err !== "") {
                            ?>
                                <span class="error-message" style="display: block; ">
                                    <?php echo $password_err; ?>
                                </span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mt-2 w-100">Log In</button>

                </form>
            </div>
            <div class="card-footer">
                <span>Don't have an account? <a href="signup.php">Sign Up Here!</a></span>
            </div>


        </div>
    </div>


    <?php include('includes/foot.php'); ?>
</body>

</html>