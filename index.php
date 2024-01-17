<?php
include'nav copy.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetinary Appointment Systems</title>
<style>
    body{
        overflow: hidden;
        overflow-y: scroll;
    }
            .container
            {
                /* margin: 7%; */
                padding: 0%;
                align-items: center;
                justify-content: center;
            
            }
            .container .img1
            {
                display: flex;
                position: relative;
                /* left:43.5%; */
                width: 100%;
                margin-top:-2%;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                z-index: -11;
            }
            .text1
            {
                text-align: center;
                font-size: 50px;
                font-family: arial, calibri;
                font-weight: lighter;
                margin-top: -43%;
            }
            .text2
            {
                margin-left: 32%;
                font-size: 16px; 
                margin-top: -2%;
            }
            .container .img2
            {
                display: flex;
                position: relative;
                /* left:43.5%; */
                /* margin-left: 15%; */
                width: 100%;
                margin-top:15%;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                z-index: -11;
                
            }
            .b1
            {
                margin-left: 43%;
                color: black;
                background-color: #FCE694;
                padding: 10px;
                font-size: 20px;
                margin-top: 30%;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;                border:none;
            }
            .b2
            {
                margin-left: 2%;
                background-color: #FCE694;
                color: black;
                padding: 10px;
                font-size: 20px;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;                border:none;

            }
            .footer 
            {
                margin-top:0px;
                background-color: #381D2A;
                color:  #BA5624;
                text-align: center;
                align-items: left;
                padding: 0px 0;
                
                
                width: 100%;
                /* opacity: 0;  */
                /* transition: opacity 0.3s ease;  */
                display: flex;
                justify-content: left;
                height: 384px; 
            }


.copyright {
    font-size: 16px;
    margin-left: -65%;
    margin-top: 24%;
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
    text-align: left;
    margin-top: 0%;
}

.l1 li
{
    font-size: 16px;
    margin-left: 100%;
    margin-top: 10%;
    font-weight: lighter;
    color:white;
    align-items: left;
    text-align: left;

}

          
</style>
</head>
<body>

    <div class="container">
       
        
        <div>
            <img src="puppies.jpg" class="img1"/><br><Br><br><br>

            <p class="text1">
              Welcome To Sangam Veterinary Clinic
            </p><br><Br><br><br>
            
            <p class="text2">
            Where compassion and love meet pet medical expertise and
            superior animal care.<br><Br><br><br>
            </p>

            <button class="b1">
                <a href="login.php">Get Started</a>
            </button>

            <button class="b2">
                <a href="services.php">Services</a> 
            </button>   

           <!-- <img src="diet3.jpg" class="img2"/>-->
            
           
        </div>

        <div class="footer">
            <ul class="l1">
                <li style ="white-space:nowrap; font-size:20px;">Contact Us</li>
                <li><i class="fas fa-phone-alt"></i>Phone: 448706</li>
                <li><i class="far fa-envelope"></i>Email: SangamVet@gmail.com</li>
                <li><i class="fas fa-map-marker-alt"></i>Address: Golmadhi,Bhaktapur</li>
            </ul>

            <div class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.448488564047!2d85.43071207504957!3d27.672530127026967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1aadc2110825%3A0xeeee00f2eefb6b72!2sSangam%20Veterinary%20Concern!5e0!3m2!1sen!2snp!4v1694272955904!5m2!1sen!2snp" width="700" height="200" style="border:0; margin-left:510px; margin-top:35px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
           
    </div>          
</body>
</html>


