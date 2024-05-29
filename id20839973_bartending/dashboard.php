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
        <table border='1'>
            <thead>
                <tr>
                    <th>Event Reason</th>
                    <th>Event Space</th>
                    <th>Venue Name</th>
                    <th>Event Address</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Event Date</th>
                    <th>Guest Count</th>
                    <th>Host Comment</th>
                    <th>Estimated Cost</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>User</th>
                    <th colspan='2'><center>Status</th>
                </tr>
            </thead>
            <tbody>
                <div class="icon-bar">
                    <a href="home.php"><i class="fa fa-home"></i></a> 
                    <a class="active" href="dashboard.php"><i class="fa fa-user"></i></a> 
                    <a href="details.php"><i class="fa-solid fa-person"></i></a> 
                    <a href="print_table.php" target="_blank"><i class="fa fa-print"></i></a>
                    <a href="login.php"><i class="fa fa-power-off"></i></a> 
                </div>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search..." />
                    <button type="submit">Search</button>
                    <a href="dashboard.php"><button type="button">Back</button></a>
                </form>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                
                <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "root", "", "id20839973_bartending");

                    

                    // Check if the connection is successful
                    if ($conn) {
                        // Retrieve the search query if it exists
                        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

                        // Query to retrieve data from the table
                        $query = "SELECT * FROM tb_book WHERE eventreason LIKE '%$searchQuery%' ORDER BY eventdate ASC";

                        // Execute the query
                        $result = mysqli_query($conn, $query);

                        // Loop through the rows and display the data in table cells
                        while ($row = mysqli_fetch_assoc($result)) {
                            $rowId = 'row-' . $row['eventreason'];  // Generate a unique row ID
                            echo "<tr id='$rowId'>";
                            echo "<td>".$row['eventreason']."</td>";
                            echo "<td>".$row['eventspacetype']."</td>";
                            echo "<td>".$row['venuename']."</td>";
                            echo "<td>".$row['eventaddress']."</td>";
                            echo "<td>".$row['country']."</td>";
                            echo "<td>".$row['city']."</td>";
                            echo "<td>".$row['eventdate']."</td>";
                            echo "<td>".$row['guestcount']."</td>";
                            echo "<td>".$row['eventcomments']."</td>";
                            echo "<td>₱".($row['guestcount'] * 200)."</td>";  // Calculate estimated cost with peso sign
                            echo "<td><a href='edit.php?id=".$row['eventreason']."'><img src='./photos/icons8-Edit-32.png' alt='Edit'></a></td>";
                            echo "<td><a href='delete.php?id=".$row['eventreason']."'><img src='./photos/icons8-Trash-32.png' alt='Delete'></a></td>";
                            echo "<td>".$row['username']."</td>"; // Display the username here
                            echo "<td><button onclick='toggleHighlight(\"$rowId\", \"highlight-row-green\")'>Approve</button></td>";
                            echo "<td><button onclick='toggleHighlight(\"$rowId\", \"highlight-row-red\")'>Deny</button></td>";
                            
                            
                            echo "</tr>";
                        }

                        // Close the database connection
                        mysqli_close($conn);
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
