<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

/* Form container */
.container {
  background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
  backdrop-filter: blur(5px); /* Apply blur effect for a subtle see-through */
  -webkit-backdrop-filter: blur(5px); /* For Safari */
  border-radius: 10px;

}

/* Example styling for input fields */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
button{
            padding: 8px 15px;
            background: #92c5ee;
            border-radius: 30px;
            color: whitesmoke;
        }

/* Example styling for submit button */
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


table {
    width: 100%;
    border-collapse: collapse;
    max-width: 600px; /* Adjust the width of the table */
    margin: 0 auto; /* Center the table horizontally */
    background-color: #f9f9f9;
    border-radius: 10px;
}

th, td {
    padding: 10px 15px; /* Adjust cell padding */
    text-align: center;
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
    <?php
  include '../connection.php';
  $query = "SELECT booking.*, venue.v_name 
  FROM `booking` 
  INNER JOIN `venue` ON booking.v_id = venue.v_id";
$result = mysqli_query($conn, $query);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    ?>

<div >
    <h1>ALL BOOKINGS</h1>
    <table class="container" cellspacing="0" cellpadding="10">
        <tr>
            <th>BOOKING ID</th>
            <th>BOOKING NAME</th>
            <th>USER ID</th>
            <th>VENUE </th>
            <th>DURATION</th>
            <th>DATE</th>
            <th>CONTACT</th>
            <th>MAIL</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>


        </tr>
        <div class="modal-body" id="messageBody">
                    <!-- Message content will be displayed here -->
                </div>

    
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['b_id']) ?></td>
                <td><?= htmlspecialchars($row['b_name']) ?></td>
                <td><?= htmlspecialchars($row['u_id']) ?></td>
                <td><?= htmlspecialchars($row['v_name']) ?></td>
                <td><?= htmlspecialchars($row['t_slots']) ?></td>
                <td><?= htmlspecialchars($row['e_date']) ?></td>
                <td><?= htmlspecialchars($row['ph_num']) ?></td>
                <td><?= htmlspecialchars($row['gmail']) ?></td>
                <td><?= htmlspecialchars($row['description']) ?></td>
            <td><form method="post" action="./admin.php">
                    <input type="hidden" name="entry_id" value="<?= htmlspecialchars($row['b_id']) ?>">
                    <button class="ctn" type="submit" onclick="return confirm('Are you sure you want to delete this entry?');">DELETE</button>
                </form></td>

            
            </tr>
        <?php endforeach ?>
    </table>
</div>
<script>
function deleteEntry() {
    if (confirm("Are you sure you want to delete this entry?")) {
        var entryId = <?php echo json_encode($row['b_id']); ?>; 
        document.getElementById('entry_id').value = entryId; 
        document.getElementById('deleteForm').submit(); 
    }
}</script>
<?php

    if (isset($_POST["entry_id"])) {
  

        $entryId = mysqli_real_escape_string($conn, $_POST["entry_id"]);
        $query = "SELECT * FROM `booking` WHERE `b_id`='$entryId'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {

            $data = mysqli_fetch_assoc($result);
            
           
            $_SESSION["deletedmail"] = $data['gmail'];
            $_SESSION["userid"] = $data['u_id'];
            $_SESSION["bid"] = $data['b_id'];
        
            }
            $dquery = "DELETE FROM `booking` WHERE `b_id`='$entryId'";
            $dresult = mysqli_query($conn, $dquery);
            if ($dresult) {
               
            $location="http://localhost/majorProject/admin/admin.php";
            $message="Entry deleted successfully";
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
        include 'sendmails.php';

        } else {
      
       $message = "Error deleting entry: " . mysqli_error($conn);
    }

    
      mysqli_close($conn);

        
} 
?>
    </body>
    </html>
    