<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "HospitalReceptionistPotal";

// Create connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("You could not connect: " . mysqli_connect_error());
}
?>
