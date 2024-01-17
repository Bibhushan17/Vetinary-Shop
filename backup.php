<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

include ('nav.php');
include ('db.php');
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
// echo $username;

$errors = []; // Initialize errors array

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
}

// Handle form submission
if (isset($_POST['submit'])) 
{ 
    
    // echo "Welcome";
    $selectedItem = $_POST['item'];
    
    $weight = $_POST['weight'];
    $totalPrice=$_POST['hidden-total-price'];
    $name=$_POST['fullname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $pickupdate=$_POST['pickup-date'];
    $pickuptime=$_POST['pickup-time'];
    $PetName=$_POST['PetName'];
    $Species=$_POST['Species'];

    function validateTime($time)
{
    return strtotime($time) >= strtotime('11:00') && strtotime($time) <= strtotime('16:00');
}

    $errors = array();
    
    if (empty($selectedItem)) {
        $errors[] = "You must choose a service.";
    }

    // Validate No of species
    if (!is_numeric($weight) || $weight < 1 || $weight > 2 || !preg_match('/^[1-2]$/', $weight)) {
        $errors[] = "Invalid number. You can only choose 1 or 2 pets.";
    }
    
    if (empty($PetName)) {
        $errors[] = "Pet Name is required.";
    } elseif (!is_string($PetName)) {
        $errors[] = "Pet Name should be a string.";
    } elseif (strlen($PetName) > 50) {
        $errors[] = "Pet Name should have a maximum length of 50 characters.";
    }
    
    // Validate Species
    if (empty($Species)) {
        $errors[] = "Species is required.";
    } elseif (!is_string($Species)) {
        $errors[] = "Species should be a string.";
    } elseif (strlen($Species) > 50) {
        $errors[] = "Species should have a maximum length of 50 characters.";
    }
    

    // Validate Appointment date
    $currentDate = date('Y-m-d');
    $pickupDateObj = DateTime::createFromFormat('Y-m-d', $pickupdate);
    if (!$pickupDateObj || $pickupDateObj < new DateTime($currentDate) || $pickupDateObj > (new DateTime($currentDate))->modify('+3 days')) {
        $errors[] = " Please choose a date between tomorrow and the next 3 days.";
    }



    // Check if there are any validation errors
    if (count($errors) === 1) {
        // Display individual prompt box for the single error
        echo "<script>alert('" . $errors[0] . "');</script>";
    } 
    elseif (count($errors) > 1) 
    {
        // Display multiple errors in a single prompt box
        echo "<script>alert('" . implode("\\n", $errors) . "');</script>";

    }
    else
    {
        if (!empty($errors)) 
        {
            foreach ($errors as $error)
            {
                echo "<p>$error</p>";
            }
        }
    else
    {
        
        
            // echo "Hello world";
        if(isset($_POST['hidden-total-price']))
        {
            $tp=$_POST['hidden-total-price'];
            // header("Location: ".$_SERVER['PHP_SELF']);  
        }
        else{
            header("Location: ".$_SERVER['PHP_SELF']);  
        }
            
            // Store the order details and total price in the database
            $item = mysqli_real_escape_string($conn, $selectedItem);
            $quantity = 1; // Assuming quantity is always 1
            $weight = mysqli_real_escape_string($conn, $weight);
            $totalPrice = mysqli_real_escape_string($conn, $totalPrice);
            if ($item == 2000) {  
                $laa="Wellness Exam";
            } elseif ($item == 1500) {
                $laa="Dental Care";
            } elseif ($item == 1200) {
                $laa="Dietary Consultation";
            } elseif ($item == 1000) {
                $laa="Vaccinations";
            }
            elseif ($item == 3500) {
                $laa="Wellness Exam and Dental Care";
            }
            elseif ($item == 3200) {
                $laa="Wellness Exam and Detary Consultation";
            }
            elseif ($item == 3000) {
                $laa="Wellness Exam and Vaccinations";
            }
            elseif ($item == 3500) {
                $laa="Wellness Exam and Dental Care";
            }
            elseif ($item == 2700) {
                $laa="Dental Care and Detary Consultation";
            }
            elseif ($item == 2500) {
                $laa="Dental Care and Vaccinations";
            }
            elseif ($item == 2200) {
                $laa="Detary Consultation and Vaccinations";
            }
            
            $Status="Pending";
            $insertQuery ="INSERT INTO order_new(Name, Address,Phone,SelectedItem,Weight,TotalPrice,PickupDate,PickupTime,PetName,Species,Status) VALUES('$name','$address','$phone','$laa','$weight','$totalPrice','$pickupdate','$pickuptime','$PetName','$Species','$Status')";
            $result= mysqli_query($conn, $insertQuery);


    // var_dump($result);
    // if ($result) {
       
    //     echo "data added successfully"; // Redirect to success page
    //     // exit();
    // } else {
    //     // Query execution failed
    //     echo "Error: " . mysqli_error($conn);
    // }

    // Redirect to the invoice page with the order details and total price
    // header('order.php');

            // echo $selectedItem." ".$weight." ".$totalPrice." ".$name." ".$address." ".$phone." ".$pickupdate." ".$pickuptime;

            // Check if the form is submitted and the query executed successfully
            // if (isset($_POST['submit']) && $result) {
                // echo "<script>alert('Appointment placed successfully.');</script>";
            // } elseif (isset($_POST['submit']) && !$result) {
                // Query execution failed
                // echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            
        }    
        }
    }

       

?>

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

<script>

const pickupDateInput = document.getElementById("pickup-date");
const pickupTimeInput = document.getElementById("pickup-time");

// Get the current timestamp
const currentTimestamp = Date.now();

// Calculate the current date in YYYY-MM-DD format
const currentDate = new Date(currentTimestamp).toISOString().split('T')[0];

// Set the 'min' attribute for date input
pickupDateInput.setAttribute("min", currentDate);

// Set the 'min' and 'max' attributes for time input
pickupTimeInput.setAttribute("min", "11:00");
pickupTimeInput.setAttribute("max", "16:00");

// Add an event listener to the form for form submission
document.querySelector("form").addEventListener("submit", function (event) {
    const pickupTimestamp = new Date(pickupDateInput.value + "T" + pickupTimeInput.value).getTime();

    // Check if pickup date/time is in the past
    if (pickupTimestamp < currentTimestamp) {
        alert("Appointment date/time cannot be in the past.");
        event.preventDefault(); // Prevent form submission
        return;
    }

    // Check if pickup time is outside the allowed range (11 AM - 4 PM)
    const pickupTime = pickupTimeInput.value.split(":");
    const pickupHour = parseInt(pickupTime[0]);

    if (pickupHour < 11 || pickupHour >= 16) {
        alert("Appointment time must be between 11 AM and 4 PM.");
        event.preventDefault(); // Prevent form submission
        return;
    }
});

    document.getElementById("PetName").addEventListener("input", function () {
    const PetName = document.getElementById("PetName").value;
    const PetNameError = document.getElementById("PetName-error");

    if (/[^a-zA-Z]/.test(PetName) || PetName.length > 50) {
        PetNameError.innerText = "Only string input & max 50 characters.";
    } else {
        PetNameError.innerText = "";
    }
});


function setMinDeliveryDate() 
{
            var pickupDate = document.getElementById("pickup-date").value;
            document.getElementById("delivery-date").min = pickupDate;
        }

        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toISOString().split("T")[0];
            document.getElementById("pickup-date").setAttribute("min", today);
            document.getElementById("delivery-date").setAttribute("min", today);
        })
        document.addEventListener("DOMContentLoaded", function() {
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("pickup-date").setAttribute("min", today);
});


