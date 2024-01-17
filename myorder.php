<?php
session_start();
include("nav.php");
include("db.php");
  
 if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
   {
    header("Location:login.php");
   }
  
  
     $username =$_SESSION['user'];
    //  echo $username;
     $query = "SELECT * FROM appointments WHERE Name='$username'";
     $result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif,calibri;
        }
     
        h1 {
            /* margin: 2%; */
            font-size: 3em;
        }
        .container
        {
            /* margin-top: -5%; */
            /* top: 12%; */
            width: 50%;
            text-align: center;
            /* border: 1px solid #ddd; */
            background-color: #EFF6E9;
            transform: translate(50%,25%);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
          
        }
        table
        {
            height: 80%;
            width: 96%;
            margin: 2%;
            padding: 3%;
            color: black;
            /* border: 1px solid black; */
            text-align: center;
            justify-content: center;
            align-items: center;


        }
    
        table tr 
        {
            /* margin: 2%; */
            padding: 17px;
            margin-top: 20px;
            margin-bottom: 15px;
            justify-content: space-between;
            font-size: 17px;
            background-color: #01161E;
            color: white;

        
        }
        table td
        {
            align-items: center;
            padding: 10px;
            margin: 10px;
            margin-top: 10px;
            font-size: 14px;
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2;
            color:black;
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Background color for odd rows */
            color: black;
        }


    </style>
</head>

<body>
    <div class="container">
        <h1 style="margin-top:5%; background-color:#BEE9E8; width:100%; padding:5px;"> My Appointment History </h1>
        <table class="table">
           <thead>
                    <tr>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;"scope="col">Name</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col">Address</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col">Phone</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col"> Pet Species</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col">Pet Name</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col">Appointment Date</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col">Appointment Time</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col"> Service</th>
                        <th style="font-size: 20px; font-weight:lighter; padding:10px;" scope="col"> Price</th>


                        
                        

                    </tr>
            </thead>
         <?php
            if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {

        ?>

                <tr>
                        <td><?php   echo $row['Name'];    ?></td>
                        <td><?php   echo $row['Address'];    ?></td>
                        <td><?php   echo $row['Phone'];    ?></td>
                        <td><?php   echo $row['Species'];    ?></td>
                        <td><?php   echo $row['PetName'];    ?></td>
                        <td><?php   echo $row['PickupDate'];    ?></td>
                        <td><?php   echo $row['PickupTime'];    ?></td>
                        <td><?php   echo $row['SelectedItem'];    ?></td>
                        <td><?php   echo $row['TotalPrice'];    ?></td>




                </tr>
 <?php 
                                           
                        }
                    }


            ?>
        </table>

</table>
</div>
</body>
</html>
