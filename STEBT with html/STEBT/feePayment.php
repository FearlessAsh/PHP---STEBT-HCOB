<?php  session_start(); ?>
<html>
    <head>
        <title>Fee Payment</title>
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
        <link href="HTML/styles/style3.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
    </head>
<body>
<?php
        //initialize your variables
        $userName = "";
        $userType = "";
        $firstName = "";
        $lastName = "";
        $feeID = "";
        
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/StickyFormClass.php");
        require_once("classes/LoginClass.php");
        require_once("classes/tableClass.php");
        require_once("classes/sessionVariablesClass.php");
        require_once("includes/STEBTsmartHeader.php");
        
        //purchase item
        $feePayment = payFeesOwed($feeID);
        
        if (isset($_POST['submit'])) { 
            //save item to invoice database
            $createPayment = updateFees($feeID, $userName);
           // Print("Are you sure you want to buy this item?");
            //enter confirmation stuff here
            //followed by email invoice
            //and paypal stuff
           print("<script>window.location='viewItemInvoices.php';</script>");
            
            
            //pull item information from session.
            //if blank say please choose an item.

            //if not blank then display item information
                //query database against item id
                //give buy now button that pushes to sale page
                    //(enter credentails and email invoice / push to paypal)
            //immediatly write S to sales status in database
            //nothing gets saved unless item is bought.
            
            
        }
        
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
            ?>
    </body>
</html>
















