<?php

$username = $_POST['nusername'];
$email  = $_POST['nemail'];
$password = $_POST['npassword'];

if (!empty($username) || !empty($email) || !empty($password) )
{

    $host = "sql312.infinityfree.com";
    $dbusername = "if0_35458522";
    $dbpassword = "Bhuvanesh2003@";
    $dbname = "if0_35458522_exam";
    

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From adm Where email = ? Limit 1";
  $INSERT = "INSERT Into adm (username , email ,password )values(?,?,?)";

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

    
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $username,$email,$password);
     
     }
     if ($stmt->execute()) {
      echo "success";
  } else {
      echo "error";
  }
  
     
     
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}


?>

<!-- if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $data = array(
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "password" => $_POST["password"]  // use hashed password here
    );
    $json_data = json_encode($data);
    echo "<script>localStorage.setItem('signup_data', '$json_data');</script>";
} -->