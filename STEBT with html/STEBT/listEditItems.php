<?php  session_start(); ?>
<html>
    <head>
        <title>Edit Items List</title>
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

            //print the start of the acordion div
            print("<div class='accordion vertical'>"); 
            
            
            //print a computers category
            $editComputers = viewEditItems("Computers", $userType, $userName, $verification);
            if($editComputers != ""){
                $_SESSION['itemName'] = $editComputers;
                print("<script>window.location='editItems.php';</script>");}
                
            //print a Clothing category
            $editClothing = viewEditItems("Clothing", $userType, $userName, $verification);
             if($editClothing != ""){
                $_SESSION['itemName'] = $editClothing;
               print("<script>window.location='editItems.php';</script>");}
               
            //print a Electronics category
            $editElectronics = viewEditItems("Electronics", $userType, $userName, $verification);
             if($editElectronics != ""){
                $_SESSION['itemName'] = $editElectronics;
                print("<script>window.location='editItems.php';</script>");}
                
            //print a Books category
            $editBooks = viewEditItems("Books", $userType, $userName, $verification);
             if($editBooks != ""){
                $_SESSION['itemName'] = $editBooks;
                print("<script>window.location='editItems.php';</script>");}
                
            //print a Home Decor category
            $editHomeDecor = viewEditItems("Home Decor", $userType, $userName, $verification);
             if($editHomeDecor != ""){
                $_SESSION['itemName'] = $editHomeDecor;
               print("<script>window.location='editItems.php';</script>");}
               
            //print a Miscellaneous category
            $editMiscellaneous = viewEditItems("Miscellaneous", $userType, $userName, $verification);
             if($editMiscellaneous != ""){
                $_SESSION['itemName'] = $editMiscellaneous;
                print("<script>window.location='editItems.php';</script>");}
                
            //end the accordion div
            print("</div>");
            
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
            ?>
    </body>
</html>