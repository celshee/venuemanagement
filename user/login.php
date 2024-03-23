<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(45deg, #49a09d, #5f2c82, #49a09d, #5f2c82);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            height: 100vh;
            margin-top: 20px;
            background-position: center;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-position: center;
        }

        .container {
            border-radius: 10px;
            box-shadow: 0 0 10px;



        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }



        .banner {
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px;
        }

        .banner h1 {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

            font-weight: 100;
            margin: 0;
            color: #47a0ea;
        }

        .login-container {
            border-radius: 10px;
            box-shadow: 0 0 10px;
            width: 300px;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
        }

        .login-container label {
            display: block;
            margin-bottom: 8px;
        }

        .login-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .ctn {
            padding: 8px 15px;
            background: #92c5ee;
            border-radius: 30px;
            color: whitesmoke;
        }
    </style>
</head>

<body class="bg">

    <div class="banner">
        <h1>VENUE REGISTRATION</h1>
    </div>




    <div class="login-container">
        <form method="POST" action="login.php">
            <label for="uid">USER ID</label>
            <input type="text" required name="username" class="form-control" id="uid"
                placeholder="Enter user ID eg.(21ucsa226)">

            <label for="pwd">Password</label>
            <input type="password" required name="password" class="form-control" id="pwd"
                placeholder="Password eg.(04/09/2003)">

            <button class="ctn">Submit</button>
        </form>
    </div>

</body>

</html>



<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../connection.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["username"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT `u_id`, `pwd`, `u_name` FROM `users` WHERE u_id='$name' AND pwd='$pwd'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die ("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row) {

        $_SESSION["username"] = $row['u_name'];
        $_SESSION["userid"] = $row['u_id'];

        if ($name === 'stella01' && $pwd === 'admin@123') {
            header('Location: http://localhost/majorProject/admin/admin.php');
            exit();
        } else {
            header('Location: http://localhost/majorProject/user/venue.php');
            exit();
        }
    } else {


        echo "<script>
         document.addEventListener('DOMContentLoaded', function() {
             var modal = document.createElement('div');
             modal.classList.add('modal');
             
             var modalContent = document.createElement('div');
             modalContent.classList.add('modal-content');
             
             var closeButton = document.createElement('span');
             closeButton.classList.add('close');
             closeButton.innerHTML = '&times;';
             closeButton.onclick = function() {
                 modal.style.display = 'none'; // Hide modal when close button is clicked
             }
             
             var messageText = document.createElement('h3');
             messageText.textContent = 'OOPS! We can\'t find you';
             
             modalContent.appendChild(closeButton);
             modalContent.appendChild(messageText);
             modal.appendChild(modalContent);
             
             document.body.appendChild(modal);
             
             modal.style.display = 'block';
             
             window.onclick = function(event) {
                 if (event.target == modal) {
                     modal.style.display = 'none'; // Hide modal when clicked outside
                 }
             }
         });
     </script>";



        exit();

    }
}


?>