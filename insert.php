<?php
$host = "sql312.infinityfree.com";
$username = "if0_35458522";
$password = "Bhuvanesh2003@";
$dbname = "if0_35458522_exam";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$flightname = $_POST['flightname'];
$date = $_POST['date'];
$number = $_POST['number'];

// Insert data into the table
$sql = "INSERT INTO details (flightname, date, number) VALUES ('$flightname', '$date', '$number')";

if ($conn->query($sql) === TRUE) {
    echo "Flight added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
