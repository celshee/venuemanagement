<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue</title>
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
    animation-delay: 0s; /* Start immediately */
}

.pic-ctn img:nth-child(2) {
    animation-delay: 4s; /* Delay the second image by 4 seconds */
}

@keyframes fade-in-out {
    0%, 100% {
        opacity: 0;
    }
    25%, 75% {
        opacity: 1;
    }
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
        .navbar-container{
    margin-top: 20px;
}
.container-wrapper{
display: flex;
}
    </style>
</head>

<body>
<div style="margin-top: 20px" class="navbar-container">

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
</div>
<div class="container-wrapper">

<?php
include '../connection.php';

$query = "SELECT `v_id`, `v_name`, `img1`, `img2`, `cap`, `loc`, `ac` FROM `venue` WHERE 1";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error in query: " . mysqli_error($conn));
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
                <h3><?php echo $venue['name']; ?></h3>
            </div>
            <div class="button-wrapper">
                <button onclick="openModal('venueModal<?php echo $index + 1; ?>')" class="detailsBtn btn outline" id="detailsBtn">DETAILS</button>
                <button onclick="setVenueSession('<?php echo $index +1; ?>')" class="btn fill">BOOK NOW</button>
            </div>
            <div id="venueModal<?php echo $index + 1; ?>" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('venueModal<?php echo $index + 1; ?>')">&times;</span>
                    <p><?php echo $venue['details']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>
<script>
        
        function setVenueSession(venue) {
        // Set session variable
        sessionStorage.setItem('selectedVenue', venue);
        // Navigate to the next page
        window.location.href = "http://localhost/majorProject/user/booking.php";
    }


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