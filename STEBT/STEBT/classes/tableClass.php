<?php

    //this will print into an acordion style table
    //with the category title being the heading and the table contents
    //in the middle


/*
 * this function takes a category and a user type as arguments
 *      then it makes a connection to the database using db.php
 *      afterwards, it tests to see whether the user is a student or not
 *      this is where the results become sorted by whether you see items or items and services
 *      the if statements sort out which sql statement you will get, which affects your results
 *      then, we create two sql variables to populate the category and the table itself.
 * 
 *      if the item retrieval doesnot equal false, meaning the query was successful
 *      then start the accordion style table, print the category
 *      then if the sql query returned any rows at all, meaning there are items,
 *      begin the table, begin the table headers, 
 *      while there are still results in the query (saved to an associative array)
 *      save the picture field to a variable for ease in output,
 *      then print the rest of the results in their own table section, in the same table row
 *      once everything is printed in that row, end the row and start over if neccesary
 *      then once its all printed, end the table.
 * 
 *      if the item retrieval does not return any rows, meaning that category is empty,
 *      then print that there are no results for the user
 *      
 *      end the section for the accordion style, then end the function
 *      (unless there was a database error, in which case print an error message)
 */
function printCategory($category, $userType, $verification) {
    $itemPage = "";
	$db_connection = Connect();
        if($userType == 'S' AND $verification == 'V'){$SQL = "SELECT ItemID, ItemName, Category, ItemType, Description, Picture, Price FROM SalesItems WHERE Category = '$category' AND SaleStatus = 'N'";}
        else{$SQL = "SELECT ItemID, ItemName, Category, Description, Picture, Price FROM SalesItems WHERE Category = '$category' AND ItemType = 'I' AND SaleStatus = 'N'";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) { 
    print("<section id='$category'><h2><a href='#$category'>$category</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
        if($userType == 'S' AND $verification == 'V') {
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>Buy Now</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                    if($Row['ItemType'] == "S" ){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td>");
                    ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>'
						>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                    
                } print("</table>");  
        }else{
            print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th><th>Buy Now</th></tr>");
                while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                        $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                        print( "<tr><td>{$Row['ItemName']}</td>");
                        print("<td>{$Row['Description']}</td>");
                        print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                        print("<td>{$Row['Price']}</td>");
  ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                    
                    } print("</table>");  
        }} else { print("<p>Sorry, there are no results for this category</p>"); $itemPage = "";}
    print("</section>");      
       } else { print("database connection ERROR"); }
       return($itemPage);
}

function itemPage($tableRow){
    ?> 
                   <td>
    <form name="viewItemPage" id="viewItemPage" 
          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
          method = "POST">
        <input type="submit" name="submit" 
        value='Buy Now'
        onClick="Login(this.form);" 
        onMouseOver="this.style.color = '#404040';" 
        onMouseOut="this.style.color = '#000000';" 
        onFocus ="this.style.color = '#404040';" 
        onBlur="this.style.color = '#000000';">
    </form>
                   </td>
    <?php
    if (isset($_POST['submit'])) { 
        $return = $tableRow;
        return($return);
    }
    else{
        $return = "";
        return($return);}
}

function searchBar($data, $userType, $verification){
    $itemPage = "";
    $db_connection = Connect();
        if($userType == 'S' AND $verification == 'V'){$SQL = "SELECT ItemID, ItemName, Category, ItemType, Description, ListDate, Picture, Price FROM SalesItems WHERE ItemName LIKE '%$data%' AND SaleStatus = 'N' ";}
        else{$SQL = "SELECT ItemID, ItemName, Category, Description, ListDate, Picture, Price FROM SalesItems WHERE ItemName LIKE '%$data%' AND ItemType = 'I' AND SaleStatus = 'N' ";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) {
    print("<div class='accordion vertical'>");       
    print("<section id='Results'><h2><a href='#Results'>Results</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
        if($userType == 'S' AND $verification == 'V') {
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>More Info</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                    if($Row['ItemType'] == "S"){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td>");
                                                                 ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                } print("</table>");  
        }else{
            print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th><th>More Info</th></tr>");
                while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                        $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                        print( "<tr><td>{$Row['ItemName']}</td>");
                        print("<td>{$Row['Description']}</td>");
                       // print("<td>{$Row['ListDate']}</td>");
                        print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                        print("<td>{$Row['Price']}</td>");
                                                                    ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                    } print("</table>");  
        }} else { print("<p>Sorry, there are no results for this category</p>");}
    print("</section></div>");      
       } else { print("database connection ERROR"); $itemPage = ""; } 
