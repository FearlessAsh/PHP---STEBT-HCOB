<?php  session_start(); ?>
<html>
    <head>
        <title>View Sales Items</title>
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
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
            $printComputers = printCategory("Computers", $userType, $verification);
            if($printComputers != ""){
                if($_SESSION['userName'] !== ""){
                $_SESSION['itemName'] = $printComputers;
                print("<script>window.location='itemSale.php';</script>");}
                else{"<script>window.location='loginForm.php';</script>"; }}
                
                
            //print a Clothing category
            $printClothing = printCategory("Clothing", $userType, $verification);
             if($printClothing != ""){
                 if($_SESSION['userName'] !== ""){
                $_SESSION['itemName'] = $printClothing;
               print("<script>window.location='itemSale.php';</script>");}
               else{"<script>window.location='loginForm.php';</script>"; }}
               
            //print a Electronics category
            $printElectronics = printCategory("Electronics", $userType, $verification);
             if($printElectronics != ""){
                $_SESSION['itemName'] = $printElectronics;
                print("<script>window.location='itemSale.php';</script>");}
                
            //print a Books category
            $printBooks = printCategory("Books", $userType, $verification);
             if($printBooks != ""){
                $_SESSION['itemName'] = $printBooks;
                print("<script>window.location='itemSale.php';</script>");}
                
            //print a Home Decor category
            $printHomeDecor = printCategory("Home Decor", $userType, $verification);
             if($printHomeDecor != ""){
                $_SESSION['itemName'] = $printHomeDecor;
               print("<script>window.location='itemSale.php';</script>");}
               
            //print a Miscellaneous category
            $printMiscellaneous = printCategory("Miscellaneous", $userType, $verification);
             if($printMiscellaneous != ""){
                $_SESSION['itemName'] = $printMiscellaneous;
                print("<script>window.location='itemSale.php';</script>");}
                
            //end the accordion div
            print("</div>");
            
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
            ?>
    </body>
</html>