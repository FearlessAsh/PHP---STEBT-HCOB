<?php  session_start(); ?>
<html>
    <head>
        <title>View Invoices</title>
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
        
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/StickyFormClass.php");
        require_once("classes/LoginClass.php");
        require_once("classes/tableClass.php");
        require_once("classes/sessionSaleVariablesClass.php");
        require_once("includes/STEBTsmartHeader.php");
        
        if (isset($_SESSION['statusMessage'])) {print($_SESSION['statusMessage']); $_SESSION['statusMessage'] = NULL;}


            //print an invoice listing
            $invoice = viewPurchasedInvoices($userName);
            
            if($userType == "S" AND $verification == 'V') {
            //print a fee listing
            $fee = viewFeesOwed($userName);
            
            //end the accordion div
            
            if($fee != "") {
                $_SESSION['feeID'] = $fee;
                print("<script>window.location='feePayment.php';</script>");}
            } else {//print("</div>");
            
            }
            
            
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
            ?>
    </body>
</html>