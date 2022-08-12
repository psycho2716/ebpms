<?php
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
    <title>Test Document</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        <?php
            if ($input_error != "") {
        ?>
            .empty_input{
                display: block;
            }
        <?php
            }
        ?>
    </style>
    
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="images/logo.png"> EBPMSDIDA
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid content">
        <div class="form-container">
            <div class="header-text-container">
                <h2>Barangay Registration Form</h2>
                <img src="images/logo.png">
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Barangay Name</label>
                        <input type="text" name="barangay_name" class="form-control" placeholder="Enter Barangay Name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Barangay Captain</label>
                        <input type="text" name="barangay_captain" class="form-control" placeholder="Enter Barangay Captain" required>
                    </div>
                    
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Complete Address" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Treasurer</label>
                        <input type="text" name="treasurer" class="form-control" placeholder="Treasurer" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Secretary</label>
                        <input type="text" name="secretary" class="form-control" placeholder="Secretary" required>
                    </div>
                </div>
                <div class="row mb-3 mt-5">
                    <div class="col">
                        <label for="">Kagawad 1</label>
                        <input type="text" name="kagawad_1" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                    <div class="col">
                        <label for="">Kagawad 2</label>
                        <input type="text" name="kagawad_2" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="">Kagawad 3</label>
                        <input type="text" name="kagawad_3" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                    <div class="col">
                        <label for="">Kagawad 4</label>
                        <input type="text" name="kagawad_4" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="">Kagawad 5</label>
                        <input type="text" name="kagawad_5" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                    <div class="col">
                        <label for="">Kagawad 6</label>
                        <input type="text" name="kagawad_6" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <label for="">Kagawad 7</label>
                        <input type="text" name="kagawad_7" class="form-control" placeholder="Barangay Kagawad" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Barangay Health Worker</label>
                        <input type="text" name="bhw" class="form-control" placeholder="Barangay Health Worker" required>
                    </div>
                    <div class="col">
                        <label for="">SK Kagawad</label>
                        <input type="text" name="sk_kagawad" class="form-control" placeholder="SK Kagawad" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="col">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col">
                        <label for="">Confirm Password</label>
                        <input type="text" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="container d-flex justify-content-end gap-2">
                    <button type="submit" name="signup" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- External JS -->
    <script type="module" src="js/app.js"></script>

</body>

</html>