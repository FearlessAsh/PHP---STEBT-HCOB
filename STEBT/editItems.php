<?php  session_start(); ?>
<html>
    <head>
        <title>Edit Item</title>
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
    </head>
<body>
<?php
        
        //initialize your variables
        $userName = "";
        $userType = "";
        $firstName = "";
        $lastName = "";
        $itemName = "";
        
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/StickyFormClass.php");
        require_once("classes/LoginClass.php");
        require_once("classes/tableClass.php");
        require_once("classes/redisplayFormClass.php");
        require_once("classes/sessionVariablesClass.php");
        
        $itemID = $itemName;
        $_SESSION['statusMessage'] = NULL;
        
                if (isset($_POST['deletesubmit'])) { 
                    $deleteItem = deleteItem($itemID);
                    $_SESSION['statusMessage'] = $deleteItem;
                    print("<script>window.location='viewItemInvoices.php';</script>");
                }
        
		//if the user hit the submit button
		if (isset($_POST['submit'])) { 
                    
                //reset the error count to 0
		$errorCount = 0;
                
                //validate your inputs
                
                $itemName = validateName($_POST['itemName'], "Item Name", 20);
                $category = validateComboBox($_POST['category'], "Category");
                $description = validateInput($_POST['description'], "Description", 100);
		$picture = validatePicture($_POST['picture']);
		$price = validatePrice($_POST['price'], "Price", 8);
                
                //if the user is a student, or not
                if($userType == "S") {
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

                                if ($userType == "S"){
                                //create a redisplay form to hold good information and throw out bad data
                                $student = changeItemFormStudent($itemName, $category, $description, $picture, $price, $service, $item );
                                } else {
                                //create a redisplay form to hold good information and throw out bad data
                                $nonStudent = changeItemForm($itemName, $category, $description, $picture, $price, $service, $item );}

                        //give the user some links so they can go forth and do stuff  
                        require_once("includes/basicFooter.html");  
			} else {                            
                                //SAVE TO DATABASE HERE
                                $editItem = updateItem($itemName, $category, $status, $description, $picture, $price, $itemID);
                                 //give the user some links so they can go forth and do stuff  
                                require_once("includes/basicFooter.html");  }
                } else {
                
                //pull the neccesary data from the database
                $editItems = queryListItem($itemID);
                //initialize the items
		$UserNameSession = "";
                $itemName= $editItems['ItemName'];
                $category = "";
		$description = $editItems['Description'];
		$picture = $editItems['Picture'];
                $price = $editItems['Price'];
                $itemStatus = $editItems['ItemType'];
                //empty out our radio buttons
                $item = "unchecked";
                $service = "unchecked";
                $status = "";
                
                        if ($userType == "S"){
                        //create a redisplay form to hold good information and throw out bad data
                        $student = changeItemFormStudent($itemName, $category, $description, $picture, $price, $service, $item );
                        } else {
                        //create a redisplay form to hold good information and throw out bad data
                        $nonStudent = changeItemForm($itemName, $category, $description, $picture, $price, $service, $item ); }
                
                 //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
		}
 
            ?>
    </body>
</html>
















