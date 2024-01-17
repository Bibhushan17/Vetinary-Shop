<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include('nav.php');
include('db.php');

$username = $_SESSION['username'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$errors = []; // Initialize errors array

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
}

// Handle form submission
if (isset($_POST['submit'])) {
    $selectedItem = $_POST['item'];
    $Number = $_POST['Number'];
    $totalPrice = $_POST['hidden-total-price'];
    $name = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pickupdate = $_POST['pickup-date'];
    $pickuptime = $_POST['pickup-time'];
    $PetName = $_POST['PetName'];
    $Species = $_POST['Species'];

    // Function to validate time
    function validateTime($time)
    {
        return strtotime($time) >= strtotime('11:00') && strtotime($time) <= strtotime('16:00');
    }
    function validateAlphabetic($input, $max_length)
    {
        return preg_match('/^[a-zA-Z]+$/', $input) && strlen($input) <= $max_length;
    }
        

    // Function to validate alphanumeric input with a maximum length
   
    // Validate required fields
    $requiredFields = ['item', 'Number', 'hidden-total-price', 'fullname', 'address', 'phone', 'pickup-date', 'pickup-time', 'PetName', 'Species'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The {$field} field is required.";
        }
    }

    // Validate selected item
    $validItems = ['2000', '1500', '1200', '1000', '3500', '3200', '3000', '2700', '2500', '2200'];
    if (!in_array($selectedItem, $validItems)) {
        $errors[] = "Invalid selected item.";
    }

    // Validate number of pets
    if (!is_numeric($Number) || $Number < 1 || $Number > 2 || !preg_match('/^[1-2]$/', $Number)) {
        $errors[] = "Invalid number. You can only choose 1 or 2 pets.";
    }

    if (!validateAlphabetic($PetName, 50)) {
        $errors[] = "Pet Name should contain only alphabetic characters and have a maximum length of 50 characters.";
    }
    
    // Validate species name
    if (!validateAlphabetic($Species, 50)) {
        $errors[] = "Species Name should contain only alphabetic characters and have a maximum length of 50 characters.";
    }



    // Validate appointment date
    $currentDate = date('Y-m-d');
    $pickupDateObj = DateTime::createFromFormat('Y-m-d', $pickupdate);
    if (!$pickupDateObj || $pickupDateObj < new DateTime($currentDate) || $pickupDateObj > (new DateTime($currentDate))->modify('+3 days')) {
        $errors[] = "Please choose a date between tomorrow and the next 3 days.";
    }

    // Validate appointment time
    if (!validateTime($pickuptime)) {
        $errors[] = "Appointment time must be between 11 AM and 4 PM.";
    }

    // If no errors, proceed with inserting data
    if (empty($errors)) {
        $item = mysqli_real_escape_string($conn, $selectedItem);
        $quantity = 1; // Assuming quantity is always 1
        $Number = mysqli_real_escape_string($conn, $Number);
        $totalPrice = mysqli_real_escape_string($conn, $totalPrice);

        // Map item to its corresponding service
        $services = [
            '2000' => 'Wellness Exam',
            '1500' => 'Dental Care',
            '1200' => 'Dietary Consultation',
            '1000' => 'Vaccinations',
            '3500' => 'Wellness Exam and Dental Care',
            '3200' => 'Wellness Exam and Dietary Consultation',
            '3000' => 'Wellness Exam and Vaccinations',
            '2700' => 'Dental Care and Dietary Consultation',
            '2500' => 'Dental Care and Vaccinations',
            '2200' => 'Dietary Consultation and Vaccinations',
        ];

        $laa = isset($services[$item]) ? $services[$item] : 'Unknown Service';

        $Status = "Pending";
        $insertQuery = "INSERT INTO appointments(Name, Address, Phone, SelectedItem, Number, TotalPrice, PickupDate, PickupTime, PetName, Species, Status) VALUES('$name','$address','$phone','$laa','$Number','$totalPrice','$pickupdate','$pickuptime','$PetName','$Species','$Status')";
        $result = mysqli_query($conn, $insertQuery);
        if ($result) {
            echo "<script>alert('Appointment placed successfully.');</script>";
            // Order placed successfully, redirect to myorder.php
            echo "<script>window.location.href='myorder.php';</script>";
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
        
    } else {
        // Display individual prompt box for the first error
        echo "<script>alert('" . $errors[0] . "');</script>";
    }
}
?>
<!-- Remaining HTML code... -->



