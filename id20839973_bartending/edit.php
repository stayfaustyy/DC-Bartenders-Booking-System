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

        // Construct the SELECT query
        $query = "SELECT * FROM tb_book WHERE eventreason = '$eventId'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if a matching record is found
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Retrieve the column values
            $eventReason = $row['eventreason'];
            $eventSpaceType = $row['eventspacetype'];
            $venueName = $row['venuename'];
            $eventAddress = $row['eventaddress'];
            $country = $row['country'];
            $city = $row['city'];
            $eventDate = $row['eventdate'];
            $guestCount = $row['guestcount'];
            $eventComments = $row['eventcomments'];
            // Add more columns and corresponding variables as necessary

            // Display the form with pre-filled values
            echo "
            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit Event</title>
                <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap' rel='stylesheet'>
                <link rel='stylesheet' type='text/css' href='stylev2.css'>
            </head>
            <body>
                <h1>Edit Event</h1>
                <form action='update.php' method='POST'>
                    <input type='hidden' name='eventId' value='$eventReason'>
                    <label>Event Reason:</label>
                    <input type='text' name='eventReason' value='$eventReason'><br>

        
                    <label>Event Space Type:</label>
                    <input type='text' name='eventSpaceType' value='$eventSpaceType'><br>

                    <label>Venue Name:</label>
                    <input type='text' name='venueName' value='$venueName'><br>

                    <label>Event Address:</label>
                    <input type='text' name='eventAddress' value='$eventAddress'><br>

                    <label>Country:</label>
                    <input type='text' name='country' value='$country'><br>

                    <label>City:</label>
                    <input type='text' name='city' value='$city'><br>

                    <label>Event Date:</label>
                    <input type='text' name='eventDate' value='$eventDate'><br>

                    <label>Guest Count:</label>
                    <input type='text' name='guestCount' value='$guestCount'><br>
                    <label>Event Comments:</label>
                    <input type='text' name='eventComments' value='$eventComments'><br>
                    <!-- Add more input fields for additional columns -->

                    <input type='submit' value='Update'>
                    <a href='dashboard.php' class='back-button'>Back</a>
                    
                </form>
            </body>
            </html>";
        } else {
            echo "Event not found.";
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
