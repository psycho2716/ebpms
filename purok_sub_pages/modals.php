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
        $household_type = $row['household_type'];
        $four_ps = $row['4p_s'];
        $pwd = $row['pwd'];

        echo "
                <div class='modal fade' id='edit$resident_id' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header bg-dark text-light'>
                                <h5 class='modal-title' id='staticBackdropLabel'><strong>Edit Resident Data</strong></h5>
                                <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form action='purok_sub_pages_actions.php?purok_id=$purok_id&&edit_id=$resident_id' method='post'>
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
                                            <label>Household Type</label>
                                            <select name='household_type' class='form-control'>
                                                <option selected value='$household_type'> $household_type </option>
                                                <option value='Head'>Head of Household</option>
                                                <option value='Member'>Member of Household</option>
                                            </select>
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
                                                <option disabled> -- Select Gender -- </option>
                                                <option class='selected-item' selected value='$gender'>$gender</option>
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
                                            <input type='text' name='citizenship' class='form-control' value='$citizenship' placeholder='Citizenship' required>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>Civil Status</label>
                                            <select name='civil_status' class='form-control'>
                                                <option disabled> -- Select Status -- </option>
                                                <option selected value='$civil_status'>$civil_status</option>
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
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>4P's</label>
                                            <select name='four_ps' class='form-control'>
                                                <option selected value='$four_ps'>$four_ps</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-input-container row mb-2'>
                                        <div class='col'>
                                            <label>PWD</label>
                                            <select name='pwd' class='form-control'>
                                                <option selected value='$pwd'>$pwd</option>
                                                <option value='Yes'>Yes</option>
                                                <option value='No'>No</option>
                                            </select>
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

    <!-- Delete Resident Modal -->
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
                                <a href='purok_sub_pages_actions.php?delete_resident=$resident_id&&purok_id=$purok_id' type='button' class='btn btn-danger'>Delete</a>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            ";
    }
    ?>

    <!-- Delete Purok Modal -->
    <div class='modal fade' id='deletePurok' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header bg-dark text-light'>
                    <h5 class='modal-title' id='staticBackdropLabel'>Are you sure you want to delete?</h5>
                    <button type='button' class='btn-close bg-light' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <h6>Purok data will be deleted.</h6>
                </div>
                <div class='modal-footer'>
                    <a href='purok_sub_pages_actions.php?delete_purok=<?php echo $_GET['purok_id']; ?>' type='button' class='btn btn-danger'>Delete</a>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>New Resident</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="purok_sub_pages_actions.php?purok_id=<?php echo $_GET['purok_id']; ?>&&barangay_id=<?php echo $barangay_id; ?>" method="post">
                        <div class="form-input-container row mb-2">
                            <div class="col-md-4">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="col-md-4">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col-md-4">
                                <label>M.I</label>
                                <input type="text" name="middle_name" class="form-control" placeholder="Middle Name" required>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Household Type</label>
                                <select name="household_type" class="form-control">
                                    <option selected disabled> -- Select Household Type -- </option>
                                    <option value="Head">Head of Household</option>
                                    <option value="Member">Member of Household</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Address</label>
                                <input type="text" name="residents_address" class="form-control" value="<?php echo $result_purok_address; ?>" placeholder="Complete Address" required>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option selected disabled> -- Select Gender -- </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Citizenship</label>
                                <input type="text" name="citizenship" placeholder="Citizenship" class="form-control">
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Civil Status</label>
                                <select name="civil_status" class="form-control">
                                    <option selected disabled> -- Select Status -- </option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Single Parent">Single Parent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Occupation</label>
                                <input type="text" name="occupation" placeholder="Occupation" class="form-control">
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>School Attainment</label>
                                <input type="text" name="school_attainment" placeholder="School Attainment" class="form-control">
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Skills</label>
                                <input type="text" name="skills" placeholder="Skills" class="form-control">
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Blood Type</label>
                                <input type="text" name="blood_type" placeholder="Blood Type" class="form-control">
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>4P's</label>
                                <select name="four_ps" class="form-control">
                                    <option selected value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>PWD</label>
                                <select name="pwd" class="form-control">
                                    <option selected value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary my-3" name="add_resident">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Purok Profile Modal -->
    <div class="modal fade" id="editPurok" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Purok Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="profile-img-container" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Click to update photo!">
                        <a class='btn btn-warning' data-bs-toggle='modal' role='button' data-bs-target='#editPhoto' style="text-decoration: none; ">
                            <?php
                            if (!$result_purok_img) {
                            ?>
                                <img src="../images/logo.png" class="profile-image img-fluid" style="width: 200px; ">
                            <?php
                            } else {
                            ?>
                                <img src="../uploads/<?php echo $result_purok_img; ?>" class="profile_image img-fluid" style="width: 200px; ">
                            <?php
                            }
                            ?>
                        </a>
                    </div>
                    <div class="form-input-container row mb-2">
                        <div class="col">
                            <label>Purok Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $result_purok_name; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-input-container row mb-2">
                        <div class="col">
                            <label>Address</label>
                            <input type="text" name="residents_address" class="form-control" value="<?php echo $result_purok_address; ?>" disabled>
                        </div>
                    </div>

                    <div class="container d-flex justify-content-end gap-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editPurokInfo">Update Info</button>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal' data-bs-target="#deletePurok<?php echo $resident_id; ?>">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Purok Profile  Info Modal -->
    <div class="modal fade" id="editPurokInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Purok Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="purok_sub_pages_actions.php?purok_id=<?php echo $_GET['purok_id']; ?>" method="post">
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Purok Name</label>
                                <input type="text" name="purok_name" class="form-control" value="<?php echo $result_purok_name; ?>">
                            </div>
                        </div>
                        <div class="form-input-container row mb-2">
                            <div class="col">
                                <label>Address</label>
                                <input type="text" name="purok_address" class="form-control" value="<?php echo $result_purok_address; ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="edit_purok">Submit</button>
                    </form>

                    <div class="container d-flex justify-content-end gap-2">
                        <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#editPurok'>Back</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Edit Purok Profile Photo Modal -->
    <div class="modal fade" id="editPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="staticBackdropLabel"><strong>Purok Profile</strong></h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="purok_sub_pages_actions.php?purok_id=<?php echo $_GET['purok_id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-input-container row mb-3">
                            <div class="col">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="container d-flex justify-content-end gap-1">
                            <button class="btn btn-primary" type="submit" name="upload_profile">Confirm</button>
                            <button class='btn btn-danger' data-bs-toggle='modal' type='button' data-bs-target='#editPurok'>Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Residents Profile Modal -->
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
        $citizenship = $row['citizenship'];
        $civil_status = $row['civil_status'];
        $occupation = $row['occupation'];
        $school_attainment = $row['school_attainment'];
        $skills = $row['skills'];
        $blood_type = $row['blood_type'];
        $purok_id = $row['purok_id'];
        $household_type = $row['household_type'];
        $four_ps = $row['4p_s'];
        $pwd = $row['pwd'];
    ?>
        <div class="modal fade" id="view<?php echo $resident_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="staticBackdropLabel"><strong>Informations</strong></h5>
                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-profile-card">
                            <div class="profile-header">
                                <img src="../images/logo.png">
                            </div>
                            <div class="profile-body mt-2">
                                <div class="body-header text-center">
                                    <h4><?php echo $last_name . ", " . $first_name; ?><span> <?php echo $middle_name; ?></span></h4>
                                    <span>
                                        <?php
                                        if ($household_type === "Head") {
                                            echo "Head of Household";
                                        } else {
                                            echo "Member of Household";
                                        }
                                        ?>
                                    </span>
                                </div>
                                <div class="profile-text mt-3">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Date of Birth: <?php echo $dob; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Address: <?php echo $residents_address; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Citizenship: <?php echo $citizenship; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Civil Status: <?php echo $civil_status; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>School Attainment: <?php echo $school_attainment; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Occupation: <?php echo $occupation; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Skills: <?php echo $skills; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>Blood Type: <?php echo $blood_type; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>4P's: <?php echo $four_ps; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <span>PWD: <?php echo $pwd; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

    <!-- Print Modal -->
    <?php
    $sql = "SELECT * FROM residents";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $resident_id = $row['id'];

    ?>
        <div class="modal fade" id="print<?php echo $resident_id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="staticBackdropLabel">Certificates and Documents</h5>
                        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="cert-modal-body modal-body">
                        <ol>
                            <li>
                                <a href="../certs/barangay_clearance.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Barangay Clearance</a>
                            </li>
                            <li>
                                <a href="../certs/business_clearance.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Business Clearance</a>
                            </li>
                            <li>
                                <a href="../certs/certification.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Certification</a>
                            </li>
                            <li>
                                <a href="../certs/certificate_of_travel.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Certificate of Travel</a>
                            </li>
                            <li>
                                <a href="../certs/requirements_to_travel.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Requirements to Travel Certification</a>
                            </li>
                            <li>
                                <a href="../certs/travel_acceptance.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Travel Acceptance Certification</a>
                            </li>
                            <li>
                                <a href="../certs/cattle_sale.php?resident_id=<?php echo $resident_id; ?>&&purok_id=<?php echo $row['purok_id']; ?>&&view_purok">Certification Sale of Large Cattle</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>