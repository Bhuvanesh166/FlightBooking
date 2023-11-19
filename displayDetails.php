<?php
if (isset($_GET['flightNumber'])) {
    $host = "sql312.infinityfree.com";
$username = "if0_35458522";
$password = "Bhuvanesh2003@";
$dbname = "if0_35458522_exam";


 
    $conn = new mysqli($host, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $flightNumber = $_GET['flightNumber'];

    
    $sql = "SELECT flightname, date, number FROM details WHERE number = $flightNumber";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo '<div class="flight-details">';
        echo '<h3>Flight Details</h3>';
        echo '<table>';
        echo '<tr><th>Flight Name</th><th>Date</th><th>Flight Number</th></tr>';

        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['flightname'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . $row['number'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '</div>';

        
        echo '<script>document.querySelector(".flight-details").style.display = "block";</script>';
    } else {
        
        echo '<p>No matching flight found.</p>';
    }

   
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Flight</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            position: fixed;
            top: 80px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            position: fixed;
        }

        input {
            width: 100%; /* Increased width */
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="number"] {
            width: 100%;
        }

        .search-button {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 10px;
            border-radius: 4px;
        }

        .search-button:hover {
            background-color: #45a049;
        }

        .search-icon {
            margin-right: 8px;
        }

        .flight-details {
            margin-top: 320px; /* Adjusted margin-top */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: none;
            /* hide by default */
            width: 600px; /* Increased width */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .flight-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .flight-details th,
        .flight-details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .flight-details th {
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
            <a href="booking.html">Flight Booking</a>
    <form action="" method="get">
    <h2>Search Flight</h2>
        <label for="flightNumber">Flight Number:</label>
        <div>
            <input type="number" name="flightNumber" required>
            <button type="submit" class="search-button"><i class="fas fa-search search-icon"></i>Search Flight</button>
        </div>
    </form>
</body>

</html>
