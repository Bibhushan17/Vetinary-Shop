
<?php
SESSION_START();
include 'adminbar.php';
include 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM appointments WHERE DATE(PickupDate) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $today);
$today = date("Y-m-d");
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_status'];
    $update_id = $_POST['update_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `appointments` SET status = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header('location: order_today.php');
    };
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `appointments` WHERE id = '$remove_id'");
    header('location: order_today.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Today</title>
    <style>
        body
        {
            margin-left: 12%;
            margin-top: 1%;
        }
        .line
        {
            height: 1px;
            max-width: 900px;
            color: grey;
            opacity: 20%;
            margin-top: 0.5%;
            

        }
        .guff
        {
          /* margin-left:10%; */
          margin-bottom: 5%;
          white-space: nowrap;

        }
        .guff h1 {
            font-size: 50px;
            font-weight: lighter;
            white-space: nowrap;
        }
        
        .container
        {
          /* margin-top:5%; */
          margin-left: -43%;
          
        }
         .heed
        {
          margin-top:9%;
          margin-left: -10%;
          font-size:14px;
          font-weight: 450;
        }
        table
        {
          
          border-collapse: collapse;
          text-align: center;
          margin-top: 2%;
          border-spacing: 3px;
          box-shadow: 3px 3px 3px rgb(0,0,0,0.3);
          margin-left:-10%;
        }
        th,td
        {
            width: 25px;
            text-align:center;
        }
        thead
        {
          font-size: 14px;
          /* font-weight: lighter; */
        }
    
        .container h1
        {
          font-weight: medium;
          font-size: 2em;
        }

        .table 
        {
        /* margin-top: 10px;  */
      }
tr
  {
    align-items:center;
    text-align: center;
    justify-content:center;
    /* gap:1em; */
    margin-bottom:10px;
    white-space: nowrap;

    /* margin:3%; */
  }
  th
  {
    padding: 12px;
    white-space: nowrap;
    text-align: center;
    background-color: #FFEAEE;
    /* margin-bottom:5px; */
    font-weight: lighter;
  }
  td 
  {
    padding:5px;
    color:black;
    font-size:12px;
    font-weight: lighter;
    
  }
  tr:nth-child(even) td {
            background-color: #f2f2f2; /* Background color for even rows */
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Background color for odd rows */
        }
        .empty
        {
          margin-top: 3%;
          margin-bottom: 2%;
        }
      
        select
        {
          padding: 5px 5px;
          margin-bottom: 5px;
          background-color: #ccc1cc;
          border: none;
          border-radius: 2px;
          box-shadow: 5px 5px 5px rgb(0.3.0.3,0.3,0.3);
          
        }
        select :hover
        {
          background-color: #ccc;
          border-color: red;
          color:white;

        }
        .image-button {
            width: 50px;
            height: 50px;
            /* Optionally, add more CSS styles like background color or border */
        }
        .no-results-message {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
        color: #555;
        font-weight: bold;
    }

    </style>
</head>

<body>
    <div class="guff">
        <h1>Welcome to the Admin Panel</h1>
        <p style="font-size:14px; margin-top:10px;">This is your overall view of content.</p>
        <hr class="line">
    </div>
    <div class="container">
        <h1 class="heed">Order Status - Today</h1>
        <table class="table">
        <thead>
    <tr>
    <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Selected item</th>
      <th scope="col"> Weight</th>
      <th scope="col">Total Price</th>
      <th scope="col">Pickup Date</th>
      <th scope="col">Pickup Time</th>
      <th scope="col"> Delivery  Date</th>
      <th scope="col"> Delivery Time</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
            <tbody>
                <?php
                $rowcount = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $rowcount++; ?></td>
                            </td>
                <td><?php echo $row["Name"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td> 
                    <?php 
                          if( $row["SelectedItem"]==120){
                            echo "Wash and Fold";
                            }
                            elseif($row["SelectedItem"]==250){ echo "express Laundry";}
                            else { echo "Wash and Iron ";}
                    ?>
                 </td>
                <td><?php echo $row["Weight"] ?></td>
                <td><?php echo $row["TotalPrice"] ?></td>
                <td><?php echo $row["PickupDate"] ?></td>
                <td><?php echo $row["PickupTime"] ?></td>
                <td><?php echo $row["DeliveryDate"] ?></td>
                <td><?php echo $row["DeliveryTime"] ?></td>
                <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" >
                    <div>
                                            <select name="update_status" class="form-control">
                                            <option><?php echo $row['Status']; ?></option>
                                                
                                                <option value="Confirmed">Confirmed</option>
                                            <option value="Cancel">Cancel</option>
                                            <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                    <input type="submit" value="update" src="ok.png" name="update_update_btn">
                    </form></td>
                <td><a href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                <img style="width:15px; height:15px;"  src="del.png"/></a></td>
                </tr>
                <?php 
            }
        } 
                else 
                    // echo "0 results";
                    echo '<tr><td colspan="13" class="no-results-message">No Order Received Today.</td></tr>';

                ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = "order_today.php?remove=" + id;
            }
        }
    </script>

</body>

</html>