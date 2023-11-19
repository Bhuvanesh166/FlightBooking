<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $host = "sql312.infinityfree.com";
    $dbusername = "if0_35458522";
    $dbpassword = "Bhuvanesh2003@";
    $dbname = "if0_35458522_exam";
    

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user inputs from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $sql = "SELECT * FROM adm WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, redirect to booking.htm
        header("Location: AddDetails.html");
        exit();
    } else {
        // Invalid email or password
        echo "Invalid email or password";
    }

    // Close the connection
    $conn->close();
}
?>
