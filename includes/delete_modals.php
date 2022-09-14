<!-- Delete Modal -->
<?php
$sql = "SELECT * FROM residents";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $resident_id = $row['id'];

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
                                    <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#confirmDelete$resident_id'>Delete</button>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
}
?>

<!-- Confirm Delete Modal -->
<?php
$sql = "SELECT * FROM residents";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $resident_id = $row['id'];
    $purok_id = $row['purok_id'];
    $username = $_SESSION['username'];
    echo "
            <div class='modal fade' id='confirmDelete$resident_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <form action='" . $_SERVER['PHP_SELF'] . "?delete_resident=$resident_id&&purok_id=$purok_id&&username=$username' method='post'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='exampleModalLabel'>Please confirm delete!</h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <span>Please enter password to confirm!</span>
                                <input type='password' class='form-control mt-2' name='password' placeholder='Password' required>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                <button type='submit' class='btn btn-danger'>Confirm Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        ";
}
?>