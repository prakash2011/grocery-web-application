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
  $error_message = "Congrats! You succesfully Register. ";

}
else{
  $error_message="ERROR: $sql <br> $conn->error"; 
    

}
}
else{
  $error_message = "password and confirm password not match ";
}
$conn->close();
}
   
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0px;
    }

    h2 {
      text-align: center;
    }

    form {
      max-width: 400px;
      margin: auto;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error {
      color: red;
      display: none;
    }

    .success {
      color: green;
      display: none;
    }

    .navbar {
      height: 40px;
      background-color: #7eff83;
      overflow: hidden;
      padding: 10px;
      border-bottom: 2px solid #ddd;
      border: 2px solid black;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      text-align: center;
    }
    .green-button {
    background-color: green;
    color: white; /* To ensure text is visible */
    border: none; /* Removing default button border */
    padding: 10px 20px; /* Adjust padding as needed */
    border-radius: 5px; /* Optional: Adds rounded corners */
    cursor: pointer; /* Optional: Changes cursor to pointer on hover */
    /* Add any other styles you desire */
}

  </style>
</head>

<body>
  <div class="navbar">
    <h3>Grocery Register</h3>
  </div>
  <h2>Register</h2>
  <p ><?php if(isset($error_message)) { ?>
  
  <p align="center"><?php echo $error_message; ?></p>
  <?php } ?></p>
 
  <form id="signupForm" method="post" action="register.php">
    <div class="show"></div>
    <label for="signupUsername">Username:</label>
    <input type="text" id="signupUsername" name="username" required>

    <label for="signupPassword">Password:</label>
    <input type="password" id="signupPassword" name="password" required>

    <label for="signupPassword">Confirm Password:</label>
    <input type="password" id="signupPassword" name="cpassword" required>
    
    <button class="green-button" onclick="window.location.href = 'register.php';">Sign up</button>

    <button class="green-button" onclick="window.location.href = 'login.php';">Login</button>

  </form>
<!--
  <p id="signupSuccess" class="success">Registration successful! You can now login.</p>
  <p id="signupError" class="error">Username already exists.</p>

  <script>
    // JavaScript code
    const signupForm = document.getElementById('signupForm');

    // Signup form submit event listener
    signupForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent default form submission

      // Perform signup logic (e.g., check if username is available, create new user)
      const username = signupForm.username.value;
      const password = signupForm.password.value;

      // Example: Simulate successful signup if username is not "existinguser"
      if (username !== 'existinguser') {
        document.getElementById('signupSuccess').style.display = 'block';
        signupForm.reset(); // Reset form fields
      } else {
        document.getElementById('signupError').style.display = 'block';
      }
    });
  </script>-->
</body>

</html>

