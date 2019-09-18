 <?php
/*this function takes a username and password as an argument
 *      it then makes a connection to the database using db.php
 *      then it saves the sha1(encripted) password to a variable
 *      then the sql string is also saved to a variable
 *      then the variable login check performes the query
 *      then, the query is tested to make sure it was performed, and then saved into results the program can manipulate
 *      if there are not 0 rows returned in the query, the user is logged in
 *      otherwise, they are not logged in and prompted to try again
 *      if there was not query results, then there was a database connection error. the information is returned
 */
function searchBar($data, $userType){
    $db_connection = Connect();
        if($userType == 'S'){$SQL = "SELECT ItemName, Category, ItemType, Description, ListDate, Picture, Price FROM SalesItems WHERE ItemName LIKE '%$data%'";}
        if($userType == 'N'){$SQL = "SELECT ItemName, Category, Description, ListDate, Picture, Price FROM SalesItems WHERE ItemName LIKE '%$data%' AND ItemType = 'I'";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) {
    print("<div class='accordion vertical'>");       
    print("<section id='Results'><h2><a href='#Results'>Results</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table width='100%' border='1'>");  
        if($userType == 'S') {
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                    if($Row['ItemType'] == "S"){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td></tr>");
                } print("</table>");  
        }else{
            print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th></tr>");
                while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) {
                        $picture = $Row['Picture'];
                        print( "<tr><td>{$Row['ItemName']}</td>");
                        print("<td>{$Row['Description']}</td>");
                       // print("<td>{$Row['ListDate']}</td>");
                        print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                        print("<td>{$Row['Price']}</td></tr>");
                    } print("</table>");  
        }} else { print("<p>Sorry, there are no results for this category</p>");}
    print("</section></div>");      
       } else { print("database connection ERROR"); } 

}

function topItems($userType){
    $db_connection = Connect();
        if($userType == 'S'){$SQL = "SELECT TOP 5 ItemName, Category, ItemType, Description, ListDate, Picture, Price FROM SalesItems ORDER BY ListDate ASC";}
        if($userType == 'N'){$SQL = "SELECT TOP 5 ItemName, Category, Description, ListDate, Picture, Price FROM SalesItems WHERE ItemType = 'I' ORDER BY ListDate ASC";}
        $itemRetrieval = sqlsrv_Query($db_connection, $SQL);
        $testRetrieval = sqlsrv_Query($db_connection, $SQL);
       if($itemRetrieval !== FALSE) {
    print("<div class='accordion vertical'>");       
    print("<section id='TopItems'><h2><a href='#TopItems'>Top Items</a></h2>");
    if(($test = sqlsrv_fetch_array($testRetrieval, SQLSRV_FETCH_ASSOC)) != 0) {
        print("<table width='100%' border='1'>");  
        if($userType == 'S') {
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th></tr>");
            while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) :
                    if($Row['ItemType'] == "S"){$itemType = "Service";} else {$itemType = "Item";}
                    $picture = $Row['Picture'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>$itemType</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td></tr>");
                endwhile; print("</table>");  
        }else{
            print("<tr><th>Name</th><th>Description</th><th>Picture</th><th>Price</th></tr>");
                while (($Row = sqlsrv_fetch_array($itemRetrieval, SQLSRV_FETCH_ASSOC))) :
                        $picture = $Row['Picture'];
                        print( "<tr><td>{$Row['ItemName']}</td>");
                        print("<td>{$Row['Description']}</td>");
                       // print("<td>{$Row['ListDate']}</td>");
                        print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                        print("<td>{$Row['Price']}</td></tr>");
                    endwhile; print("</table>");  
        }} else { print("<p>Sorry, there are no results for this category</p>");}
    print("</section></div>");      
       } else { print("database connection ERROR"); } 

}

function buyNow($itemName) {
    $db_connection = Connect();
    $SQL = "SELECT ItemName, ItemType, Description, Picture, Price FROM SalesItems WHERE ItemName = '$itemName' AND SaleStatus = 'N'";
    $salesQuery = sqlsrv_Query($db_connection, $SQL);
    $printRow =  sqlsrv_Query($db_connection, $SQL);
    if($salesQuery !== FALSE) {
        print("<div class='accordion vertical'>");       
        print("<section id='YourItem'><h2><a href='#YourItem'>Your Item</a></h2>");
    if(($test = sqlsrv_fetch_array($salesQuery, SQLSRV_FETCH_ASSOC)) !== 0) {
        print("<table width='100%' border='1'>");  
            print("<tr><th>Name</th><th>Description</th><th>Item Type</th><th>Picture</th><th>Price</th><th>Purchase</th></tr>");
            while (($Row = sqlsrv_fetch_array($printRow, SQLSRV_FETCH_ASSOC))) :
                    $picture = $Row['Picture'];
                    print( "<tr><td>{$Row['ItemName']}</td>");
                    print("<td>{$Row['Description']}</td>");
                    print("<td>{$Row['ItemType']}</td>");
                    print("<td><a target='_blank' href='$picture'><img src='$picture'/></a></td>");
                    print("<td>{$Row['Price']}</td>");
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
                    }else { print("database connection ERROR");}}



?>