<?php
// Check if the user is logged in (you can modify this part based on your authentication system)
$isLoggedIn = true; // Replace with your login check logic

if (!$isLoggedIn) {
    // Redirect to the login page or display an error message
    header('Location: login.php');
    exit();
}

// Create connection
$conn = new mysqli($servername, $username, $password);

// Retrieve the bookings for the logged-in user
$userId = 1; // Replace with the actual user ID
$stmt = $conn->prepare('SELECT * FROM tb_book WHERE id = ?');
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$bookings = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
</head>
<body>
    <h1>View Bookings</h1>

    <?php if (count($bookings) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Event Reason</th>
                    <th>Event Space Type</th>
                    <th>Venue Name</th>
                    <th>Event Address</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Event Date</th>
                    <th>Guest Count</th>
                    <th>Event Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?php echo $booking['id']; ?></td>
                        <td><?php echo $booking['eventreason']; ?></td>
                        <td><?php echo $booking['eventspacetype']; ?></td>
                        <td><?php echo $booking['venuename']; ?></td>
                        <td><?php echo $booking['eventaddress']; ?></td>
                        <td><?php echo $booking['country']; ?></td>
                        <td><?php echo $booking['city']; ?></td>
                        <td><?php echo $booking['eventdate']; ?></td>
                        <td><?php echo $booking['guestcount']; ?></td>
                        <td><?php echo $booking['eventcomments']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No bookings found.</p>
    <?php endif; ?>
</body>
</html>
