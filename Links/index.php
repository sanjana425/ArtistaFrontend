<?php  
session_start();

include("connection.php");
include("functions.php");

// Check if the form is submitted
if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Assign the username from the form to a session variable
    $_SESSION['filled_username'] = $_POST['username'];
    // Redirect to the same page to display the username immediately
    header("Location: index.php");
    exit;
}

// Check if the username is stored in the session
$username = isset($_SESSION['filled_username']) ? $_SESSION['filled_username'] : "SANJANA";

// Remove numbers from the username
$username = preg_replace('/\d/', '', $username);

// Function to display the username with a welcome message
function displayWelcomeMessage($username) {
    echo "<p>WELCOME $username,</p>";
    echo "<p>START YOUR JOURNEY</p>";
    echo "<p>What would you like to choose?</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista Main Modules</title>
    <style>
        /* Your CSS styles */body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ddeaf8;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            height: 86vh;
            padding: 20px;
            border-left: 25px solid rgb(12, 66, 83);
            border-right: 25px solid rgb(12, 66, 83);
            border-top: 25px solid rgb(12, 66, 83);
            border-bottom: 25px solid rgb(12, 66, 83);
        }

        .left-side {
            width: 70%;
            margin-top: 15vh;
            /* Adjust margin-top as needed */
        }

        .right-side {
            width: 71%;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            /*background-color: white;*/
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 40px;
            margin-right: 9px;
            height: 76vh;
            width: 180px;
            /* Adjust width as needed */
        }

        .card img {
            margin-top: 80px;
            max-width: 200px;
            max-height: 350px;
            /* Increase the max height as needed */
            object-fit: contain;
        }
        /* Add your CSS styles here */
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side" style="font-size:35px">
            <!-- Display the welcome message with the username -->
            <?php displayWelcomeMessage($username); ?>
        </div>

         <div class="right-side" style="font-size:20px;">
            <a href="LearnPainting.php" style="text-decoration: none; color:black">
                <div class="card" style="background-color:white">
                    <br>
                    <br>
                    <h2>1. <br> LEARN PAINTING</h2>
                    <br> <br>
                    <img src="../images/art 8.png"
                        style=" max-width: 260px;margin-left:-40px;height:30vhpx;margin-top:25px;">
                    <!-- Content of the first card goes here -->
                </div>
            </a>
            <a href="GeneratePaint.php" style="text-decoration: none; color:black; cursor:pointer">
                <div class="card" style="background-color:white">
                    <br>
                    <br>
                    <h2>2.<br> GENERATE PAINTING</h2>
                    <br><br>
                    <img src="../images/art 9.jpg"
                        style=" max-width: 260px;margin-left:-40px;height:30vhpx;margin-top:15px;">
                    <!-- Content of the second card goes here -->
                </div>
            </a>
        </div>
    </div>
</body>

</html>
