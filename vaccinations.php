<?php
include("nav copy.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccination- Veterinary Clinic</title>
    <style>

body
        {
            background-image: url('dental.png');
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
        }
        body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Adjust the alpha value for opacity */
    z-index: -1; /* Ensure the pseudo-element is positioned above the background image */
}

        header
        {
            background-color: white;
            padding: 5px;
            margin-top:-2%;
        }
        header p
        {
            text-align: center;
            font-size: 16px;
            margin-top: 5px;
            margin-bottom: 15px;
        }
        section
        {
            background-color: rgba(155, 155, 155, 0.5);
            text-align: center;
            padding:15px;
            margin-top: 3%;

        }

        section h2
        {
            text-align: center;
            font-size: 24px;
            /* margin-top: 55px; */
            margin-bottom: 15px;
            color:white;
            font-family: arial, calibri;

        }
        .b1
            {
                margin-left: 43%;
                color: black;
                background-color: #FCE694;
                padding: 10px;
                font-size: 20px;    
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;                border:none;
            }
            .book
            {
                margin-top: 5%;
            }


            .footer 
            {
                margin-top:100px;
                background-color: #381D2A;
                color:  #BA5624;
                text-align: center;
                align-items: left;
                padding: 10px 0;
                
                width: 100%;
                /* opacity: 0;  */
                /* transition: opacity 0.3s ease;  */
                display: flex;
                justify-content: left;
                height: 350px; 
            }


.copyright {
    font-size: 16px;
    margin-left: -58%;
    margin-top: 18%;
    white-space: nowrap;
    /* position:fixed; */
}
.l1 ul li
{
    text-align: left;
    font-size: 20px;
    align-items:left;
    
}
.l1
{
    /* transform: translate(0%,5%); */
    margin-top: 3%;
}

.l1 li
{
    font-size: 16px;
    margin-left: 3%;
    /* margin-top: 10%; */
    font-weight: lighter;
    color:white;
    align-items: left;
    text-align: left;

}

.b1
            {
                margin-left: 43%;
                color: black;
                background-color: #FCE694;
                padding: 10px;
                font-size: 20px;    
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;                border:none;
            }


            

            .footer 
            {
                margin-top:100px;
                background-color: #381D2A;
                color:  #BA5624;
                text-align: center;
                align-items: left;
                padding: 10px 0;
                
                width: 100%;
                /* opacity: 0;  */
                /* transition: opacity 0.3s ease;  */
                display: flex;
                justify-content: left;
                height: 350px; 
            }


.copyright {
    font-size: 16px;
    margin-left: -58%;
    margin-top: 18%;
    white-space: nowrap;
    /* position:fixed; */
}
.l1 ul li
{
    text-align: left;
    font-size: 20px;
    align-items:left;
    
}
.l1
{
    /* transform: translate(0%,5%); */
    margin-top: 3%;
}

.l1 li
{
    font-size: 16px;
    margin-left: 3%;
    /* margin-top: 10%; */
    font-weight: lighter;
    color:white;
    align-items: left;
    text-align: left;

}
       

</style>
</head>
<body>

<header>
    <h1>Vaccination at Sangam Veterinary Clinic</h1>
    <p>Providing comprehensive vaccination for your pets.</p>
</header>


<section>
    <h2>Our Vaccination Services</h2>

    <p style="color:white; font-size:18px; margin-top:15px;margin-bottom:10px;">At Sangam Veterinary Clinic, we offer a range of vaccination services to keep your pets healthy and happy.</p>
    <div>

    
    <p style="color:white; font-size:18px; margin-top:15px;margin-bottom:10px; width:70%; margin-left:15%; line-height:3vh;">Young animals are like kids–it’s a never-ending job to keep them safe and happy. Vaccinating your pet is a relatively inexpensive but very important way to protect his or her health. In addition to preventing many life-threatening illnesses, vaccinations can prevent diseases prevalent in wildlife and those that can be passed to humans. It’s important to administer vaccinations when pets are puppies and kittens because their young immune systems are still developing and need protection to stay healthy.</p>
</section>
   
<div class="book">
        <a class="b1" href="login.php" class="booking">Book Appointment</a>
    </div>

<div class="footer">
        <ul class="l1">
            <li style ="font-size:20px;margin-top:3%;">Contact Us For Wellness Care</li>
            
            <li style ="font-size:16px;margin-top:1.5%;" >    
                    <p>If you have any questions or would like to schedule a wellness care appointment for your pet, 
                        please feel free to contact us.
                    </p>
            </li>
            <li style ="font-size:16px; white-space:nowrap;margin-top:1.5%;">Phone: (123) 456-7890</li>
            <li style ="font-size:16px; white-space:nowrap;">Email:abcd@gmail.com</li>
            <li style ="font-size:16px; white-space:nowrap;">Address: 123 Main Street</li>

        </ul>
        <div class="map">
                    <!-- Replace the "YOUR_GOOGLE_MAPS_API_KEY" text with your own Google Maps API key -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.448488564047!2d85.43071207504957!3d27.672530127026967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1aadc2110825%3A0xeeee00f2eefb6b72!2sSangam%20Veterinary%20Concern!5e0!3m2!1sen!2snp!4v1694272955904!5m2!1sen!2snp" width="500" height="200" style="border:0; margin-left:110px; margin-top:55px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                     <!--<iframe src="https://www.google.com/maps?q=27.694424926326036,85.32943775385198&z=15&output=embed" 
                         width="300px" height="350" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"> -->
                    </iframe>
            </div>
        <p class="copyright">&copy; Privacy Policy | Accessibility | © Copyright 2023 - Sangam Veterinary Clinic. </p>
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