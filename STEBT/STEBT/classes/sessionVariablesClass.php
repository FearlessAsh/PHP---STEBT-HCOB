<?php

        //session information
        //test to make sure all your stuff is here
        if (isset($_SESSION['userName'])) {$userName = $_SESSION['userName'];}
        else {print("<p>There was a problem reaching your user name</p><br><script>window.location='logOut.php';</script>");}
        if (isset($_SESSION['userType'])) {$userType = $_SESSION['userType'];}
        else {print("<p>There was a problem reaching your user type</p><br><script>window.location='logOut.php';</script>");}
        if (isset($_SESSION['firstName'])) { $firstName = $_SESSION['firstName'];}
        else {print("<p>There was a problem reaching your first name</p><br><script>window.location='logOut.php';</script>");}
         if (isset($_SESSION['lastName'])) { $lastName = $_SESSION['lastName'];}
        else {print("<p>There was a problem reaching your last name</p><br><script>window.location='logOut.php';</script>");}
         if (isset($_SESSION['itemName'])) { $itemName = $_SESSION['itemName'];}
        else {$_SESSION['itemName'] = ""; }
        if (isset($_SESSION['feeID'])) { $feeID = $_SESSION['feeID'];}
        else {$_SESSION['feeID'] = ""; }
        
        //print your variables so we know what we're working with
        print("<h1>"."Hello " . $firstName . " ". $lastName . "<br>" . "</h1>");
        //print("<h2>" . $itemName . "</h2>");
?>

