<?php
// Establish a database connection (replace placeholders with your own values)
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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert user into the database
    $stmt = $conn->prepare('INSERT INTO users (first_name, last_name, email, phone_number, username, password) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssss', $first_name, $last_name, $email, $phone_number, $username, $password);

    if ($stmt->execute()) {
        echo "<center> <p style='color: lightgreen;'>Registration Successful!.</p><center> ";
    } else {
        echo 'Error: ' . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        h2{
            color:white;
        }
        body {
            background-image: url('photos/waow.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 35px;
            border: 5px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            display: inline-block;
    text-decoration: none;
    color: #fff;
    border: 1px solid black;
    padding:  12px 34px;
    font-size: 13px;
    background: black;
    position: relative;
    cursor:  pointer;
        }

        input[type="submit"]:hover {
            border: 1px solid blue;
    background: blue;
    transition: 1s;
        }

        button {
            display: inline-block;
    text-decoration: none;
    color: #fff;
    border: 1px solid black;
    padding:  12px 30px;
    font-size: 13px;
    background: black;
    position: relative;
    cursor:  pointer;
        }

        button:hover {
            border: 1px solid blue;
    background: blue;
    transition: 1s;
        }
    </style>
</head>
<body>
    <center><h2>Register</h2><center>
    <form action="" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Register">
        
        <a href="userlogin.php">go back to login</a>
    </form>

   
</body>
</html>

