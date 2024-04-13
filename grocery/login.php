<?php
session_start();

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "login";

// Establishing MySQL connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize user input
function sanitize_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);
    
    $sql="SELECT * FROM `login`.`user` WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if($result)
    {
       
        if(mysqli_num_rows($result) == 1) 
        {
            $row = mysqli_fetch_assoc($result);
            
            
            // Verify password
            if ($password == $row["password"]) {
                $_SESSION["username"] = $username;
                header("Location: ./shop.html"); // Redirect to welcome page
                exit();
            }
            else if($password != $row["password"]){
                $error_message = "Invalid username or password.";
                 }
            else{

                 $error_message = "Error executing query: " .mysqli_error($conn);     
                }
                
        }
        else{
          $error_message= "username not exist ";
         }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* CSS styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0px;
      background-color: rgb(255, 255, 255);
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
  </style>
</head>

<body>
  <div class="navbar">
    <h3>Grocery Login</h3>
  </div>
  <h2>Login</h2>
  <<p ><?php if(isset($error_message)) { ?>
  
  <p align="center"><?php echo $error_message; ?></p>
  <?php } ?></p>
  <form id="loginForm" method="post" action="login.php">
    <label for="loginUsername">Username:</label>
    <input type="text" id="loginUsername" name="username" required>

    <label for="loginPassword">Password:</label>
    <input type="password" id="loginPassword" name="password" required>

    <input type="submit" value="Login">
  </form>

  
<!--
  <script>
    // JavaScript code
    const loginForm = document.getElementById('loginForm');

    // Login form submit event listener
    loginForm.addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent default form submission

      // Perform login logic (e.g., validate credentials, authenticate user)
      const username = loginForm.username.value;
      const password = loginForm.password.value;

      // Example: Simulate login success if username is "user" and password is "password"
      if (username === 'user' && password === 'password') {
        alert('Login successful!'); // Replace with your own logic
      } else {
        document.getElementById('loginError').style.display = 'block';
      }
    });
  </script> -->
</body>

</html>