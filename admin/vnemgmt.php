<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue-Mgmt</title>
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
            align-items: center;
            justify-content: center;
            background-position: center;
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
            padding: 10px;
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

        .navbar-container {
            margin-top: 20px;
        }

        .container-wrapper {
            display: center;
        }

        .form-container {
            background-position: center;
            border-radius: 10px;
            box-shadow: 0 0 10px;
            width: fit-content;
            height: fit-content;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            padding-bottom: 10px;
            align-items: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 10px;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            margin: 20px auto;
            max-width: 600px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
<div style="margin-top: 20px" class="navbar-container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">VENUE REGISTRATION</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="admin.php">BOOKINGS</a>
                <div class="dropdown">
                <button class="nav-item nav-link">VENUES</button>
                    <div class="dropdown-content">
                        <a href="vnemgmt.php">Add</a>
                        <a href="vnereview.php">Manage</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="nav-item nav-link">USERS</button>
                    <div class="dropdown-content">
                    <a href="user.php">Add</a>
                        <a href="usermgmt.php">Manage</a>
                    </div>
                </div>
           
            <a class="nav-item nav-link" href="../user/login.php">LOG OUT</a>
            </div>
        </div>
    </nav>
</div>
    <h1>VENUE CREATION</h1>
    <div class="container-wrapper">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="form-container">
                <form action="vnemgmt.php" method="post"
                    enctype="multipart/form-data">
                    <div>
                        <label>Venue Name:</label>
                        <input type="text" name="v_name" required>
                    </div>
                    <div>
                        <label>Image 1:</label>
                        <input type="file" name="img1" required>
                    </div>
                    <div>
                        <label>Image 2:</label>
                        <input type="file" name="img2" required>
                    </div>
                    <div>
                        <label>Capacity:</label>
                        <input type="text" name="cap" required>
                    </div>
                    <div>
                        <label>Location:</label>
                        <input type="text" name="loc" required>
                    </div>
                    <div style="display: flex">
                        <label>AC:</label>
                        <input type="radio" name="ac" value="yes"> Yes
                        <input type="radio" name="ac" value="no"> No
                    </div>

                    <div>
                        <input type="submit" value="Submit">
                    </div>
                </form>

                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../connection.php';

    
    // Validate and process form inputs
    $v_name = mysqli_real_escape_string($conn, $_POST["v_name"]);
    $cap = mysqli_real_escape_string($conn, $_POST["cap"]);
    $file_name1 = mysqli_real_escape_string($conn, $_FILES["img1"]["name"]);
    $file_destination1 = "http://localhost/majorProject/compressjpeg/dupe" . $file_name1;

    $file_name2 = mysqli_real_escape_string($conn, $_FILES["img2"]["name"]);
    $file_destination2 = "http://localhost/majorProject/compressjpeg/dupe" . $file_name2;
 
    $loc = mysqli_real_escape_string($conn, $_POST['loc']);
    $ac = mysqli_real_escape_string($conn, $_POST['ac']);

    // Process image uploads
    $image1 = $_FILES['img1']['tmp_name'];
    $imgData1 = addslashes(file_get_contents($image1));

    $image2 = $_FILES['img2']['tmp_name'];
    $imgData2 = addslashes(file_get_contents($image2));

    // Insert image data into the database
    $sql = "INSERT INTO venue (v_name, img1, img2, cap, loc, ac) VALUES ('$v_name', '$imgData1', '$imgData2', '$cap', '$loc', '$ac')";
    if (mysqli_query($conn, $sql)) {
        $message = "YAY!! NEW VENUE UPDATED";
        $location="http://localhost/majorProject/admin/vnereview.php";
        echo "<script>
       document.addEventListener('DOMContentLoaded', function() {
           var messageModal = new bootstrap.Modal(document.getElementById('messageModal2'));
           var messageBody = document.getElementById('messageBody2');
           messageBody.innerHTML = '$message';
           messageModal.show();
           setTimeout(function() {
            window.location.href = '$location';
        }, 3000);
       });
   </script>";
}
}
?>

<div class="modal fade" id="messageModal2" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel2">Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="messageBody2">
                    <!-- Message content will be displayed here -->
                </div>
            </div>
        </div>
    </div>

                 

</body>

</html>