return($itemPage);
}

function topItems($userType, $verification){
    $itemPage = "";
    $db_connection = Connect();
        if($userType == 'S' AND $verification == 'V'){$SQL = "SELECT TOP 5 ItemID, ItemName, Category, ItemType, Description, ListDate, Picture, Price FROM SalesItems WHERE SaleStatus = 'N' ORDER BY ListDate ASC";}
        else{$SQL = "SELECT TOP 5 ItemID, ItemName, Category, Description, ListDate, Picture, Price FROM SalesItems WHERE ItemType = 'I' AND SaleStatus = 'N' ORDER BY ListDate ASC";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) {
    print("<div class='accordion vertical'>");       
    print("<section id='TopItems'><h2><a href='#TopItems'>Top Items</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
        if($userType == 'S' AND $verification == 'V') {
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>Button</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) :
                    if($Row['ItemType'] == "S"){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td>");
                                                                ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                endwhile; print("</table>");  
        }else{
            print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th><th>Button</th></tr>");
                while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) :
                        $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                        print( "<tr><td>{$Row['ItemName']}</td>");
                        print("<td>{$Row['Description']}</td>");
                       // print("<td>{$Row['ListDate']}</td>");
                        print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                        print("<td>{$Row['Price']}</td>");
                                                                    ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                    endwhile; print("</table>");  
        }} else { print("<p>Sorry, there are no results for this category</p>");}
    print("</section></div>");      
       } else { print("database connection ERROR"); $itemPage = "";} 
       return($itemPage);
}

