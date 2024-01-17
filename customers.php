<?php
session_start();
include 'db.php';
include 'adminbar.php';
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
    exit();
}

// Function to remove a customer by their ID
if (isset($_GET['remove_customer'])) {
    $customer_id = $_GET['remove_customer'];
    $delete_sql = "DELETE FROM users WHERE id = $customer_id";
    mysqli_query($conn, $delete_sql);
}

// Fetch the list of customers
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 0 auto; /* Center-align the container horizontally */
            text-align: center; /* Center-align text within the container */
            max-width:80%; /* Set a maximum width for the container */
            
        }

        .container .guff h1 {
            margin-top: 7%;
            font-size: 4em;
            font-weight: lighter;
            margin-left: -2%;
        }

        .top_header h1 {
            margin-top: 7%;
            font-weight: lighter;
            font-size: 3em;
        }

        .line1,
        .line {
            height: 1px;
            color: black;
            opacity: 20%;
            margin-top: 0.5%;
            max-width: 900px;
            margin: 0 auto; /* Center-align the lines horizontally */
        }
        table
        {
          
          border-collapse: collapse;
          text-align: center;
          margin-top: 5%;
          border-spacing: 5px;
          box-shadow: 3px 3px 3px rgb(0,0,0,0.3);
          margin-left:1%;
          width: 100%;
          padding: 10px;
        }
        th
        {
            width: 20px;
            text-align:center;
            font-size: 18px;
        }
        td
        {
            width: 20px;
            text-align:center;
            font-size: 12px;
            padding: 15px, 15px;
        }
        /* thead
        {
          font-size: 20px;
          font-weight: bold;
        }
     */
        .container h1
        {
          font-weight: lighter;
          font-size: 2em;
        }

        .table 
        {
        margin-top: 10px; /* Increase space between textfield area and table */
      }
tr
  {
    align-items:center;
    text-align: center;
    justify-content:center;
    /* gap:1em; */
    margin-bottom:10px;
    white-space: nowrap;
    padding: 20px;

    /* margin:3%; */
  }
  th
  {
    padding:15px 15px;
    white-space: nowrap;
    text-align: center;
    /* background-color: #e6f5ff; */
    background-color: #183A37;
    color: white;
    margin-bottom:5px;
    box-shadow: 3px 3px 3px rgb(0,0,0,0.3);
  }
  td 
  {
    padding: 8px 10px;
    /* background-color: #FFEAEE; */
    color:black;
  }
.btn
{
    text-decoration: none;
    color: white;
}



  tr:nth-child(even) td {
            background-color:#04151F; /* Background color for even rows */
            color: white;
            padding: 10px;
            font-size: 14px;
        }

        tr:nth-child(odd) td {
            background-color: #04151F; /* Background color for odd rows */
            color: white;
            padding: 10px;
            font-size: 14px;


        }
       
    </style>
    
    
</head>

<body>
    <div class="container">
        <div class="guff" >
        <!-- Your page content goes here -->
        <h1>Customer Data</h1>
        </div>
        
        <!-- Customer List -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                    <!-- <th>Details</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <a href="?remove_customer=<?php echo $row['id']; ?>" class="btn">Remove</a>
                            </td>
                            
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
