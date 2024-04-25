<?php

// Include the database connection file
require_once 'db_connect.php';

$name = $_POST['name'];
$matricNo = isset($_POST['matricNo']) ? $_POST['matricNo'] : '';
$currentaddress = isset($_POST['currentaddress']) ? $_POST['currentaddress'] : '';
$homeaddress = isset($_POST['homeaddress']) ? $_POST['homeaddress'] : '';
$mobilephone = isset($_POST['mobilephone']) ? $_POST['mobilephone'] : '';
$homephone = isset($_POST['homephone']) ? $_POST['homephone'] : '';
$email = $_POST['email'];
$password = $_POST['password'];


// Repeat for other fields

$sql = "INSERT INTO users ( name, matricNo, currentaddress, homeaddress, email, mobilephone, homephone, password)
VALUES ('$name', '$matricNo', '$currentaddress', '$homeaddress', '$email', '$mobilephone', '$homephone', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    exit( "Error: " . $sql . "<br>" . $conn->error);
}

//$conn->close();

?>
