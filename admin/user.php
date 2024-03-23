<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER-adder</title>
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
        .container-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: fit-content;
}

.form-container {
    max-width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.8);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
}

.form-group input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-group input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #0056b3;
}


       
   
.modal-content {
    background-color: #fefefe;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Adjust the width as needed */
    max-width: 500px; /* Set a max-width if desired */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    border-radius: 10px;
}

/* Modal header */
.modal-header {
    padding: 10px 16px;
    background-color: #5cb85c;
    color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
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
        .container-wrapper {
            display: center;
        }
    </style>
</head>

<body class="bg">
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

<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="messageBody">
                <!-- Message content will be displayed here -->
            </div>
        </div>
    </div>
</div>


<h1>ADD USER</h1>
    <div class="container-wrapper">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="form-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group row">
                        <label>User Name :</label>
                        <input type="text" name="uname" required>
                    </div>
                    <div class="form-group row">
                        <label>User ID :</label>
                        <input type="text" name="uid" required>
                    </div>
                    <div class="form-group row">
                        <label>PASSWORD :</label>
                        <input type="text" name="pwd" required>
                    </div>

                    <div class="form-group row">
                        <input type="submit" value="Submit">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>

<?php
if ($_POST) {
    include '../connection.php';
    $name = mysqli_real_escape_string($conn, $_POST["uname"]);
    $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]);
    $id = mysqli_real_escape_string($conn, $_POST["uid"]);

    // Check if user already exists
    $check_query = "SELECT * FROM `users` WHERE `u_id`='$id'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // User already exists, display modal
        $message="User already exists!";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
                var messageBody = document.getElementById('messageBody');
                messageBody.innerHTML = '$message';
                messageModal.show();
            });
        </script>";
    } else {
        // User does not exist, proceed with insertion
        $query= "INSERT INTO `users`(`u_id`, `pwd`, `u_name`) VALUES ('$id','$pwd','$name');";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die ("Error: " . mysqli_error($conn));
        } else {
            $message="User Inserted Successfully";
            $location="http://localhost/majorProject/admin/usermgmt.php";
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    var messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
                    var messageBody = document.getElementById('messageBody');
                    messageBody.innerHTML = '$message';
                    messageModal.show();
                    setTimeout(function() {
                        window.location.href = '$location';
                    }, 3000);
                });
            </script>";
        }
    }
}
