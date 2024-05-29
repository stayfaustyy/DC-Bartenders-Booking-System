<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styleddb.css" /> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Add this CSS for the smaller search field */
        input[type="text"] {
            width: 300px;
            padding: 10px;
        }
    </style>
    <style>
        /* Add this CSS for the highlighted rows */
        .highlight-row-green {
            background-color: #004D00;
            color: white;
        }
        .highlight-row-red {
            background-color: #BD3922;
            color: white;
        }
    </style>
    <script>
        // Add this JavaScript to toggle the highlight classes on the table row when the buttons are clicked
        function toggleHighlight(rowId, highlightClass) {
            var row = document.getElementById(rowId);
            row.classList.toggle(highlightClass);
        }
    </script>
</head>
<body>
    <main>
        
            <tbody>
                <div class="icon-bar">
                    <a href="home.php"><i class="fa fa-home"></i></a> 
                    <a href="dashboard.php"><i class="fa fa-user"></i></a> 
                    <a class="active"href="details.php"><i class="fa-solid fa-person"></i></a> 
                    <a href="print_table.php" target="_blank"><i class="fa fa-print"></i></a>
                    <a href="login.php"><i class="fa fa-power-off"></i></a> 
                </div>
                <form method="GET" action="">
                    
                  
                    <a href="dashboard.php"><button type="button">Back</button></a>
                </form>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                

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
    // Query to fetch user details
    $query = "SELECT * FROM users";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and if there are any users
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='user-details'>";

        // Loop through each user and display their details
        while ($row = mysqli_fetch_assoc($result)) {
            $userid = $row['ID'];
            $username = $row['first_name'];
            $useremail = $row['email'];
            $userphone = $row['phone_number'];

            // Display the user details
            echo "<div class='user'>";
            echo "<h3>User ID: $userid</h3>";
            echo "<p>Name: $username</p>";
            echo "<p>Email: $useremail</p>";
            echo "<p>Phone: $userphone</p>";
            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "No users found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Failed to connect to the database.";
}
?>



            </tbody>
        </table>
        <!--Footer-->
        <section class="footer">
            <h4>About Us</h4>
            <p>Mobile Bar that will cater your special events.</p>
            <div class="icons">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-solid fa-phone"></i>
            </div>
        </section>
    </main>
</body>
</html>
