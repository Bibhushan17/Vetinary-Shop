<!DOCTYPE html>
<html>
<head>
    <title>Vetinary Service Management</title>
    <link rel="stylesheet" href="homestyle.css">
    <style>
       
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
.navbar {
    display: flex;
    align-items: center;
    justify-content: center; /* Center horizontally */
    padding: 1%;
    background-color: #A0AAB2;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
}

.nav-links {
    text-align: center;
}

.nav-links a {
    color: rgb(0, 0, 0);
    margin: 5%;
    text-decoration: none;
    display: inline-block; /* Ensures that anchor tags behave like block-level elements */
}

.nav-links li {
    display: inline;
}

.nav-links li a:hover {
    background-color: #f0eeff;
}

.menu {
    margin-right: 2%;
    display: flex;
    gap: 1em;
    font-size: 1.5em;
}

.menu a {
    color: rgb(0, 0, 0);
}

.menu li {
    margin: 0;
    padding: 0;
}

.menu li a:hover {
    background-color: #f0eeff;
}

.logo {
    height: auto;
    width: auto;
    margin-left: 2%;
}

body {
    background-color: #D5E6EF;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 10px;
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
                <li><a href="admin.php">Home</a></li>
                <!-- <li><a style="white-space:nowrap; color:#000A65;" href="login.php">Book Appointment</a></li> -->
                <li><a style="white-space:nowrap; color:#000A65;" href="admin_order.php">Appointments</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a style="white-space:nowrap; color:#000A65;" href="admin_setting.php">Inquiries</a></li>
                <li><a href="logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
</body>
</html>
