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
            background-color: #022F1F;
            color: white;
        }
        .highlight-row-red {
            background-color: #570201;
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
             
                </tr>
            </thead>
            <tbody>
                <div class="icon-bar">
                    <a href="home.php"><i class="fa fa-home"></i></a> 
                    <a class="active" href="dashboard.php"><i class="fa fa-user"></i></a> 
                    <a href="approved.php"><i class="fa-solid fa-thumbs-up"></i></a> 
                    <a href="print_table.php" target="_blank"><i class="fa fa-print"></i></a>
                    <a href="login.php"><i class="fa fa-power-off"></i></a> 
                </div>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search..." />
                    <button type="submit">Search</button>
                    <a href="dashboard.php"><button type="button">Back</button></a>
                </form>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
                 
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
