<?php

// Generate a CSRF token and store it in the session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));}

// Set the Content-Security-Policy header(only allow scripts from the same domain)
header("Content-Security-Policy: script-src 'self'");

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

// Validate the email(XSS defense)
$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

//Prepare a statement for SQL query
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check the CSRF token
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    // CSRF token is invalid
    die('Invalid CSRF token');
}

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