<!DOCTYPE html>
<html>
<head>
    <title>Order- pet treatment services</title>
    <!-- <link rel="stylesheet" href="order-style.css"> -->
    <style>
      
        h1
        {
            margin-top: 7%;
            font-size: 5vh;
        }
        
        h1.x1
        {
            margin-top: 5%;
            margin-bottom: 5%;
            font-size: 3em;
            background-color: #3C0000;
            color:white;
            margin-bottom: -3%;
            font-style: arial, calibri;
            width: 30%;
            text-align: center;
            margin-left: 33%;
            border-radius: 5px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 10px;
            padding: 16px;
            white-space: nowrap;

        }
        
        .container 
        {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 5%;
            margin: 3%;
            padding: 3%;
        }

        .left-side 
        {
            /* margin-top: 1% ; */
            width: 30%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            margin-left: -80%;
            margin-top: -22%;


        }

        .right-side 
        {
            width: 40%;
            
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f1dca7;
            margin-left: 30%;
        }
    
        .table-container 
        {
            margin-top: 6%;
            background-color: red;
            
        }
        table 
        {
            margin-top: -3%;
            font-size: 1.3em;
            font-family: Arial, Helvetica, sans-serif;
            /* border: 2px solid #000; */
            border-collapse: collapse;
            width: 100%;
        }
        thead 
        {
            text-align: center;
            font-family: arial, calibri, sans-serif;

        }

        th 
        {
            background-color: #f2f2f2;
            font-weight: lighter;
            font-size: 1.5em;
            padding: 10px;
        }

       
        tbody tr td 
        {
            text-align: center;
            font-family: arial, calibri, sans-serif;
            font-style: light;
            /* padding: 5px; */
            line-height: 5vh;
            background-color: #ffe5ec;
            
        }

        h2
        {
            text-align: center;
            font-size: 3em;
            font-weight: lighter;
        }
        .left-side h2
        {
            text-align: center;
            /* font-size: 3em; */
            font-weight: lighter;
            margin-bottom: -7%;
            background-color: #ffe5ec;
            padding: 10px;;
            font-family: Arial, Helvetica, calibri;
        }
        .right-side h2
        {
            text-align: center;
            font-size: 2em;
            font-weight: lighter;
            font-family: 'arial', 'calibri', 'sans-serif';  /*schedule and pickup delivery form *
            /* margin-bottom: -7%;
            margin-top:2% ; */
            margin: 5%;
            
        }

        label 
        {
            display: block;
            margin-top: 2%;
            
        }

        input[type="number"],
        select
        {
            margin-bottom: 5%;
            padding: 5px;
            height: 40px;
            width: 100%;   
            /* text field width size change */
            align-items: center;
        }

        input[type="text"]
        {
            margin-bottom: 5%;
            padding: 5px;
            height: 40px;
            width: 100%;   
            /* text field width size change */
            align-items: center;
        }
        input[type="submit"]
        {
            margin-bottom: 30px;
            padding: 5px;
            height: 40px;
            width: 100%;   
            /* text field width size change */
            align-items: center;
            background-color: #b8c0ff;
        }

        label
        {
            font-size: 1.3em;
            color: black; 
            margin-bottom: 15px;
            text-align: center;
        }

        


</style>

</head>
<body>

