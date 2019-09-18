<?php  session_start(); $UserTypeSession = $_SESSION['userType'];?>
<html>
	<head>
		<title>Create an Item or Service</title>
		<script language="JavaScript" type="text/JavaScript" src="login.js"></script>
		<link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
                <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
	</head>
	<body>
	<?php
		//load the neccesary data
		require_once("config/db.php");
		require_once("classes/StickyFormClass.php");
		require_once("classes/LoginClass.php");
                require_once("classes/redisplayFormClass.php");
                
		
		//if the user hit the submit button
		if (isset($_POST['submit'])) { 
                    
                //reset the error count to 0
		$errorCount = 0;
                
                //pull variables
                $UserNameSession = $_SESSION['userName'];
                $itemName = validateName($_POST['itemName'], "Item Name", 20);
                $category = validateComboBox($_POST['category'], "Category");
                $description = validateInput($_POST['description'], "Description", 100);
		$picture = validatePicture($_POST['picture']);
		$price = validatePrice($_POST['price'], "Price", 8);
                
                
                if($UserTypeSession == "S") {
                //the number 10 is just a placeholder
                @$itemStatus = validateInput($_POST['itemStatus'], "Item Status", 10);
                } else {$itemStatus = 'Item';}
                
                
                //validation for Status variable
                //checks and unchecks the radio buttons, as well as saving the status token for the database
                    if($itemStatus == 'Item') {$item = 'checked' ; $status = 'I'; $service = 'unchecked'; }
                    if($itemStatus == 'Service') {$service = 'checked'; $status = 'S'; $item = 'unchecked'; }
                    //default case
                    if(empty($itemStatus)) {$service = 'unchecked'; $item = 'unchecked'; $status = 'I';}
                    
                    
                        //if there was an error somewhere in this process
			if ($errorCount > 0) {
                            //print an error message and redisplay the form
				print("<p>Please re-enter the information below.</p><br>");
                                
                                if ($UserTypeSession == "S"){
                                        $studentCreate = createItemFormStudent($itemName, $category, $description, $picture, $price, $service, $item );
                                } else {
                                        $create = createItemForm($itemName, $category, $description, $picture, $price, $service, $item ); }
                                
                                //give the user some links so they can go forth and do stuff  
                                require_once("includes/basicFooter.html");  
                                
			} else {   
                            
                                //print("$UserNameSession, $itemName, $category, $status, $description, $picture, $price");
                                //SAVE TO DATABASE HERE
                                $newItem = saveItem($UserNameSession, $itemName, $category, $status, $description, $picture, $price);
                                
                                 //give the user some links so they can go forth and do stuff  
                                require_once("includes/basicFooter.html");  }
                } else {
                //initialize the items for the first time
		$UserNameSession = "";
                $itemName= "";
                $category = "";
		$description = "";
		$picture = "";
                $price = "";
                $itemStatus = "";
                //empty out our radio buttons
                $item = "unchecked";
                $service = "unchecked";
                $status = "";
		//display the form for the first time
                            if ($UserTypeSession == "S"){
                                $studentCreate = createItemFormStudent($itemName, $category, $description, $picture, $price, $service, $item );
                            } else {
                                $create = createItemForm($itemName, $category, $description, $picture, $price, $service, $item ); }
                
                 //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html"); 
                
		}
		?>
	</body>
</html>
