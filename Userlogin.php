<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $host = "sql312.infinityfree.com";
$dbusername = "if0_35458522";
$dbpassword = "Bhuvanesh2003@";
$dbname = "if0_35458522_exam";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to check if the email and password are correct
    $sql = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to booking.htm
        header("Location: booking.html");
        exit();
    } else {
        // Invalid email or password
        echo "Invalid email or password";
    }

    
    $conn->close();
}
?>
