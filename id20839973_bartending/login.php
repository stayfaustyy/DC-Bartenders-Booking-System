<?php
// Check if the login form is submitted
if (isset($_POST['submit'])) {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the authentication process (e.g., check credentials against a database)
    // Here, we assume the username is "admin" and the password is "password" for demonstration purposes
    if ($username === 'yvesagustin' && $password === '123456') {
        // Authentication successful
        header("Location: dashboard.php");
       
    } else {
        // Authentication failed
        echo "<center> <p style='color: red;'>Invalid username or password. Please try again.</p><center> ";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background-image: url("photos/waow.jpg");
        }

        .login {
            width: 300px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
            text-align: center;
        }

        .login input[type="text"],
        .login input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login .fbtn {
            background-color: black;
    color: white;
    padding: 10px 20px;
    margin-bottom: 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
    width: 100%;
        }

        .login .fbtn:hover {
            border: 1px solid blue;
    background: blue;
    transition: 1s;
        }
        

        
    </style>
</head>
<body>
    
    <div class="login">
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        
        <input type="submit" class='fbtn' name="submit" value="Login">
        <a href="index.html">go back to website</a>
    </form>
    </div>
</body>
</html>
