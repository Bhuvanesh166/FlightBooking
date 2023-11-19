<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $from = $_POST["from"];
    $destination = $_POST["destination"];
    $flightname = $_POST["flightname"];
    $noOfSeat = $_POST["noOfSeat"];
    $date = $_POST["date"];
    $time = $_POST["time"];

   
    $host = "sql312.infinityfree.com";
$username = "if0_35458522";
$password = "Bhuvanesh2003@";
$dbname = "if0_35458522_exam";


    
    $conn = new mysqli($host, $username, $password, $dbname);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO booking (Origi, destination, flightname, noOfSeat, DDate, TTime) 
            VALUES ('$from', '$destination', '$flightname', $noOfSeat, '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>
