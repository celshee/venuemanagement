<?php
session_start();
$uid = $_SESSION["userid"];
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        .ctn {
            padding: 6px 12px;
            background: #92c5ee;
            border-radius: 20px;
            color: whitesmoke;
            font-size: 14px;
            width: 150px;
        }


        body {
            background: linear-gradient(45deg, #49a09d, #5f2c82, #49a09d, #5f2c82);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            background-position: center;
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



        .form-container {
            background-position: center;
            border-radius: 10px;
            box-shadow: 0 0 10px;
            width: fit-content;
            height: fit-content;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            align-items: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 30px;
        }


        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        .form-container label {
            padding: 8px;
        }
        


        .time {
            height: 40px;
            width: 100px;

        }

        .checkbox-group {
            display: flex;
            flex-direction: row;

        }

        .navbar-container {
            margin-top: 20px;
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
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {

            var selectedVenue = sessionStorage.getItem('selectedVenue');

            var dropdown = document.getElementById("inputGroupSelect02");

            for (var i = 0; i < dropdown.options.length; i++) {
                if (dropdown.options[i].value === selectedVenue) {
                    dropdown.selectedIndex = i;
                    console.log(i);
                    break;
                }
            }

        });
    </script>

</head>



<body>
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

    <div class="navbar-container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">VENUE REGISTRATION</a>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="venue.php">EXPLORE VENUE</a>
                    <a class="nav-item nav-link" href="booking.php">BOOKING</a>
                    <a class="nav-item nav-link" href="mybookings.php">MY BOOKINGS</a>
                    <a class="nav-item nav-link" href="login.php">LOG OUT</a>

                </div>
            </div>
        </nav>
    </div>
    <h1>NEW BOOKING</h1>

<div class="container">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="form-container">
            <form method="POST" action="booking.php" name="bookingForm" onsubmit="return validateForm()">
                <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">NAME</label>
                    <div class="col-sm-10">
                        <input required type="text" name="uname" class="form-control" id="inputname" readonly
                            value="<?= htmlspecialchars($username) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputid" class="col-sm-2 col-form-label">STUDENT ID</label>
                    <div class="col-sm-10">
                        <input required type="text" name="uid" class="form-control" id="inputid" readonly
                            value="<?= htmlspecialchars($uid) ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="InputEmail" class="col-sm-2 col-form-label">OFFICIAL MAIL ID</label>
                    <div class="col-sm-10">
                        <input type="email" name="umail" class="form-control" id="InputEmail" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">PHONE NUMBER</label>
                    <div class="col-sm-10">
                        <input type="number" title="Phone number must contain exactly 10 digits" required
                            pattern="\d{10}" name="unum" class="form-control" id="inputname" placeholder="123467890">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputname" class="col-sm-2 col-form-label">DATE</label>
                    <div class="col-sm-10">
                        <input type="date" required name="udate" class="form-control" id="udate"
                        min="<?= date('Y-m-d', strtotime('+1 day')) ?>" max="<?= date('Y-m-d', strtotime('+3 months')) ?>">
                    </div>
                </div>

                <!-- Slot checkboxes -->


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">SLOTS</label>
                    <div class="col-sm-10">
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="slot[]" value="1"> 1st</label>
                            <label><input type="checkbox" name="slot[]" value="2"> 2nd</label>
                            <label><input type="checkbox" name="slot[]" value="3"> 3rd</label>
                            <label><input type="checkbox" name="slot[]" value="4"> 4th</label>
                            <label><input type="checkbox" name="slot[]" value="5"> 5th</label>
                            <label><input type="checkbox" name="slot[]" value="6"> 6th</label>
                            <label><input type="checkbox" name="slot[]" value="7"> 7th</label>
                            <label><input type="checkbox" name="slot[]" value="8"> 8th</label>
                            <label><input type="checkbox" name="slot[]" value="9"> 9th</label>
                            <label><input type="checkbox" name="slot[]" value="10">10th</label>

                        </div>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="InputEmail" class="col-sm-2 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-10">
                    <textarea rows="4" cols="50" name="comment" required placeholder="Tell us about the event your hosting..eg.computer science dept. conducting farewell"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="venue" class="col-sm-2 col-form-label">VENUE </label>
                    <div class="col-sm-10">
                        <?php
                        include '../connection.php';

                        $sql = "SELECT v_id, v_name FROM venue"; 
                        
                        $result = $conn->query($sql);
                        ?>
                        <select name="venue" class="custom-select" id="inputGroupSelect02" required>
                            <option value="">Select Venue</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['v_id'] . "'>" . $row['v_name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <script>
                    var selectedVenue = sessionStorage.getItem('selectedVenue');

                        document.querySelector("#inputGroupSelect02").value = selectedVenue;

                </script>

                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <button style="align-self: center;" class="ctn">BOOK</button>
                    </div>
                </div>



            </form>

        </div>
    </div>

    <script>



        function validateForm() {
            var email = document.forms["bookingForm"]["umail"].value;
            var phone = document.forms["bookingForm"]["unum"].value;
            var date = document.forms["bookingForm"]["udate"].value;
            var slots = document.querySelectorAll("input[name='slot[]']:checked");
            var venue = document.forms["bookingForm"]["venue"].value;

            // Basic validation for name, id, email, and venue

            if (email == "") {
                alert("Email must be filled out");
                return false;
            }
            if (venue == "Choose...") {
                alert("Please choose a venue");
                return false;
            }
            // Validate at least one slot is checked
            if (slots.length === 0) {
                alert("Please select at least one slot");
                return false;
            }
        }
    </script>


    </div>
</body>

</html>
<?php


if ($_POST) {
    // Sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST["uname"]);
    $email = mysqli_real_escape_string($conn, $_POST["umail"]);
    $id = mysqli_real_escape_string($conn, $_POST["uid"]);
    $venueId = mysqli_real_escape_string($conn, $_POST["venue"]);
    $num = mysqli_real_escape_string($conn, $_POST["unum"]);
    $date = mysqli_real_escape_string($conn, $_POST["udate"]);
    $selectedSlots = isset ($_POST['slot']) ? $_POST['slot'] : array();
    $slotstring=implode(',', $_POST['slot']);
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $sql = "SELECT `b_id`, `b_name`, `u_id`, `v_id`, `e_date`, `ph_num`, `t_slots`, `gmail` FROM `booking` WHERE `v_id`=$venueId AND `e_date`='$date'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die ("Error: " . mysqli_error($conn));
    }

    $bookingExists = false;
    $values = array(); 
    while ($row = mysqli_fetch_assoc($result)) {
        $slotValues = explode(',', $row['t_slots']);
        $values = array_merge($values, $slotValues);
    }
    $commonElements = array_intersect($values, $selectedSlots);
    if (!empty ($commonElements)) {
        $message = "OOPS!! " . implode(", ", $commonElements) . " are already booked for the day";
        echo "<script>
       document.addEventListener('DOMContentLoaded', function() {
           var messageModal = new bootstrap.Modal(document.getElementById('messageModal2'));
           var messageBody = document.getElementById('messageBody2');
           messageBody.innerHTML = '$message';
           messageModal.show();
       });
   </script>";
        $bookingExists = true;
        exit();
    }


    if (!$bookingExists) {
        // If no conflicts, insert the booking
        $slots = implode(',', $selectedSlots);
        $sql = "INSERT INTO `booking` (`b_name`, `u_id`, `v_id`, `e_date`, `gmail`,`ph_num`, `t_slots`, `description`) VALUES ('$name', '$id', '$venueId', '$date','$email', '$num', '$slotstring',' $comment')";
        if (mysqli_query($conn, $sql)) {
            $message = "YAY!! YOUR SLOT IS BOOKED";
            $location = "http://localhost/majorProject/user/mybookings.php";
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

            exit();
        } else {



        }


    }
}
?>