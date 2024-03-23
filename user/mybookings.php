<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<style>
        
       body{

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


     
/* External CSS file */
.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 20px auto;
    max-width: 800px;
    padding: 20px;
}

table {
    width: fit-content;
    border-collapse: collapse;
    /* Adjust the width of the table */
    margin: 0 auto; /* Center the table horizontally */
    background-color: #f9f9f9;
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
  backdrop-filter: blur(5px); /* Apply blur effect for a subtle see-through */
  -webkit-backdrop-filter: blur(5px); /* For Safari */
  border-radius: 10px;

}

th, td {
    padding: 10px 15px; /* Adjust cell padding */
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
button{
            padding: 8px 15px;
            background: #92c5ee;
            border-radius: 30px;
            color: whitesmoke;
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


.navbar-nav {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
//* Modal container */
.modal {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

/* Modal content */
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

/* Modal body */
.modal-body {
    padding: 10px 16px;
}

/* Modal footer */
.modal-footer {
    padding: 10px 16px;
    background-color: #f1f1f1;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

/* Close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


       
    </style>
</head>
<body>
<div class="navbar-container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">VENUE REGISTRATION</a>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link" href="venue.php">EXPLORE VENUE</a>
                    <a class="nav-item nav-link" href="booking.php">BOOKING</a>
                    <a class="nav-item nav-link" href="mybookings.php">MY BOOKINGS</a>
                    <a class="nav-item nav-link" href="login.php">LOG OUT</a>
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

       // Start the session before any output
       // Check if the $_SESSION["username"] variable is set
    if (isset($_SESSION["username"])) {
       $username = $_SESSION["username"];
       $uid =$_SESSION["userid"];
    }
else{
    $username="";
}
        
       
       
       $query = "SELECT b.`b_id`, b.`b_name`, b.`v_id`, b.`e_date`, b.`t_slots`, v.`v_name`, b.`description` 
                 FROM `booking` AS b 
                 INNER JOIN `venue` AS v ON b.`v_id` = v.`v_id` 
                 WHERE b.`u_id`='$uid'";
       
       $result = mysqli_query($conn, $query);
       $data = $result->fetch_all(MYSQLI_ASSOC);
       ?>
       
        
          
          
         


    <h1><?= htmlspecialchars($username) ?>'s-bookings</h1>
    <table  cellspacing="0" cellpadding="10">
        <tr>
            <th>BOOKING ID</th>
            <th>BOOKING NAME</th>
            <th>VENUE</th>
            <th>DURATION</th>
            <th>DATE</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>
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
    <?php if (empty($data)): ?>
    <tr>
        <td colspan="7"><center>No bookings found</center></td>
    </tr>
<?php else: ?>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['b_id']) ?></td>
            <td><?= htmlspecialchars($row['b_name']) ?></td>
            <td><?= htmlspecialchars($row['v_name']) ?></td>
            <td><?= htmlspecialchars($row['t_slots']) ?></td>
            <td><?= htmlspecialchars($row['e_date']) ?></td>
            <td><?= htmlspecialchars($row['description']) ?></td>
            <td>
                <form method="post" action="./mybookings.php">
                    <input type="hidden" name="entry_id" value="<?= htmlspecialchars($row['b_id']) ?>">
                    <button class="ctn" type="submit" onclick="return confirm('Are you sure you want to delete this entry?');">DELETE</button>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
<?php endif ?>
    </table>
    <script>
function deleteEntry() {
    if (confirm("Are you sure you want to delete this entry?")) {
        var entryId = <?php echo json_encode($row['b_id']); ?>; 
        document.getElementById('entry_id').value = entryId; 
        document.getElementById('deleteForm').submit(); 
    }
}
</script>

<?php


    if (isset($_POST["entry_id"])) {
      
        $entryId = mysqli_real_escape_string($conn, $_POST["entry_id"]);

        $query = "DELETE FROM `booking` WHERE `b_id`='$entryId'";

        if (mysqli_query($conn, $query)) {
            $message = "Entry deleted successfully";
        } else {
            $message = "Error deleting entry: " . mysqli_error($conn);
        }

        $location = "http://localhost/majorProject/user/mybookings.php";

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
    } else {
    }
    mysqli_close($conn);

?>

        
    </body>
    </html>
    