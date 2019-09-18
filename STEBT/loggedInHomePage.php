<?php  session_start(); ?>
<html>
	<head>
		<title>Home Page</title>
		<script language="JavaScript" type="text/JavaScript" src="login.js"></script>
		<link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
                <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
                <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
	</head>
	<body>
	<?php
        
                //initialize your variables
                $userName = "";
                $userType = "";
                $firstName = "";
                
		//load the neccesary data
		require_once("config/db.php");
		require_once("classes/StickyFormClass.php");
		require_once("classes/LoginClass.php");
                require_once("classes/tableClass.php");
                require_once("classes/sessionSaleVariablesClass.php");
                require_once("searchBar.php");
                
                
                $top5 = topItems($userType);
                if($top5 != ""){
                if($userName !== ""){
                $_SESSION['itemName'] = $top5;
                print("<script>window.location='itemSale.php';</script>");}
                else{"<script>window.location='loginForm.php';</script>"; }}
                
                require_once("includes/categoryListing.html");
                //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");             
             ?>
	</body>
</html>