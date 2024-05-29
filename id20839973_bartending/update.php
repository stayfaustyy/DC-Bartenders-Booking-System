<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "id20839973_bartending";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check if the connection is successful
if ($conn) {
    // Check if the form data is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the form data
        $eventId = $_POST['eventId'];
        $eventReason = $_POST['eventReason'];
        $eventSpaceType = $_POST['eventSpaceType'];
        $venueName = $_POST['venueName'];
        $eventAddress = $_POST['eventAddress'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $eventDate = $_POST['eventDate'];
        $guestCount = $_POST['guestCount'];
        $eventComments = $_POST['eventComments'];
        // Add more variables for additional columns

        // Construct the UPDATE query
        $query = "UPDATE tb_book SET
                    eventreason = '$eventReason',
                    eventspacetype = '$eventSpaceType',
                    venuename = '$venueName',
                    eventaddress = '$eventAddress',
                    country = '$country',
                    city = '$city',
                    eventdate = '$eventDate',
                    guestcount = '$guestCount',
                    eventcomments = '$eventComments'
                    WHERE eventreason = '$eventId'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if the update was successful
        if ($result) {
            echo "<div style='text-align: center;'>
        <p style='color: blue; font-weight: bold; font-size: 60px;'>Event updated successfully.</p>
        <br>
        <a href='dashboard.php' style='text-decoration: none; font-size: 40px;'>Go back to Dashboard</a>
      </div>";
    
        } else {
            echo "Error updating event: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Failed to connect to the database.";
}
?>