// Add an event listener to validate Species
document.getElementById("Species").addEventListener("input", function () 
{
    const Species = document.getElementById("Species").value;
    const SpeciesError = document.getElementById("Species-error");

    if (/[^a-zA-Z]/.test(Species) || Species.length > 50) {
        SpeciesError.innerText = "Only string input and max 50 characters.";
    } else {
        SpeciesError.innerText = "";
    }
});

</script>
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
                <label for="weight">No of Pets:</label>
                <input type="number" name="weight" id="weight" min="1" max="10" placeholder="Number of Pets" required>


                <label for="PetName">Name of the pet:</label>
                <input type="text" name="PetName" id="PetName"  placeholder="Pet Name" required>
                <span id="PetName-error" style="color: red;"></span>


                <label for="Species">Species of the pet:</label>
                <input type="text" name="Species" id="Species"  placeholder="Dog / Bird /Hamster .." required>
                <span id="Species-error" style="color: red;"></span>


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
                        const weight = parseFloat(document.getElementById("weight").value);
                        const totalPriceDisplay = document.getElementById("total-price-display");
                        const selectedService = services.find(service => service.service_price === selectedItem.value);
                           // PRICE CALCULATE GARNA KO LAGI MATRAI HO 
                        if (selectedService) {
                            const pricePerUnit = parseFloat(selectedService.service_price);
                            const totalPrice = pricePerUnit * weight;

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
                    document.getElementById("weight").addEventListener("input", updatePriceAndTotal);
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