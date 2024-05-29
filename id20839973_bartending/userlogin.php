<?php
session_start(); // Start the session

// Establish a database connection (replace placeholders with your own values)

$servername = "localhost";
$username = "root";
$password = "";
$database = "id20839973_bartending";


// Create connection
$conn = new mysqli($servername, $username, $password, $database);



// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User found, login successful
        $_SESSION['username'] = $username; // Store the username in a session variable
        header('Location: booking.php');
        exit;
    } else {
        // User not found or incorrect credentials
        $login_error = "Invalid username or password. Please try again.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        h2 {
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
    color: black;
    border: 1px solid black;
    padding:  12px 34px;
    font-size: 13px;
    background: transparent;
    position: relative;
    cursor:  pointer;
        }

        input[type="submit"]:hover {
            border: 1px solid blue;
    background: blue;
    transition: 1s;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
    
</head>
<body>
    <center><h2>Login</h2><center>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
        <a href="register.php">Register</a>
        <a href="index.html">go back to site</a>

        <?php if (isset($login_error)) { ?>
            <center><p style='color: red;'><?php echo $login_error; ?></p><center>
        <?php } ?>
    </form>
   
</body>
</html>
