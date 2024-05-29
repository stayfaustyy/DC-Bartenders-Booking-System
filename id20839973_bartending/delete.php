<?php
    // Connect to the database
    // Establish a database connection (replace placeholders with your own values)

$servername = "localhost";
$username = "root";
$password = "";
$database = "id20839973_bartending";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

    // Check if the connection is successful
    if ($conn) {
        // Check if the event ID is provided in the URL
        if (isset($_GET['id'])) {
            // Sanitize the input to prevent SQL injection
            $eventId = mysqli_real_escape_string($conn, $_GET['id']);

            // Construct the DELETE query
            $query = "DELETE FROM tb_book WHERE eventreason = '$eventId'";

            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if the deletion was successful
            if ($result) {
                echo "<div style='text-align: center;'>
        <p style='color: blue; font-weight: bold; font-size: 60px;'>Event deleted successfully.</p>
        <br>
        <a href='dashboard.php' style='text-decoration: none; font-size: 40px;'>Go back to Dashboard</a>
      </div>";

            } else {
                echo "Error deleting event: " . mysqli_error($conn);
            }
        } else {
            echo "Event ID not provided.";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
    ?>