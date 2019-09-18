<!--
    //give buy now button that pushes to sale page
        //(enter credentails and email invoice / push to paypal)
//immediatly write S to sales status in database
//nothing gets saved unless item is bought.


BROKEN PAGE, NOT IN USE
-->

<?php  session_start(); ?>
<html>
    <head>
        <title>Product Sales</title>
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
    </head>
<body>
<?php

        //initialize your variables
        $userName = "";
        $userType = "";
        $firstName = "";
        $lastName = "";
        $itemName = "";
        
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/StickyFormClass.php");
        require_once("classes/LoginClass.php");
        require_once("classes/tableClass.php");
        require_once("classes/sessionVariablesClass.php");
        
        if (isset($_POST['submit'])) { 
            
            Print("Are you sure you want to buy this item?");
            //enter confirmation stuff here
            //followed by email invoice
            //and paypal stuff
        }
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
            ?>
    </body>
</html>
















