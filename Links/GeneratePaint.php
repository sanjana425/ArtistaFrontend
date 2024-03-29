<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GENERATE PAINTING</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 92.2vh;
            background-color: white;
            border-left: 25px solid rgb(12, 66, 83);
            border-right: 25px solid rgb(12, 66, 83);
            border-top: 25px solid rgb(12, 66, 83);
            border-bottom: 25px solid rgb(12, 66, 83);
        }

        .container {
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #c1d4f1;
        }

        .container p {
            font-size: 27px;
            margin-top: 35px;
            margin-left: 65px;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding: 1px;
            position: relative;
            /* Added */
        }

        .card {
            flex: 1;

            border-radius: 5px;
            padding: -33px 30px;
            /* Adjusted padding */
            margin: 4px 27px;
            /* Adjusted margin */

        }

        .card h3 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 20px;
        }

        /* Button styling */
        .button-container {
            position: absolute;
            /* Added */
            top: 0;
            /* Added */
            right: 20px;
            /* Added */
            display: flex;
            /* Added */
            align-items: center;
            /* Added */
        }

        .button {
            padding: 10px 20px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #467fd7;
            /* Dark blue color */
            color: white;
            cursor: pointer;
        }

        /* Adjustments for mobile responsiveness */
        @media only screen and (max-width: 600px) {
            .card-container {
                flex-direction: column;
                align-items: center;
            }

            .button-container {
                position: relative;
                margin-top: 20px;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <p>GENERATE PAINTING</p>
        <p>Improve your digital art creating skills!</p>
    </div>

    <div class="card-container">
        <div class="card" style="margin-left:210px ;cursor:pointer;"><img style="height: 60vh ;" src="../images/3.jpg" alt="1"></div>
        <div class="card" style="margin-right:150px;cursor:pointer;"><img style="height: 60vh ;" src="../images/2.jpg" alt="2"></div>
        <div class="button-container">

            <a href=""><button class="button">>></button></a>
        </div>
    </div>

</body>

</html>