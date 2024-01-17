<!DOCTYPE html>
<?php
session_start();
include('adminbar.php');
include('db.php');

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user data from the database
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$userData = mysqli_fetch_assoc($query);

$query1 = mysqli_query($conn, "SELECT * FROM feedback");
// Check if the query was successful
if ($query1) {
    // Fetch data
    $userData1 = mysqli_fetch_assoc($query1);
    // Display the table
} else {
    // Display an error message if the query fails
    echo "Error: " . mysqli_error($conn);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Management System - Admin Profile</title>
    <style>
        body {
            margin-left: 11%;
        }
        
        label {
            font-size: 2em;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .profile-info {
            text-align: left;
            margin-top: 8%;
            transform: translate(-300%, -10%);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .profile-info h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5%;
        }

        .profile-info label {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .profile-info p {
            font-size: 16px;
            margin: 0;
        }

        .guff h1 {
            font-size: 4em;
            font-weight: lighter;
        }

        .line {
            height: 1px;
            max-width: 900px;
            color: grey;
            opacity: 20%;
            margin-top: 0.5%;
        }

        table {
            margin-left: 300px;
            /* margin-top: -10%; */
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        .box

        {
            margin-top: 5%;
        }
    </style>
</head>
<body>

<div class="box">
<table>
    <table>
    <thead>
            <tr>
                <th>Email</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are records
            if ($userData1) {
                do {
                    ?>
                    <tr>
                        <td><?php echo $userData1['email']; ?></td>
                        <td><?php echo $userData1['feedback']; ?></td>
                    </tr>
                    <?php
                } while ($userData1 = mysqli_fetch_assoc($query1));
            } else {
                echo "<tr><td colspan='2'>No records found</td></tr>";
            }
            ?>
        </tbody>

    </table>
    
</div>


</body>
</html>