function buyNow($itemName, $userType, $verification) {
    $db_connection = Connect();
    $return = "";
    if($userType == 'S' AND $verification == 'V') {$SQL = "SELECT ItemID, ItemName, ItemType, Description, Picture, Price FROM SalesItems WHERE ItemID = '$itemName' AND SaleStatus = 'N'";}
    else{$SQL = "SELECT ItemID, ItemName, Description, Picture, Price FROM SalesItems WHERE ItemID = '$itemName' AND SaleStatus = 'N'";}
    $salesQuery = sqlsrv_Query($db_connection, $SQL);
    $printRow =  sqlsrv_Query($db_connection, $SQL);
    if($salesQuery !== FALSE) {
        print("<div class='accordion vertical'>");       
        print("<section id='YourItem'><h2><a href='#YourItem'>Your Item</a></h2>");
    if(($test = sqlsrv_fetch_array($salesQuery, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
            if($userType == 'S') {print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>Purchase</th></tr>");}
            if($userType == 'N') {print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th><th>Purchase</th></tr>");}
            while (($Row = sqlsrv_fetch_array($printRow, SQLSRV_FETCH_ASSOC))) :
                    $picture = $Row['Picture']; $itemName = $Row['ItemID']; $return = $Row['Price'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    if($userType == 'S' AND $verification == 'V') {print("<td>{$Row['ItemType']}</td>");}
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>$return</td>");
                    ?> <td><form name="buyItemForm" id="buyItemForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
                        <input type="submit" name="submit" 
                                value="Buy Now" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                        </form></td></tr>
                    <?php
                    endwhile; print("</table></div>");  
                    }
                    }else { print("database connection ERROR"); $return = "";}
                    return($return);
                    }
                    
                    
function viewPurchasedInvoices($userName) {
    $db_connection = Connect();
    $SQL = "SELECT RecieptNo, ItemName, SalesTax, PaymentRecieved, PaymentDue FROM PurchasedItems_View WHERE UserName = '$userName' ORDER BY SaleDate ASC ";
    $salesQuery = sqlsrv_Query($db_connection, $SQL);
    $printRow =  sqlsrv_Query($db_connection, $SQL);
    if($salesQuery !== FALSE) {
        print("<div class='accordion vertical'>");       
        print("<section id='Invoice'><h2><a href='#Invoice'>Invoice</a></h2>");
    if(($test = sqlsrv_fetch_array($salesQuery, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
            print("<tr><th>Reciept</th><th>Item</th><th>Sales Tax</th><th>Payment Recieved</th><th>Payment Due</th></tr>");
            while (($Row = sqlsrv_fetch_array($printRow, SQLSRV_FETCH_ASSOC))) :
                    print( "<tr><td>#{$Row['RecieptNo']}</td>");
                    print("<td>{$Row['ItemName']}</td>");
                    print("<td>$ {$Row['SalesTax']}</td>");
                    print("<td>$ {$Row['PaymentRecieved']}</td>");   
                    print("<td>$ {$Row['PaymentDue']}</td></tr>");                                  
                    endwhile; print("</table>");  
    } else { print("<p>Sorry, there are no results for this category</p>");}
                    
    print("</div>");
    }else { print("database connection ERROR");}
}

function viewSoldInvoices($userName){
    //things that you've sold that other people have bought
}

function viewFeesOwed($userName){
    $payFee = "";
    $db_connection = Connect();
    $SQL = "SELECT FeeID, BillingPeriod, FeePayment, FeeOwed  FROM Fee WHERE UserName = '$userName' ORDER BY FeePaymentDate ASC ";
    $salesQuery = sqlsrv_Query($db_connection, $SQL);
    $printRow =  sqlsrv_Query($db_connection, $SQL);
    if($salesQuery !== FALSE) {
        print("<div class='accordion vertical'>");       
        print("<section id='Fees'><h2><a href='#Fees'>Fees</a></h2>");
    if(($test = sqlsrv_fetch_array($salesQuery, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
            print("<tr><th>FeeID</th><th>Billing Period</th><th>Fee Payment</th><th>Fee Owed</th><th>Pay Fee</th></tr>");
            while (($Row = sqlsrv_fetch_array($printRow, SQLSRV_FETCH_ASSOC))) :
                    $feeID = $Row['FeeID'];
                    print( "<tr><td>#{$Row['FeeID']}</td>");
                    print("<td>{$Row['BillingPeriod']}</td>");
                    print("<td>$ {$Row['FeePayment']}</td>");
                    print("<td>$ {$Row['FeeOwed']}</td>"); 
                    ?>
                                    <td>
                    <form name="<?php $feeID ?>" id="<?php $feeID ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="payfees" 
                        value='<?php print($feeID); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['payfees'])) {
                         $payFee = $_POST['payfees'];
                    }                 
                    print("</tr>");
                    endwhile; print("</table>");  
    } else { print("<p>Sorry, there are no results for this category</p>");}
                    
    print("</div>");
    }else { print("database connection ERROR"); $payFee = "";}
    Return($payFee);
}

function payFeesOwed($FeeID) { 
    $db_connection = Connect();
    $SQL = "SELECT FeeID, BillingPeriod, FeePayment, FeeOwed  FROM Fee WHERE FeeID = '$FeeID'";
    $salesQuery = sqlsrv_Query($db_connection, $SQL);
    $printRow =  sqlsrv_Query($db_connection, $SQL);
    if($salesQuery !== FALSE) {
        print("<div class='accordion vertical'>");       
        print("<section id='YourFee'><h2><a href='#YourFee'>Your Fee</a></h2>");
    if(($test = sqlsrv_fetch_array($salesQuery, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
            print("<tr><th>FeeID</th><th>Billing Period</th><th>Fee Payment</th><th>Fee Owed</th><th>Pay Fee</th></tr>");
            while (($Row = sqlsrv_fetch_array($printRow, SQLSRV_FETCH_ASSOC))) :
                    print( "<tr><td>#{$Row['FeeID']}</td>");
                    print("<td>{$Row['BillingPeriod']}</td>");
                    print("<td>$ {$Row['FeePayment']}</td>");
                    print("<td>$ {$Row['FeeOwed']}</td>"); 
                    ?><td>
                    <form name="payFee" id="payFee" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="submit" 
                        value='Pay Fee'
                        onClick="Login(this.form);" 
                        onMouseOver="this.style.color = '#404040';" 
                        onMouseOut="this.style.color = '#000000';" 
                        onFocus ="this.style.color = '#404040';" 
                        onBlur="this.style.color = '#000000';">
                    </form></td>
                    <?php
                    print("</tr>");
                    endwhile; print("</table></div>");  
    }
                    }else { print("database connection ERROR");}
                    }

function viewEditItems($category, $userType, $userName, $verification) {
    $itemPage = "";
	$db_connection = Connect();
        if($userType == 'S' AND $verification == 'V'){$SQL = "SELECT ItemID, ItemName, Category, ItemType, Description, Picture, Price FROM SalesItems WHERE Category = '$category' AND SaleStatus = 'N' AND UserName = '$userName'";}
        else {$SQL = "SELECT ItemID, ItemName, Category, Description, Picture, Price FROM SalesItems WHERE Category = '$category' AND ItemType = 'I' AND SaleStatus = 'N' AND UserName = '$userName'";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) { 
    print("<section id='$category'><h2><a href='#$category'>$category</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
        if($userType == 'S' AND $verification == 'V') {
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>More Info</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                    if($Row['ItemType'] == "S"){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td>");
                    ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="edititems" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['edititems'])) {
                         $itemPage = $_POST['edititems'];
                    }                 
                    print("</tr>");
                    
                } print("</table>");  
        }else{
            print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th><th>More Info</th></tr>");
                while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                        $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                        print( "<tr><td>{$Row['ItemName']}</td>");
                        print("<td>{$Row['Description']}</td>");
                        print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                        print("<td>{$Row['Price']}</td>");
  ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="edititems" 
                        value='<?php print($itemName); ?>'>
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['edititems'])) {
                         $itemPage = $_POST['edititems'];
                    }                 
                    print("</tr>");
                    
                    } print("</table>");  
        }} else { print("<p>Sorry, there are no results for this category</p>"); $itemPage = "";}
    print("</section>");      
       } else { print("database connection ERROR"); }
       return($itemPage);
}




function printServices($userType, $verification) {
    $itemPage = "";
	$db_connection = Connect();
        if($userType == 'S' AND $verification == 'V'){$SQL = "SELECT ItemID, ItemName, Category, ItemType, Description, Picture, Price FROM SalesItems WHERE ItemType = 'S' AND SaleStatus = 'N'";}
        else{$SQL = "";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) { 
    print("<section id='Services'><h2><a href='#Services'>All Services</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table id=hor-minimalist-b>");  
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>More Info</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                    if($Row['ItemType'] == "S" ){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture']; $itemName = $Row['ItemID'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td>");
                    ?>
                                    <td>
                    <form name="<?php $itemName ?>" id="<?php $itemName ?>" 
                          action="<?php $_SERVER["SCRIPT_NAME"] ?>"
                          method = "POST">
                        <input type="submit" name="buynow" 
                        value='<?php print($itemName); ?>' >
                    </form>
                                   </td>
                    <?php
                      if (isset($_POST['buynow'])) {
                         $itemPage = $_POST['buynow'];
                    }                 
                    print("</tr>");
                    
                } print("</table>");  
        } else { print("<p>Sorry, there are no results for this category</p>"); $itemPage = "";}
        print("</section>");      
       } else { print("database connection ERROR"); }
       return($itemPage);
}


?>

