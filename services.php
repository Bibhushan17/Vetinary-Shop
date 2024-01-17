<?php
include 'nav copy.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            width: 100%;
            height: 100vh;
            overflow-y: scroll;
        }

        .bg-image {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('paws.jpg');
            /* background-color: #F5D0C5; */
            background-size: cover;
           
        }

        .overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -800%);
            text-align: center;
        }

        .heading {
            font-size: 24px;
            color: white; /* Change text color as needed */
        }
    .heading
    {
        font-size:30px;
        text-align: center;
        /* margin-top:2%; */
        color: black;
        font-weight: 600;

        /* margin-bottom: 2%; */
    }

    .card {
            display: inline-block;
            width: 300px;
            border: 1px solid #ccc;
            background-color:#BFFFF1;
            margin: 10px;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
        }

        .card h3
        {
            font-size: 20px;
            font-weight: lighter;
            font-family: arial, calibri;
            text-align: center;
            margin-top: 10px;
        }
        .details-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-size:14px;
        }
        .box
        {
            transform: translate(0%,50%);
            margin-left: 7%;
        }
        .book
        {
            font-size:24px;
            font-family:arial, calibri;
            font-weight:lighter;
            text-align:center;
            margin-left:40%;
            background-color:#BFFFF1;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width:20%;
            white-space:nowrap;
            padding:10px;
            margin-top:15%;
        }


</style>
 
<body>
</div>
<div class="bg-image">
    <!-- <img src="paws.jpg" alt="kukur ko photo as bg"/> -->
        <div class="overlay">
            <p class="heading">Sangam Veterinary Clinic Services</p>
        </div>
    <div class="box">
    <div class="card">
        <img src="well.jpg" alt="Wellness Exam">
        <h3>Wellness Exam</h3>
        <a href="wellness.php" class="details-link">Details</a>
    </div>

    <div class="card">
        <img src="diet3.jpg" alt="Dietary Consultation">
        <h3>Dietary Consultation</h3>
        <a href="diet.php" class="details-link">Details</a>
    </div>
    <div class="card">
        <img src="dental.jpg" alt="Dental Care">
        <h3>Dental Care</h3>
        <a href="dental.php" class="details-link">Details</a>
    </div>

    <div class="card">
        <img src="inject.jpg" alt="Vaccinations">
        <h3>Vaccinations</h3>
        <a href="vaccinations.php" class="details-link">Details</a>
    </div>
    </div>

    <div class="book">
        <a href="login.php" class="booking">Book Appointment</a>
    </div>
</div>

  



</body>
</html>
<?php
include 'footer.php';
?>