<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Mgmt</title>
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

        .wrapper {
          
padding-top: 10px;
        }

 

        button{
            padding: 8px 15px;
            background: #92c5ee;
            border-radius: 30px;
            color: whitesmoke;
        }

      

    

        table {
            width: 100%;
            border-collapse: collapse;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        th,
        td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: darkgray;
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
<h1>DELETE USER</h1>

<div class="wrapper">
<table cellspacing="0" cellpadding="10">
    <tr>
    <th>USER NAME</th>
        <th>USER ID</th>
        <th>PASSWORD</th>
        <th>ACTION</th>
    </tr>
    <?php
    include '../connection.php';
    $query = "SELECT `u_id`, `pwd`, `u_name` FROM `users`";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?= htmlspecialchars($row['u_name']) ?></td>
                <td><?= htmlspecialchars($row['u_id']) ?></td>
                <td><?= htmlspecialchars($row['pwd']) ?></td>
                <td>
                    <form method="post" action="usermgmt.php">
                        <input type="hidden" name="entry_id" value="<?= htmlspecialchars($row['u_id']) ?>">
                        <button class="ctn" type="submit" onclick="return deleteEntry()">DELETE</button>
                    </form>
                </td>
            </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='4'>No users found</td></tr>";
    }
    ?>
</table>
<div>
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

<script>
    function deleteEntry() {
        if (confirm("Are you sure you want to delete this entry?")) {
            return true; // Allow form submission
        }
        return false; // Cancel form submission
    }
</script>

<?php
if (isset($_POST["entry_id"])) {
    $entryId = mysqli_real_escape_string($conn, $_POST["entry_id"]);
    $query = "DELETE FROM users WHERE `users`.`u_id` = '$entryId'";
    if (mysqli_query($conn, $query)) {
        $message = "Entry deleted successfully";
    } else {
        $message = "Error deleting entry: " . mysqli_error($conn);
    }
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
mysqli_close($conn);
?>

</body>
</html>
    </html>
    