<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $user_name = $_POST['username'];
    $email = $_POST['email']; // Assuming you also want to capture email
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !empty($email)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id, username, password) values ('$user_id', '$user_name', '$hashed_password')";
        mysqli_query($con, $query);

        // Display alert
        echo '<script>alert("You are signed up successfully!");</script>';

        // Redirect to login page
        echo '<script>window.location.href = "login.php";</script>';
        exit; // Terminate script execution after redirect
    } else {
        echo '<script>alert("Invalid!");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
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
    <div class="container">
        <img style="height: 90.2vh; width: 80vh; height:80vh" src="../images/bg1.jpg" alt="lobg">
        <div class="btn-container">
            <h1><span class="blue">Sign Up</span></h1>

            <form action="#" method="post" onsubmit="alert('You are signed up successfully! Now Log In');">
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
