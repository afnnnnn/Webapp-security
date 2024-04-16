<?php
// Include the database connection file
require_once 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and password from the form
    $email = $_POST['emaillogin'];
    $password = $_POST['passwordlogin'];

    // Perform the authentication
    if (authenticateUser($conn, $email, $password)) {
        echo "Successfully logged in";
    } else {
        echo "Invalid email or password";
    }

    // Close the connection
    $conn->close();
}

// Function to authenticate the user
function authenticateUser($conn, $email, $password) {
    // Query the database to check if the email and password match a registered user
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}
?>