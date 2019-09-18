<?php  session_start(); ?>
<html>
    <head>
        <title>Product Details</title>
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
        $_SESSION['statusMessage'] = NULL;
        
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/StickyFormClass.php");
        require_once("classes/LoginClass.php");
        require_once("classes/tableClass.php");
        require_once("classes/sessionVariablesClass.php");
        
        //purchase item
        $itemSale = buyNow($itemName, $userType);
        if (isset($_POST['submit'])) {
            
            
            //save item to invoice database
            $createInvoice = queryItem($itemName, $userName, $userType);
            $_SESSION['statusMessage'] = $createInvoice;
            
            if($userType == "S"){
                $fee = $itemSale * 0.20; 
                //print("ItemFee: " . $fee);
                //$fee .= ".00";
                $billingPeriod = "Jun2014";
                $newFee = addFee($userName, $billingPeriod, $fee );
                
                $_SESSION['statusMessage'] .= " " . $newFee;
            }           
           // Print("Are you sure you want to buy this item?");
            //enter confirmation stuff here
            //followed by email invoice
            //and paypal stuff
            if ($createInvoice !== "") {print("<script>window.location='viewItemInvoices.php';</script>");
            
            }
            
            
            
            //pull item information from session.
            //if blank say please choose an item.

            //if not blank then display item information
                //query database against item id
                //give buy now button that pushes to sale page
                    //(enter credentails and email invoice / push to paypal)
            //immediatly write S to sales status in database
            //nothing gets saved unless item is bought.
            
            
        }
        
            
             //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html");  
            ?>
    </body>
</html>
















