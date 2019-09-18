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
                <link rel ="stylesheet" type="text/css" href="HTML/styles/style3.css" />
        <title>Home Page</title>
    </head>
    <body>
        <?php
        
        require_once("config/db.php");
        require_once("classes/tableClass.php");
        require_once("classes/outsideSessionVariables.php");
        require_once("includes/STEBTsmartHeader.php");
   
        //print("<h2>Top 5 Sales</h2>");
        $top5 = topItems($userType, $verification);
        if($top5 != ""){
        if($userName !== ""){
        $_SESSION['itemName'] = $top5;
        print("<script>window.location='itemSale.php';</script>");}
        else{print("<script>window.location='loginForm.php';</script>"); }}

       require_once("includes/STEBTfooter.html");
       
       
       
        ?>
    </body>
</html>
