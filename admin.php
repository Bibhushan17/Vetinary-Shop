<?php
session_start();
include 'adminbar.php';
include 'db.php';
$_SESSION['username'] = "admin";
$user = $_SESSION['username'];
$Numofrows = $Numofrows2 = "";
$todaydate=date("Y-m-d");


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
$sql1 = "SELECT * FROM users";
$result = mysqli_query($conn, $sql1);
$Numofrows = mysqli_num_rows($result);

$sql2 = "SELECT * FROM appointments";
$result2 = mysqli_query($conn, $sql2);
$Numofrows2 = mysqli_num_rows($result2);

$sql3= "SELECT * FROM appointments WHERE PickupDate='$todaydate'";
$result3 = mysqli_query($conn, $sql3);
$Numofrows3 = mysqli_num_rows($result3);

$sql4= "SELECT * FROM appointments WHERE Status='Pending'";
$result4 = mysqli_query($conn, $sql4);
$Numofrows4 = mysqli_num_rows($result4);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .line {
            height: 1px;
            max-width: 900px;
            color: grey;
            opacity: 20%;
            margin-top: 0.5%;
        }

        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
            margin-left: -43%
        }

        .dashboard-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            text-align: center;
            background-color:#443850;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card a {
            text-decoration: none;
            color: white;
        }

        .dashboard-card h3 {
            margin: 0;
            font-size: 20px;
            font-weight: lighter;
        }

        .dashboard-card p {
            margin: 10px 0;
            font-size: 16px;
            color: white;
        }

        .guff h1 {
            font-size: 4em;
            font-weight: lighter;
        }

        .container2 {
            /* display: flex; */  
            justify-content: center;
            align-items: center;
            transform: translate(-70%, 90%);
        }

        .dashboard-card1 {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            margin: 10px;
            width: auto;
            text-align: center;
            background-color: white;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }
        .guff
        {
            margin-left: -1%;
        }
        .dashboard-container
        {
            margin-left: 1.5%;
        }
  
    </style>
</head>

<body>
    <div class="guff">
        <!-- Your page content goes here -->
        <h1>Welcome Admin!</h1>
        
    </div>
<div class="dash-container">
<div class="dashboard-container">
        <div class="dashboard-card">
            <a href="customers.php">
                <h3>Total Users</h3>
                <p><?php echo $Numofrows; ?></p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="admin_order.php">
                <h3>Total Appointments</h3>
                <p><?php echo $Numofrows2; ?></p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="order_today.php">
                <h3>Appointments Today</h3>
                <p><?php echo $Numofrows3; ?></p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="">
                <h3>Appointments Pending</h3>
                <p><?php echo $Numofrows4; ?></p>
            </a>
        </div>
    </div>

</div>
  

</body>

</html>
