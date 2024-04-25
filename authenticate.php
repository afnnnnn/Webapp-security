<?php
// Include the database connection file
require_once 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

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
// Start a session
session_start();

// Generate a session ID
$sessionId = session_id();

// Store the session ID in a session variable
$_SESSION['sessionId'] = $sessionId;

// Show the session ID to the user
echo "Session ID: " . $sessionId;
// Create a next button that sends the user to home.html
echo '<form action="home.php">
    <input type="submit" value="Next">
      </form>';
?>
?>
