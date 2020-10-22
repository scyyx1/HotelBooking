<!DOCTYPE html>
    <head>
        <meta charset = "utf-8"/>
    	<meta name = "keywords" content = "hotel, Sunny Isles"/>
        <title> Home </title>
        <link rel = "Stylesheet" type = "text/css" href = "home.css">
        <script type = "text/javascript" src = "emphasize.js"></script>
    </head>
    <body>
        <div class = "logo">
            <h1> Sunny Isle </h1>
            <?php
                include 'staff_login_check.php';
                include 'user_login_check.php';
                function welcome_user(){
                    $username = $_COOKIE["username"];
                    echo "Welcome user $username";
                }
                function welcome_staff(){
                    $username = $_COOKIE["username"];
                    echo "Welcome staff $username";
                }
                // Check whether the user is already logged in
			    if (checkLoggedIn() == true) { 
			echo("<script>console.log('fefef');</script>");?>
                    <h4><?php welcome_user() ?></h4> 
                <?php echo('<div class = "logout">
                                <a href = "logout.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Log out</button></a>
                                </div>'); // logout block to log out the system
                }
                // check whether the staff is already logged in
			    else if (staffcheckLoggedIn() == true) { ?>
                    <h4><?php welcome_staff() ?></h4> 
                <?php 
                    echo('<div class = "logout">
                            <a href = "logout.php"><button onMouseOver = "emphasize_button(this)" onMouseOut = "remove_button(this)">Log out</button></a>
                            </div>');
                    } else{
                    // neither user or staff login to the system, show up Login and Sign up block for login and create new account
                    echo('<div class = "login">
                            <a href = "login.php"><button onMouseOver = "emphasize(this)" onMouseOut = "remove(this)">LOGIN</button></a>
                            </div>
                            <div class = "register">
                                <a href = "register.php"><button onMouseOver = "emphasize(this)" onMouseOut = "remove(this)">SIGNUP</button></a>
                                </div>');
                }
                ?>
        </div>
        <div class = "main">
            <div class = "main-middle">
            <h1> HOTEL <h1>
            <h4> INTERNATIONAL LUXURY RESORT HOTEL </h4>
            <?php
                // if the staff have already logged into the system, the functionality he has is view the status of room
                if (staffcheckLoggedIn() == true) {
                    echo('<div class = "functionality"> 
                            <a href = "staffpage.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"> VIEW NOW </button></a>
                            </div>');
                }
                else{
                    echo('<div class = "functionality"> 
                    <a href = "userpage.php"><button onMouseOver = "emphasize_func(this)" onMouseOut = "remove_func(this)"> BOOK NOW </button></a>
                    </div>');
                } 
            ?>
            </div>
            <!-- have a brief introduction of four room types provided by the hotel, containing both image and the room name of certain type-->
            <div class = "roomtype">
                <p>Four Room Types Provided By Our Hotel</p>
                <div class = "room-img"> 
                    <img src = "largeDouble.jpeg">
                    <p class = "roomname">Large Double Bedroom</p>
                </div>
                <div class = "room-img"> 
                    <img src = "largeSingle.jpeg">
                    <p class = roomname>Large Single Bedroom</p>
                </div>
                <div class = "room-img"> 
                    <img src = "smallSingle.jpeg">
                    <p class = "roomname">Small Single Bedroom</p>
                </div>
                <div class = "room-img"> 
                    <img src = "vip.jpeg">
                    <p class = roomname>VIP Bedroom</p>
                </div>
            </div>
        </div>
    </body>
</html>