<?php  

SESSION_START();
include'adminbar.php';
include 'db.php';
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
    exit();
}

//  if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//    }
include  'db.php';
$sql = "SELECT * FROM appointments";
$result = $conn -> query ($sql);

 
if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_status'];
    $update_id = $_POST['update_id'];

    if ($update_value === 'Remove') {
        // Remove the order from the database
        $delete_query = mysqli_query($conn, "DELETE FROM `appointments` WHERE id = '$update_id'");
        if ($delete_query) {
            // Order successfully removed
            echo "<script>alert('Order successfully removed.');</script>";
        } else {
            // Error removing order
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        // Update the status for other cases
        $update_quantity_query = mysqli_query($conn, "UPDATE `appointments` SET status = '$update_value' WHERE id = '$update_id'");
        if ($update_quantity_query) {
            // Status successfully updated
            echo "<script>alert('Status updated successfully.');</script>";
        } else {
            // Error updating status
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }

    header('location:admin_order.php');
}


?>

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body
        {
            margin: 0;
            padding: 0;
            overflow: hidden;
            overflow-y: scroll;
        }
       
        .guff
        {
          margin-left:10%;
          margin-bottom: 5%;

        }
        .guff h1
        {
            font-size: 4em;
            font-weight: lighter;
            
        }
        .container
        {
          /* margin-top:5%; */
          /* margin-left: -15%; */
          
        }
         .heed
        {
          margin-top:5%;
          /* margin-left: -9%; */
        }
        table
        {
          
          border-collapse: collapse;
          text-align: center;
          margin-top: 2%;
          border-spacing: 5px;
          box-shadow: 3px 3px 3px rgb(0,0,0,0.3);
          margin-left:15%;
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
    /* white-space: nowrap; */

    /* margin:3%; */
  }
  th
  {
    padding:15px;
    white-space: nowrap;
    text-align: center;
    font-weight: lighter;

    background-color: #EFCB68;
        /* background-color: #FFEAEE; */
    margin-bottom:5px;
    box-shadow: 3px 3px 3px rgb(0,0,0,0.3);


  }
  td 
  {
    padding: 8px 8px;
    /* background-color: #FFEAEE; */
    color:black;
    font-size:12px;
    /* font-weight: bold; */
    
  }
  tr:nth-child(even) td {
            background-color:#314154; /* Background color for even rows */
            color:white; /* Background color for odd rows */

        }

        tr:nth-child(odd) td {
            background-color:#314154;
            color:white; /* Background color for odd rows */
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

    </style>
</head>
<body>
<div class="guff" >
        <!-- Your page content goes here -->
        <!-- <h1>Welcome Admin!</h1> -->
    </div>
<div class="container">
  <h1 class = "heed" >Appointments Status</h1>
<table class="table">
  <thead>
    <tr>
    <th scope="col">I.D.</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Service</th>
      <th scope="col"> No of Pets</th>
      <th scope="col"> Species Name</th>
      <th scope="col"> Appointment Date</th>
      <th scope="col"> Appointment Time</th>
      <th scope="col">Total Price</th>
      <th scope="col">Action</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $rowcount=1;
          if (mysqli_num_rows($result) > 0) 
          {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
              
              ?>
                <tr>
                <td>
                <?php  echo $rowcount++;
                ?></td>
                <td><?php echo $row["Name"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["SelectedItem"]?></td>
                <td><?php echo $row["Number"] ?></td>
                <td><?php echo $row["Species"] ?></td>
                <td><?php echo $row["PickupDate"] ?></td>
                <td><?php echo $row["PickupTime"] ?></td>
                <td><?php echo $row["TotalPrice"] ?></td>
                
                <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" >
                    <div>
                                            <select name="update_status" class="form-control">
                                            <option><?php echo $row['Status']; ?></option>
                                                
                                                <option value="Confirmed">Confirmed</option>
                                            <option value="Cancel">Cancel</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Remove" data-remove-id="<?php echo $row['id']; ?>">Remove</option>

                                            </select>
                                        </div>
                    <input type="submit" value="update" src="ok.png" name="update_update_btn">
                    <!-- <input type="image" style="width:25px; height:25px;" src="update.png" alt="Update" name="update_update_btn"> -->

                    <!-- <input type="image" img style="width:25px; height:25px;"  src="update.png" name="update_update_btn"> -->

                </form></td>
                <td><?php echo $row["Status"] ?></td>

                </tr>
                <?php 
            }
        } 
                else 
                    echo "0 results";
                ?>
        
  </tbody>
</table>
</div>

<!-- Add this script to the end of your HTML body -->
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     document.querySelector('select[name="update_status"]').addEventListener('change', function() {
    //         var selectedValue = this.value;

    //         if (selectedValue === 'Remove') {
    //             // Ask for confirmation before removing
    //             var confirmRemove = confirm('Are you sure you want to remove this order?');

    //             if (confirmRemove) {
    //                 // Get the form element and submit it
    //                 var form = this.closest('form');
    //                 form.submit();
    //             } else {
    //                 // Reset the dropdown to the original status
    //                 this.value = ''; // or select another appropriate option
    //             }
    //         }
    //     });
    // });
</script>

</body>
</html>

