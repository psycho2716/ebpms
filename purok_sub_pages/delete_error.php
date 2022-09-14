<?php
if (empty($password_err)) {
?>
    <div class="alert alert-danger text-center m-3 d-none"><?php echo $password_err; ?></div>
<?php
} else {
?>
    <div class="alert alert-danger text-center m-3 d-block"><?php echo $password_err; ?></div>
<?php
}
?>