<h1 class="x1">Pet Treatment Service</h1>
<div class="container">
    <img style="z-index:-111; width:50%; margin-left: 25%; " src="pana.png"/>
    <div class="left-side">
        <h2>Price List</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Price per pet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  // Include your database connection
                    $serviceQuery = "SELECT * FROM services";
                    $serviceResult = mysqli_query($conn, $serviceQuery);

                    while ($row = mysqli_fetch_assoc($serviceResult)) {
                        echo "<tr>";
                        echo "<td>{$row['service_name']}</td>";
                        echo "<td>Rs {$row['service_price']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
    </div>
</div>


    <div class="right-side">
        <h2>Book you Appointment</h2>

        <div class="forms-container">
            <form class="pick" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
                <input type="hidden" name="hidden-total-price" id="hidden-total-price" value="">
                
                <?php
                 
            
                 
                $userQuery = "SELECT * FROM users WHERE username='$username'";
                $userResult = mysqli_query($conn, $userQuery);

                if ($userResult && mysqli_num_rows($userResult) > 0) {
                    $userData = mysqli_fetch_assoc($userResult);
                    $fullName = $userData['fullname'];
                    $userPhone = $userData['phone'];
                    $userAddress = $userData['address'];
                    $userEmail = $userData['email'];
                }
                //    echo $fullName.$userPhone.$userAddress.$userEmail;
                ?>
                <input type="hidden" name="fullname" value="<?php echo $fullName; ?>">
                <input type="hidden" name="phone" value="<?php echo $userPhone; ?>">
                <input type="hidden" name="address" value="<?php echo $userAddress; ?>">
                <input type="hidden" name="email" value="<?php echo $userEmail; ?>">
                
                <label for="item">Service:</label>
                <select name="item" id="item" onchange="updatePriceAndTotal()">
                    <option value="">Select a service...</option>
                    <?php
                    $serviceData = array(); // Store service data for JavaScript
                    $serviceQuery = "SELECT * FROM services";
                    $serviceResult = mysqli_query($conn, $serviceQuery);

                    while ($row = mysqli_fetch_assoc($serviceResult)) {
                        $serviceData[] = $row;
                        echo "<option value='{$row['service_price']}'>{$row['service_name']}</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="selected-item-price" id="selected-item-price" value="">
                <input type="hidden" name="selected-total-price" id="selected-total-price" value="">
                <label for="price">Price:</label>
                <span style=" margin-bottom:15px; font-size:12px; text-align:center; font-weight:bold;"  id="price-display" name="prices"></span>

                <label for="Number">No of Pets:</label>
                <input type="number" name="Number" id="Number" min="1" max="10" placeholder="Number of Pets" required>


                <label for="PetName">Name of the pet:<span id="PetName-error" style="color: red;"></span></label>
                <input type="text" name="PetName" id="PetName"  placeholder="Pet Name" required>


                <label for="Species">Species of the pet:<span id="PetName-error" style="color: red;"></label>
                <input type="text" name="Species" id="Species"  placeholder="Dog / Bird /Hamster .." required>


                <label style=" margin-bottom:15px;"for="total-price">Total Price:</label>
                <span style=" margin-bottom:15px; font-size:12px; text-align:center; font-weight:bold;" id="total-price-display"></span>

                <script>
                    // JavaScript code here
                    const services = <?php echo json_encode($serviceData); ?>;

                    function populateServiceOptions() 
                    {
                        const itemSelect = document.getElementById("item");
                        itemSelect.innerHTML = "<option value=''>Select a service...</option>";

                        services.forEach(service => {
                            const option = document.createElement("option");
                            option.value = service.service_price;
                            option.text = service.service_name;
                            itemSelect.appendChild(option);
                        });
                    }

                    function updatePriceAndTotal() 
                    {
                        const selectedItem = document.getElementById("item");
                        const priceDisplay = document.getElementById("price-display");
                        const Number = parseFloat(document.getElementById("Number").value);
                        const totalPriceDisplay = document.getElementById("total-price-display");
                        const selectedService = services.find(service => service.service_price === selectedItem.value);
                           // PRICE CALCULATE GARNA KO LAGI MATRAI HO 
                        if (selectedService) {
                            const pricePerUnit = parseFloat(selectedService.service_price);
                            const totalPrice = pricePerUnit * Number;

                            priceDisplay.innerText = `Rs ${pricePerUnit.toFixed(2)}`;
                            totalPriceDisplay.innerText = `Rs ${totalPrice.toFixed(2)}`;
                            document.getElementById("hidden-total-price").value = totalPrice.toFixed(2);

                            // Update the hidden fields with price per kg and total price
                            document.getElementById("selected-item-price").value = pricePerUnit.toFixed(2);
                            document.getElementById("selected-total-price").value = totalPrice.toFixed(2);
                        }
                    }

                    document.addEventListener("DOMContentLoaded", populateServiceOptions);
                    document.getElementById("item").addEventListener("change", updatePriceAndTotal);
                    document.getElementById("Number").addEventListener("input", updatePriceAndTotal);
                </script>
                <label for="pickup-date">Appointment Date:</label>
                <input style="width:100%; height:45px; margin-bottom:15px;" type="date" name="pickup-date" id="pickup-date" required>

                <label for="pickup-time">Appointment Time:</label>
                <input style="width:100%; height:45px; margin-bottom:15px;" type="time" name="pickup-time" id="pickup-time" required>


                <input type="submit" value="Confirm Schedule" name="submit">
            </form>
        </div>
    </div>
</div>




</div>   
</body>
</html>