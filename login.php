<?php
include 'nav copy.php';
include ('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
   <style>
        body {
            background-color: #D5E6EF;
        }


        .login-card {
            width: 350px;
            margin: 0 auto;
            /* left: 15%; */
            padding: 20px;
            background: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 4px;
            position: absolute;
            transform: translate(70%, -235%);
            z-index: 1;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-card h2 
        {
            margin-bottom: 20px;
            font-size: 24px;
            font-family: Arial, Helvetica, sans-serif;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: lighter;
            text-align: center;
        }

        form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 1px;
            opacity:0.5;
            text-align: center;
        }

        /* button[type="submit"] {
            width: 50%;
            padding: 10px;
            background:#7E9181;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            transition: opacity 0.3s ease;
            align-items: center;
            text-align: center;
            margin-left:2.5%;
        } */
        .gmail-button1 
        {
            align-items: center;
            text-align: center;
            margin-left:25.7%;
            background-color: #283618;
            color: #ffffff;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            display: block;
            width: 50%;
            transition: opacity 0.3s ease;
        }

        button[type="submit"]:hover {
            opacity: 0.8;
        }

        .or {
            margin: 10px 0;
            font-size: 16px;
        }
        /* signup button talako */
        .gmail-button {
            align-items: center;
            text-align: center;
            margin-left:25.7%;
            background-color: #2E3532;
            color: #ffffff;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            display: block;
            width: 50%;
            transition: opacity 0.3s ease;
        }

        .gmail-button:hover {
            opacity: 0.8;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }
        .background-image-container
         {
  background-image: url('vet3.jpg');
  background-size: cover; /* This property scales the background image to cover the entire element. */
  background-position: center; /* This property centers the background image within the element. */
}

.bgimage {
            margin-top: 3%;
            align-items: center;
            /* display: block; */
            /* position: relative; */
            /* z-index: 1; */
            width:100%;

        }
        #username
        {
            height: 45px;
        }
        #password
        {
            height: 45px;
        }
    </style>
</head>
<body>
<div class="background-image-container">
<div class="login">
        <img src="vet3.jpg" alt ='login image'class='bgimage'/>
        <div class="login-card">
            <h2>Login</h2>
            <form id='login' action='auth.php' method='POST'>
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Username" required>
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Password" required>
              <button  class="gmail-button1"  type="submit">Sign In</button> 
              <p class="or">or</p>
              <a href="signup.php" class="gmail-button">Sign Up</a>
            </form>
          </div>
    </div></div>
   
</body>
</html>

<?php
include 'footer.php';
