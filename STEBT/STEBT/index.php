<!DOCTYPE html>
<!--
Just the main page that links to the login page. Eventually this will become
the main website page that links to other portions of the website. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        	<script language="JavaScript" type="text/JavaScript" src="login.js"></script>
		<link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
                <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
                <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
        <title>Home Page</title>
    </head>
    <body>
        <?php
        
        require_once("config/db.php");
        require_once("classes/tableClass.php");
        require_once("classes/outsideSessionVariables.php");
        
        $top5 = topItems($userType);
        if($top5 != ""){
        if($userName !== ""){
        $_SESSION['itemName'] = $top5;
        print("<script>window.location='itemSale.php';</script>");}
        else{print("<script>window.location='loginForm.php';</script>"); }}

       print("<center><a href = 'loginForm.php'>Login Page</a></center>");
       
       require_once("includes/categoryListing.html");
       
        ?>
    </body>
</html>
