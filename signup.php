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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
       <a href="#" class="navbar-brand">
        EBPMSDIDA
       </a>

       <ul class="navbar-nav">
           <li class="nav-item">
               <a class="nav-link" href="login.html">LOGIN</a>
           </li>
           <li class="nav-item">
            <a class="nav-link" href="bregistration.html">REGISTER</a>
        </li>
       </ul>
    </div>
  </nav>

    <div class="card mx-auto mt-5" style="width: 350px;">
        <div class="card-header">
            <h1>LOGIN FORM</h1>
        </div>
        <div class="card-body mt-2">
            <div class="alert alert-danger empty_input">
                <?php echo $input_error; ?>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label for="username">USERNAME</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username"> 
                
                <label for="username">PASSWORD</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                
                <label for="password">CONFIRM PASSWORD</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                <button type="submit" name="signup" class="btn btn-primary mt-2">Log In</button>
               
            </form>
        </div>
        <div class="card-footer">
            <p>Forget Password <a href="#">click here</a></p> 
        </div>


</div>
  

    


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>