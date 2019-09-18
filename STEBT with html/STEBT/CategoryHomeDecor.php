<?php  session_start(); ?>
<html>
    <head>
        <title>Home Decor</title>
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
        <link href="HTML/styles/style3.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
    </head>
<body>
<?php

        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/tableClass.php");
        require_once("classes/outsideSessionVariables.php");
        require_once("includes/STEBTsmartHeader.php");
        
        //print the start of the acordion div
        print("<div class='accordion vertical'>"); 

        //print a Home Decor category
        $printHomeDecor = printCategory("Home Decor", $userType, $verification);
        print("</div>");
         if($printHomeDecor != ""){
             if($userName !== ""){
            $_SESSION['itemName'] = $printHomeDecor;
           print("<script>window.location='itemSale.php';</script>");}
            else{print("<script>window.location='loginForm.php';</script>"); }}

         //give the user some links so they can go forth and do stuff  
        if($userName !== ""){require_once("includes/basicFooter.html"); 
        } else {require_once("includes/STEBTfooter.html"); } 
            ?>
    </body>
</html>