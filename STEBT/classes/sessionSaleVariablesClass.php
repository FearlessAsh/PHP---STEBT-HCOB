<?php

//session information
        //test to make sure all your stuff is here
                if (isset($_SESSION['userName'])) {$userName = $_SESSION['userName'];}
                if (isset($_SESSION['lastName'])) {$lastName = $_SESSION['lastName'];}
                else {print("<p>There was a problem reaching your user type</p><br><script>window.location='logOut.php';</script>");}
                if (isset($_SESSION['firstName'])) { $firstName = $_SESSION['firstName'];}
                else {print("<p>There was a problem reaching your first name</p><br><script>window.location='logOut.php';</script>");}
                if (isset($_SESSION['userType'])) {$userType = $_SESSION['userType'];}
                else {$userType = "N";}
                if (isset($_SESSION['itemName'])) { $_SESSION['itemName'] = "";}
                else {$_SESSION['itemName'] = "";}
                //print your variables so we know what we're working with
                print("<h1>"."Hello " . $firstName . " " . $lastName . ". <br></h1>");
                
                ?>

