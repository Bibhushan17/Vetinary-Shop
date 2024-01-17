
<!DOCTYPE html>
<html>
<head>
    <title>Vetinary Service Management</title>
    <link rel="stylesheet" href="homestyle.css">
    <style>
         /* body {
            background-color:#D5E6EF;
        } */
       
        h1
        {
            margin-top: 6%;
            text-align: center;
            align-items: center;
            justify-content: center;
            font-weight: lighter;
            font-size: 3em;

        } h2 {
            text-align: center;
            align-items: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body
{
    background-color:#D5E6EF;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 10px;
}
a{
    text-decoration: none;
}
li{
    list-style:none;
}

.navbar
{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1%;
    background-color: #A0AAB2;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;


}
.nav-links a
{
    color: rgb(0, 0, 0); /* defines text color */
    margin: 5%;
    
}
.nav-links li a:hover
{
    background-color: #f0eeff;
    
    /* background-image: linear-gradient(90deg,rgb(217, 155, 155), rgb(69, 183, 237)); */
    /* color: #D5E6EF; */
}
.logo
{
    height: auto;
    width: auto;
    margin-left: 2%;
}
.menu
{
    margin-right: 2%;
    display: flex;
    float: right;
    gap: 1em;
    font-size: 1.5em;
}
.nav-links .menu
{
    margin-right: 3%;
}
menu li{
    padding: 0px 0px;
    
}
.menu
        {
            text-align:center;
            align-items:center;
            justify-content: center;
            
        }
        .nav-bar
        {
            text-align:center;
            align-items:center;
            justify-content: center;


        }
        .nav-links
        {
            margin-left:33%;
            

        }
    </style>
</head>
<body>
    <nav class="navbar">
        <!-- <div class="logo">
            <a href="home.php">
                <img src="logo.png" class="logo" />
            </a>
        </div> -->
        <ul class="nav-links">
            <div class="menu">
                <li><a href="index.php">Home</a></li>
                <!-- <li><a href="home.php">Dashboard</a></li> -->
                <!-- <li><a style="white-space:nowrap; color:#000A65;" href="login.php">Book Appointment</a></li> -->
                <li><a href="home.php">Dashboard</a></li>
                <!-- <li><a href="pickup.php">Pickup</a></li> -->
                <li><a href="order.php">Appointment</a></li>
                <li><a style="white-space:nowrap; color:#000A65;" href="myorder.php">My History</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
</body>
</html>
