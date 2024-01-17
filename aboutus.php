<?php
include 'nav copy.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .text1
        {
            margin-top: -50%;
            font-size: 20px;
            width: 70%;
            text-align: center;
            margin-left: 15%;
            line-height: 3.3vh;
        }
        .service1
        {
            margin-top: 40%;
            margin-bottom: 3%;
            font-size: 30px;
            text-align: center;
            margin-left: 1%;
            font-weight: 500;
        }
        .terms
        {
            margin-top: 5%;
            font-size: 14px;
            text-align: left;
            margin-left: 9%;
            font-weight: 400;
            width: 80%;
            /* white-space: nowrap; */
            /* background-color: #373737; */
            
        }

        </style>
   
</head>
<body>
   
    <div>
        <div class="example">
            <img  src="vet44.jpg" alt ="kukur haruko photo"/>
            <p class="text1"> <b>About Us</b><br><br>
            Sangam Veterinary is the Nepal’s leading representative body for veterinary professionals working in leadership and management roles. 
            A not-for-profit organization, we work in collaboration with other prominent veterinary bodies to encourage and support the 
            professional and personal development of those in the veterinary profession through CPD, networking, 
            certified management accreditation and the provision of educational resources.
            </p>
            <br><Br><br><br>
          </div>
        
          <p class = "service1">Service Terms & Condition</p>
        <div class="terms">
            <ul>
                <li>
                Appointment Scheduling: Users of the veterinary appointment system agree to use the platform exclusively for booking appointments with veterinarians for legitimate and lawful purposes.
                </li><br>
                <li>
                Accuracy of Information: Users are responsible for providing accurate and up-to-date information when scheduling appointments. Any errors in information provided may lead to appointment rescheduling or cancellation.
                </li><br>
                <li>
                Cancellation and Rescheduling: Users should adhere to the specified cancellation and rescheduling policies of the veterinary clinic, which may include advance notice requirements and associated fees.
                </li><br>
                <li>
                Privacy and Data Security: The veterinary appointment system respects user privacy and follows applicable data protection laws. User data will only be used for appointment-related communication and will not be shared with third parties without consent
                </li><br>
                <li>
                Emergency Situations: In cases of emergencies or severe medical conditions, users should contact the veterinary clinic directly and not rely solely on the online appointment system.
                </li><br>
                <li>
                Payment and Fees: Users are responsible for any applicable fees, which may include consultation fees and charges for additional services. Payment policies will be provided by the veterinary clinic.
                </li><br>
                <li>
                Liability: The veterinary clinic, its staff, and the developers of the appointment system are not liable for any damages, losses, or injuries incurred during or as a result of appointments scheduled through the system.
                </li><br>
            </ul>
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

    <style>
        body
        {
            overflow: hidden;
            width: 100%;
            height: 100vh;
            overflow-y: scroll;
        }
        img
        {
            width: 100%;
        }


        .footer 
            {
                margin-top:60px;
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
                height: 340px; 
            }


.copyright {
    font-size: 16px;
    margin-left: -65%;
    margin-top: 21%;
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
</body>
</html>

