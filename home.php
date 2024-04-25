<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php
        // Include the database connection file
        include 'db_connect.php';

        // Fetch data from the database
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);

        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Loop through each record and display it in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td contenteditable='true'>" . $row['name'] . "</td>";
                echo "<td contenteditable='true'>" . $row['matricNo'] . "</td>";
                echo "<td contenteditable='true'>" . $row['currentaddress'] . "</td>";
                echo "<td contenteditable='true'>" . $row['homeaddress'] . "</td>";
                echo "<td contenteditable='true'>" . $row['mobilephone'] . "</td>";
                echo "<td contenteditable='true'>" . $row['homephone'] . "</td>";
                echo "<td>";
                echo "<button>Edit</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            // Display a message if there are no records
            echo "<tr><td colspan='4'>No records found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
</body>
</html>
