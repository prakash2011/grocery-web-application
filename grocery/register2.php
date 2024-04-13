<?php


// Database connection parameters
$host = "localhost";
$username = "root";
$password ="";
$database = "login";

// Establishing MySQL connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username =$_POST["username"];
    $password =$_POST["password"];
    $cpassword =$_POST["cpassword"];
    
 if($password==$cpassword){
  $sql="INSERT INTO `login`.`user` (`username`, `password`,`cpassword`) VALUES ('$username','$password','$cpassword')";
 
 if($conn->query($sql)==true){
    echo "<br>succesfully inserted";

}
else{
    echo "ERROR: $sql <br> $conn->error"; 

}
}
else{
    echo "<br>password not match with cpassword";
}
$conn->close();
}
   
  
?>
