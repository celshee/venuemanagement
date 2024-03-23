<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue-rvw</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        .pic-ctn {
            background-position: center;
            height: 180px;
            width: 320px;
            overflow: hidden;
            position: relative;
        }

        .pic-ctn img {
            position: absolute;
            top: 0;
            left: 0;
            height: auto;
            width: 100%;
            opacity: 0;
            animation: fade-in-out 8s infinite;
            border-radius: 12px;
        }

        .pic-ctn img:nth-child(1) {
            animation-delay: 0s;
            /* Start immediately */
        }

        .pic-ctn img:nth-child(2) {
            animation-delay: 4s;
            /* Delay the second image by 4 seconds */
        }

        @keyframes fade-in-out {

            0%,
            100% {
                opacity: 0;
            }

            25%,
            75% {
                opacity: 1;
            }
        }
        .ctn{
            padding: 8px 15px;
            background: #92c5ee;
            border-radius: 30px;
            color: whitesmoke;
        }
        .container-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .container {
            backdrop-filter: blur(16px) saturate(180%);
            background-color: rgba(17, 25, 40, 0.25);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.125);
            padding: 10px;
            filter: drop-shadow(0 30px 10px rgba(0, 0, 0, 0.125));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: fit-content;
            width: fit-content;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .wrapper {
            height: fit-content;
            width: fit-content;
        }

        .wrapper h3 {
            color: antiquewhite;
        }

        .button-wrapper {
            margin-top: 10px;
            padding: auto;
        }

        .btn {
            border: none;
            padding: 12px 24px;
            border-radius: 24px;
            font-size: 12px;
            font-size: 0.8rem;
            letter-spacing: 2px;
            cursor: pointer;
        }

        .btn+.btn {
            margin-left: 10px;
        }

        .outline {
            background: transparent;
            color: rgba(0, 212, 255, 0.9);
            border: 1px solid rgba(0, 212, 255, 0.6);
            transition: all .3s ease;
        }

        .outline:hover {
            transform: scale(1.125);
            color: rgba(255, 255, 255, 0.9);
            border-color: rgba(255, 255, 255, 0.9);
            transition: all .3s ease;
        }

        .fill {
            background: rgba(0, 212, 255, 0.9);
            color: rgba(255, 255, 255, 0.95);
            filter: drop-shadow(0);
            font-weight: bold;
            transition: all .3s ease;
        }

        .fill:hover {
            transform: scale(1.125);
            border-color: rgba(255, 255, 255, 0.9);
            filter: drop-shadow(0 10px 5px rgba(0, 0, 0, 0.125));
            transition: all .3s ease;
        }


        body {
            background: linear-gradient(45deg, #49a09d, #5f2c82, #49a09d, #5f2c82);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        
            margin-top: 20px;
            background-position: center;
            border-radius: 10px;
            justify-content: center;
            background-position: center;
            height: 100%;
       

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
        input{
            width: 50px;
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
            display: flex;
        }

        /* Dropdown styles */
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
        .form-container {
            background-position: center;
            display: flex;
            flex-direction: column; /* Stack items vertically */
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 0 10px;
            width: fit-content;
            height: fit-content;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin-top: 30px;
        }

        .form-container label{
            padding: 10px;
        }
        .form-container input {
            width: fit-content;
            height: fit-content;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
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
        <div class="form-container">
            <form method="POST" action="vnereview.php" name="bookingForm">
                <label for="message">SELECT VENUE FOR DELETION</label><br>
                <div class="form-group row">
                    <div class="col-sm-2 col-form-label">
                        <?php
                        include '../connection.php';

                        $sql = "SELECT v_id, v_name FROM venue";

                        $result = $conn->query($sql);
                        ?>
                        <select name="venue" class="custom-select" id="inputGroupSelect02" required>
                            <option value=""></option>
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
                <div class="col-sm-10">
                <div class="button-wrapper ">

                <input type="submit" class="ctn" value="Submit">
                        </div>
                        </div>
            </form>
        </div>

<?php
    if ($_POST) {
    $venueId = $_POST["venue"];
    $query = "DELETE FROM venue WHERE `venue`.`v_id`= $venueId";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    } }

?>

        <div class="container-wrapper">

            <?php

            $query = "SELECT `v_id`, `v_name`, `img1`, `img2`, `cap`, `loc`, `ac` FROM `venue`;";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die ("Error in query: " . mysqli_error($conn));
            }

            $processedVenues = [];
            if ($result->num_rows > 0) {
                while ($venue = $result->fetch_assoc()) {
                    $images = [];
                    if ($venue['img1']) {
                        $images[] = base64_encode($venue['img1']);
                    }
                    if ($venue['img2']) {
                        $images[] = base64_encode($venue['img2']);
                    }

                    $processedVenue = [
                        'name' => $venue['v_name'],
                        'images' => $images,
                        'details' => 'Capacity: ' . $venue['cap'] . '<br>' .
                            'Location: ' . $venue['loc'] . '<br>' .
                            'AC: ' . ($venue['ac'] ? 'Yes' : 'No')
                    ];

                    $processedVenues[] = $processedVenue;
                }
            } else {
                echo "No venues found.";
            }

            foreach ($processedVenues as $index => $venue) {
                ?>
                <div class="container-wrapper">
                    <div class="container">
                        <div class="wrapper">
                            <div class="banner-image">
                                <div class="pic-ctn">
                                    <?php foreach ($venue['images'] as $image) { ?>
                                        <img src="data:image/jpeg;base64,<?php echo $image; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <h3>
                                <?php echo $venue['name']; ?>
                            </h3>
                        </div>
                        <div class="button-wrapper">
                            <button onclick="openModal('venueModal<?php echo $index + 1; ?>')"
                                class="detailsBtn btn outline" id="detailsBtn">DETAILS</button>
                           
                        </div>
                        <div id="venueModal<?php echo $index + 1; ?>" class="modal">
                            <div class="modal-content">
                                <span class="close"
                                    onclick="closeModal('venueModal<?php echo $index + 1; ?>')">&times;</span>
                                <p>
                                    <?php echo $venue['details']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <script>



            function closeModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            function openModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = "block";
            }

        </script>
</body>

</html>