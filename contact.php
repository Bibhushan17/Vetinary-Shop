<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
            .container
            {
                position: inherit;

            }
            .container h2
            {
                font-size: 24px;
                font-weight: lighter;
                font-family: arial, calibri;
                
            }
            label
            {
                font-size:16px;
            }
            .container h3
            {
                font-size: 24px; /* Adjust the font size as desired */
                color: #C4D6B0;
                position: absolute;
                top: 110%; /* Adjust the spacing between the form and text */
                left: 50%;
                transform: translateX(-50%);
                z-index: 2;
                text-align: center;
                width: 100%;
                /* font-family: 'jokerman','arial','calibri';   */
                 font-family: 'arial','calibri';
                 font-weight: lighter;
                font-size: 2rem;
                background-color: #3F3F37;
                width: 100%;
                margin-top: 3.5%;;
                padding: 5px;
            }
            
            .container img{
                width: 100%;
                height: auto;
            }
            .container form
            {
                position: absolute;
                top: 50%;
                right: 80%;
                transform: translate(200%,-50%);
                z-index: 1;
                padding: 1%;
                background-color: rgba(255, 255, 255, 0.8);
                box-shadow: 0px 0px 40px rgba(0.3, 0.3, 0.3, 0.3);
                border-radius: 5px;
                width: 500px;
                height: 400px;
                padding: 20px;

            }
            
            .container form input[type="text"],
            .container form textarea 
            {
                width: 100%; /* Set the text field width to 100% of the container */
                height: 50%; /* Adjust the height of the text field as desired */
                margin-bottom: 20px; 
            }
            .container form input[type="email"]
            {
                width: 100%;
                height: 10%;
            }

            .container form textarea
             {
                height: 100px; /* Adjust the height of the text area as desired */
                
            }
            #feedback, #email
            {
                margin-bottom:25px;
            }
            .send-button 
            {
            align-items: center;
            text-align: center;
            /* margin-left:25.7%; */
            background-color: #2E3532;
            color: #ffffff;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            display: block;
            width: 25%;
            transition: opacity 0.3s ease;
        }
        p
        {
            font-size:18px;
            font-family: calibri, arial;
            margin-top:15px;

        }

        .footer {
    background-color: #381D2A;
    color:  #BA5624;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
    opacity: 0; /* Initially hidden */
    transition: opacity 0.3s ease; /* Smooth transition */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 40px; /* Adjust the height as needed */
}

/* Style for the copyright text */
.copyright {
    font-size: 18px;
    margin: 0; /* Remove default margin */
}




        
</style>
<body>
    <div class="container">
        <img src="cc.jpg" alt="background image"/>
        <div>
            <form class="formX" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Contact Us</h2>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address." required>
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" placeholder="Enter your feedback or any queries." required></textarea>
                <button class="send-button"type="submit">Send</button>
                <p>Call us at: +977-9842245984</p>
            </form>
        </div>
        <?php
        // Include the database connection file
        include('db.php');
        include ('nav copy.php');

        // Check if the user is logged in (implement your login system here)

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['feedback'])) {
            // Sanitize user input to prevent SQL injection (always sanitize user input)
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

            // Insert the feedback into the database
            $sql = "INSERT INTO feedback (email, feedback) VALUES ('$email', '$feedback')";

            if (mysqli_query($conn, $sql)) {
                echo "Feedback submitted successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "Please fill out the feedback form.";
            }
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    
    </div>
    <div class="footer">
    <p class="copyright">Pur Purr Purrrrrrr-fect vet for your pet.</p>
</div>
<script>
    window.addEventListener('scroll', function() {
        var footer = document.querySelector('.footer');
        var scrollY = window.scrollY || window.pageYOffset;
        var pageHeight = document.documentElement.scrollHeight || document.body.scrollHeight;
        var viewportHeight = window.innerHeight || document.documentElement.clientHeight;

        if (scrollY + viewportHeight >= pageHeight - 10) {
            footer.style.opacity = '1';
        } else {
            footer.style.opacity = '0';
        }
    });
</script>
</body>
</html>
