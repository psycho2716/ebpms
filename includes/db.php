<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ebpms";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if (!$conn) {
    die("Database Connection: Error");
}