<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if (password_verify($password, $user_data['password'])) {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("Location: index.php");
                exit;
            } else {
                echo "<p style='color:red'>Wrong username or password!</p>";
            }
        } else {
            echo "<p style='color:red'>Wrong username or password!</p>";
        }
    } else {
        echo "<p style='color:red'>Please enter username and password!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Your existing CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
            height: 92.2vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border-left: 25px solid rgb(12, 66, 83);
            border-right: 25px solid rgb(12, 66, 83);
            border-top: 25px solid rgb(12, 66, 83);
            border-bottom: 25px solid rgb(12, 66, 83);
        }

        .container {
            text-align: center;
            display: flex;
            align-items: center;
        }

        .btn-container {
            display: flex;
            flex-direction: column;
            margin-left: 100px;
        }

        .btn {
            padding: 30px 24px;
            margin: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            color: #fff;

            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {}

        h1 {
            font-size: 41px;
            /* Increased font size */
            font-family: "Times New Roman", Times, serif;
            /* Changed font */
            margin-bottom: 20px;
            font-weight: bold;
            margin-right: 7px;
        }

        .blue {
            color: #007bff;
            /* Define color for the first word */
        }

        .pink {
            color: palevioletred;
            /* Define color for the second word */
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
            }

            .btn-container {
                margin-left: 0;
                margin-top: 19px;
                padding: 20px;
            }

            .btn {
                width: 50px;
                margin: 10px auto;
                background-size: 30px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img style="height: 80vh; width: 80vh;" src="../images/bgg.jpg" alt="lobg">
        <div class="btn-container">
            <h1><span class="blue">Login</span></h1>

            <form action="index.php" method="post">
                <input type="text" style="padding:10px; border-radius:7px; width:300px;" name="username" placeholder="Username" required><br><br>
                <input type="password" style="padding:10px; border-radius:7px; width:300px;" name="password" placeholder="Password" required><br><br>
                <button style="background-color: #007bff; padding:10px; width:120px; border-radius:8px; color:#fff" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
