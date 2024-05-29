<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: userlogin.php');
  exit;
}

// Establish a database connection (replace placeholders with your own values)

$servername = "localhost";
$username = "root";
$password = "";
$database = "id20839973_bartending";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$username = $_SESSION['username']; // Get the username from the session


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventreason = $_POST['eventreason'];
    $eventspacetype = $_POST['eventspacetype'];
    $venuename = $_POST['venuename'];
    $eventaddress = $_POST['eventaddress'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $eventdate = $_POST['eventdate'];
    $guestcount = $_POST['guestcount'];
    $eventcomments = $_POST['eventcomments'];
    $eventcomments = $_POST['username'];

    // Prepare the SQL statement to insert data into the table
    $stmt = $conn->prepare('INSERT INTO tb_book (eventreason, eventspacetype, venuename, eventaddress, country, city, eventdate, guestcount, eventcomments,username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)');
    $stmt->bind_param('sssssssiss', $eventreason, $eventspacetype, $venuename, $eventaddress, $country, $city, $eventdate, $guestcount, $eventcomments, $username);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo 'Data inserted successfully.';
    } else {
        echo 'Error inserting data: ' . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bookingstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DC Bartenders</title>
</head>
<body>

  
  <section class="headerbooking">
    <nav>
      <a href="index.html"><img src="photos/Logo.png"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa-solid fa-xmark" onclick="HideMenu()"></i>
        
        <ul>
        <li><a href="index.html">HOME</a></li>
          <li><a href="menu.html">MENU</a></li>
          <li><a href="booking.php">BOOK</a></li>
         

          
          
        </ul>
      </div>
      <i class="fa-solid fa-bars"onclick="ShowMenu()"></i>
    </nav>
    <div class="containerbooker">
      
    <section class="booking-form">
      
    <h2>Welcome, <?php echo $username; ?>!</h2> <!-- Display the username -->
      <h1>Booking Form</h1>
      <p>fill out the form below, and we’ll start planning! Please allow up to 1-2 business days for confirmation.
      We will be contacting you via Phone number, Make sure you provide us your valid number!</p>

      <p>failure to contact during the 2 days of confirmation will result to withdraw the booking appointment</p>
      
      <p> <b>Payment Method will be discussed through call. but you can also deposit a maximum of 500$</b></p>
      <container><form method="post" action="checkout.php">
        <button value="payment">Pay in Advance</button>
       </form>
       </container>
      <p>General Event Information</p>
      
      
      <hr>
      <form action="" method="POST">
        <label for="eventreason">Reason for Event<span class="required">*</span>:</label>
        <input type="text" id="eventreason" name="eventreason" required>
  
        <label for="eventspacetype">Type of Event's Space<span class="required">*</span>:</label>
        <input type="text" id="eventspacetype" name="eventspacetype" required>
  
        <label for="venuename">Name of Venue:(Optional)</label>
        <input type="text" id="venuename" name="venuename">
  
        <label for="eventaddress">Event Address<span class="required">*</span>:</label>
        <input type="text" id="eventaddress" name="eventaddress" required>
  
        <label for="country">Country:</label>
        <input type="text" id="country" name="country">
  
        <label for="city">City<span class="required">*</span>:</label>
        <input type="text" id="city" name="city" required>
  
        <label for="eventdate">Event Date<span class="required">*</span>:</label>
        <input type="date" id="eventdate" name="eventdate" required>
  
        <label for="guestcount">Guest Count<span class="required">*</span>:</label>
        <input type="number" id="guestcount" name="guestcount" min="1" required>
        <p>Total Cost: <span id="totalCost"></span></p>
        

        <p>Type of Bar Service</p>
        <hr>
        <label for="barservicepackage">Bar Service Package: <br> The Usual(₱200/guest for 3 hours, ₱50/guest for each additional hour.)</label>

  
        <label for="eventcomments">Comments, Questions about your event:</label>
        <textarea id="eventcomments" name="eventcomments"></textarea>
        
       
        <label for="username">notes</label>
        
<input type="text" id="username" name="username">


<?php
    $expectedUsername = $username; // Set the expected username
    $enteredUsername = isset($_POST['username']) ? $_POST['username'] : '';

    if (!empty($enteredUsername) && $enteredUsername !== $expectedUsername) {
        echo "";
    }
?>
        
        <button type="submit" name="submit">submit</button>
      </form>
    </section>
     
  
    </div>
<!--Footer-->
  <section class="footer">
    <h4>About Us</h4>
    <p>
      Mobile Bar that will cater your special events.</p>
      <div class="icons">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-solid fa-phone"></i>
      </div>
      


  </section>




  <script>
    
  // Get the guest count input element
  var guestCountInput = document.getElementById('guestcount');

  // Add an event listener to the input element
  guestCountInput.addEventListener('input', calculateTotalCost);

  function calculateTotalCost() {
    // Get the guest count value
    var guestCount = guestCountInput.value;

    // Calculate the total cost
    var totalCost = guestCount * 200; // Assuming the cost per guest is 200

    // Display the total cost
    document.getElementById('totalCost').textContent = '₱' + totalCost;
  }

  // Get the event date input element
  var eventDateInput = document.getElementById('eventdate');

  // Get the current date
  var currentDate = new Date();

  // Set the minimum date attribute to the current date
  eventDateInput.min = currentDate.toISOString().split('T')[0];

  // Clear the value of the input
  eventDateInput.value = '';
      
  </script>

</body>
</html>
