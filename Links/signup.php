<?php 
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['username'];
    $user_id = $_POST['id'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Save to database using prepared statement
        $stmt = mysqli_prepare($con, "INSERT INTO users (username, id, password) VALUES (?,?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $user_name,$user_id, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("SignUp successful!Please LogIn");</script>';
						echo '<script>window.location.href = "login.php";</script>';
            exit;
        } else {
            echo "Error: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Your CSS styles -->
    <style>
    
            body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            height: 92.2vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border-left: 26px solid rgb(12, 66, 83);
            border-right: 26px solid rgb(12, 66, 83);
            border-top: 26px solid rgb(12, 66, 83);
            border-bottom: 27px solid rgb(12, 66, 83);
        }

        
        /* Your existing CSS styles */
        .container {
            display: flex;
            align-items: center;
            margin-left: 200px;
            margin-top: 70px;
        }

        .btn-container {
            margin-left: 100px;
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
            }

            .btn-container {
                margin-left: 0;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container" style="padding-right:25vh;padding-bottom:70px;">
        <!-- Your HTML content -->
        <img style="height: 90.2vh; width: 80vh; height:80vh;" src="../images/bg1.jpg" alt="lobg">
        <div class="btn-container">
            <h1><span class="blue">Sign Up</span></h1>

            <form  method="post">
                <input type="text" style="padding:10px; border-radius:7px; width:300px;" name="username" placeholder="Username" required><br><br>
                <input type="email" style="padding:10px; border-radius:7px; width:300px;" name="email" placeholder="Email" required><br><br>
                <input type="password" style="padding:10px; border-radius:7px; width:300px;" name="password" placeholder="Password" required><br><br>
                <button style="background-color: #007bff; padding:10px; width:120px; border-radius:8px; color:#fff" type="submit">Sign Up</button>
            </form><br>

            <div class="login-link">
                Already have an account? <a href="login.php">Log in here</a>
            </div>
        </div>
    </div>
</body>
</html>
