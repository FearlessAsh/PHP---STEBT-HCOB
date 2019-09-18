<?php  session_start(); ?>
<html>
    <head>
        <title>Clothing</title>
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
    </head>
<body>
<?php
        
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/tableClass.php");
        require_once("classes/outsideSessionVariables.php");
        if($userName !== ""){require_once("searchBar.php");}
        
        //print the start of the acordion div
        print("<div class='accordion vertical'>"); 
            
        //print a Clothing category
        $printClothing = printCategory("Clothing", $userType);
        print("</div>");
        //code for buying ability
         if($printClothing != ""){
            if($userName !== ""){
            $_SESSION['itemName'] = $printClothing;
           print("<script>window.location='itemSale.php';</script>");}
           else{print("<script>window.location='loginForm.php';</script>"); }}

         //give the user some links so they can go forth and do stuff  
        require_once("includes/categoryListing.html");
        if($userName !== ""){require_once("includes/basicFooter.html"); 
        } else {print("<center><a href = 'loginForm.php'>Login Page</a></center>"); } 
            ?>
    </body>
</html>