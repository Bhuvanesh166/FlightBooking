<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        nav {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            width: 100%;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;

        }

    </style>
</head>
<body>

<nav>
        <a href="Userlogin.html">User Login</a>
        <a href="#">Admin Login</a>
        <a href="AddDetails.html">Add Flights</a>
    </nav>
    <h2>Bookings</h2>
    
    <?php
    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exam";

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the 'booking' table
    $sql = "SELECT * FROM booking";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display data as an HTML table
        echo '<table>';
        echo '<tr><th>From</th><th>Destination</th><th>Flight Name</th><th>No. of Seats</th><th>Date</th><th>Time</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['Origi'] . '</td>';
            echo '<td>' . $row['destination'] . '</td>';
            echo '<td>' . $row['flightname'] . '</td>';
            echo '<td>' . $row['noOfSeat'] . '</td>';
            echo '<td>' . $row['DDate'] . '</td>';
            echo '<td>' . $row['TTime'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No bookings found.</p>';
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
