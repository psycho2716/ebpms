<?php
include 'db.php';

$output = '';
if (isset($_POST["export"])) {
    $barangay_id = $_GET['barangay_id'];

    $query = "SELECT * FROM residents WHERE barangay_id = '$barangay_id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
            <table class="table" bordered="1">  
                    <tr>  
                        <th>No.</th> 
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Address</th>  
                        <th>Gender</th>  
                        <th>Date of Birth Type</th>  
                        <th>Citizenship</th>  
                        <th>Civil Status</th>
                        <th>School Attainment</th>
                        <th>Skills</th>
                        <th>Blood Type</th>
                        <th>4p\'s</th>
                        <th>PWD</th>
                    </tr>
            ';
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $sl = ++$i;
            $output .= '
                    <tr>  
                        <td > ' . $sl . ' </td>
                        <td>' . $row["last_name"] . '</td>  
                        <td>' . $row["first_name"] . '</td>  
                        <td>' . $row["middle_name"] . '</td>  
                        <td>' . $row["residents_address"] . '</td>  
                        <td>' . $row["gender"] . '</td>  
                        <td>' . $row["dob"] . '</td> 
                        <td>' . $row["citizenship"] . '</td>  
                        <td>' . $row["civil_status"] . '</td>  
                        <td>' . $row["school_attainment"] . '</td> 
                        <td>' . $row["skills"] . '</td> 
                        <td>' . $row["blood_type"] . '</td>
                        <td>' . $row["4p_s"] . '</td>
                        <td>' . $row["pwd"] . '</td>
                    </tr>
                ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=Record Of Barangay Inhabitants.xls');
        echo $output;
    }
}

?>