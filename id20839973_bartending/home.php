<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styledb.css" /> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-image: url("photos/backgrounddb.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .description {
            font-size: 26px;
            line-height: 1.5;
            color: white;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: -1px -1px 1px black, 1px -1px 1px black, -1px 1px 1px black, 1px 1px 1px black;
            
        }
        .description p {
            margin-bottom: 10px;
        }
        .description:hover {
            border: 5px #333;
            background: blue;
            transition: 1s;
        }
        .count-box {
            background-color: #222;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            width: 300px;
            margin: 0 auto;
        }
        .count-box h2 {
            color: white;
            font-size: 24px;
        }
        .count-box-users {
            background-color: #1a1a1a;
        }
        .count-box-tables {
            background-color: #333;
        }
    </style>
</head>
<body>
    <main>
        <table border='1'>
            <thead>
            </thead>
            
            <tbody>
                <div class="icon-bar">
                    <a class="active" href="home.php"><i class="fa fa-home"></i></a> 
                    <a href="dashboard.php"><i class="fa fa-user"></i></a> 
                    <a href="print_table.php" target="_blank"><i class="fa fa-print"></i></a>
                    <a href="login.php"><i class="fa fa-power-off"></i></a> 
                </div>

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
                    // Query to get the count of users in the table
                    $query = "SELECT COUNT(*) AS user_count FROM users";

                    // Execute the query
                    $result = mysqli_query($conn, $query);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch the count from the result
                        $row = mysqli_fetch_assoc($result);
                        $userCount = $row['user_count'];

                        // Display the count with box background
                        echo "<div class='count-box count-box-users'>";
                        echo "<h2>Number of Users in the Database:</h2>";
                        echo "<h2>$userCount</h2>";
                        echo "</div>";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }

                    // Query to get the count of tables in tb_book
                    $query = "SELECT COUNT(*) AS table_count FROM tb_book";

                    // Execute the query
                    $result = mysqli_query($conn, $query);

                    // Check if the query was successful
                    if ($result) {
                        // Fetch the count from the result
                        $row = mysqli_fetch_assoc($result);
                        $tableCount = $row['table_count'];

                        // Display the count with box background
                        echo "<div class='count-box count-box-tables'>";
                        echo "<h2>Number of Tables:</h2>";
                        echo "<h2>$tableCount</h2>";
                        echo "</div>";
                    } else {
                        echo "Error: " . mysqli_error($conn);
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
