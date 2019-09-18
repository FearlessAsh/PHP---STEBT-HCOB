<?php  session_start(); ?>
<html>
    <head>
        <title>All Services</title>
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
        require_once("classes/sessionSaleVariablesClass.php");
        require_once("classes/StickyFormClass.php");
        require_once("classes/LoginClass.php");
        require_once("classes/tableClass.php");
        require_once("includes/STEBTsmartHeader.php");
        
        
            //print the start of the acordion div
            print("<div class='accordion vertical'>"); 
            
            //print a computers category
            $printServices = printServices($userType, $verification);
            
            if($printServices != ""){
                if($_SESSION['userName'] !== ""){
                $_SESSION['itemName'] = $printComputers;
                print("<script>window.location='itemSale.php';</script>");}
                else{"<script>window.location='loginForm.php';</script>"; }}
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");   
            ?>
    </body>
</html>