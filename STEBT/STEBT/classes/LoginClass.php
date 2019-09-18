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
function queryLogin($userName, $password){
	$db_connection = Connect();
       $sha1password = sha1($password);
        $SQL = "SELECT UserName, Password, FirstName, LastName, UserType FROM UserAccount WHERE UserName = '$userName' And Password = '$sha1password'";
        $loginCheck = sqlsrv_Query($db_connection, $SQL);
       if($loginCheck !== FALSE) { $Return = sqlsrv_fetch_array($loginCheck, SQLSRV_FETCH_ASSOC); //print("Login query successful </br>");
           if($Return != 0) { // print("Hello " . $Row['UserName'] . " . Your password is " . $Row['Password'] . " .");
           } else { print("Sorry, your credentials don't match"); $Return= "";}
       } else { print("database connection ERROR"); $Return = "";} return $Return;
}

/*this function takes user information as an argument
 *      it then makes a connection to the database using db.php
 *      then the sql string is also saved to a variable
 *      then the variable create user check performes the insert function
 *      then, the query is tested to make sure it was performed
 *      otherwise, the new information was added. no information is returned
 */
function saveUser($firstName, $lastName, $email, $userName, $password, $zipCode, $studentStatus, $recoveryQuestion, $recoveryAnswer) {
    $db_connection = Connect();
    $SQL = "INSERT INTO UserAccount VALUES ('$userName', '$password', '$studentStatus', '$email', '$firstName', '$lastName', '$zipCode', '$recoveryQuestion', '$recoveryAnswer')";
    $createUserCheck = sqlsrv_Query($db_connection, $SQL);
    if($createUserCheck == FALSE) {Print("<p>Sorry, we were unable to create an account for you</p>");
    } else {Print("<p>Success!</p>"); }
}

/*this function takes item information as an argument
 *      it then makes a connection to the database using db.php
 *      then the sql string is also saved to a variable
 *      then the variable create item performes the insert function
 *      then, the query is tested to make sure it was performed
 *      otherwise, the new information was added. no information is returned
 */
function saveItem($UserName, $ItemName, $Category, $ItemType, $Description, $Picture, $Price) {
    $db_connection = Connect();
    $SaleStatus = "N";
    $SQL = "INSERT INTO SalesItems (UserName, ItemName, Category, ItemType, Description, Picture, Price, SaleStatus) ".
            "VALUES ('$UserName', '$ItemName', '$Category', '$ItemType', '$Description', '$Picture', $Price, '$SaleStatus')";
    $createItem = sqlsrv_Query($db_connection, $SQL);
    if($createItem == FALSE) {Print("<p>Sorry, we were unable to create an Item for you</p>");
    } else {Print("<p>Success! Your Item has been added!"); }
}

/*this function takes student user information as an argument
 *      it then makes a connection to the database using db.php
 *      then the sql string is also saved to a variable
 *      then the variable create student performes the insert function
 *      then, the query is tested to make sure it was performed
 *      otherwise, the new information was added. no information is returned.
 */
function saveStudentInformation($UserName, $SchoolEmail, $School, $CurrEnrollment, $FeeStatus, $ExpGradDate, $Major) {
    $db_connection = Connect();
    $SQL = "INSERT INTO StudentUserAccount VALUES ('$UserName', '$SchoolEmail', '$School', '$CurrEnrollment', '$FeeStatus', '$ExpGradDate', '$Major')";
    $createStudent = sqlsrv_Query($db_connection, $SQL);
    if($createStudent == FALSE) {Print("<p>Sorry, we were unable to create an student account for you</p>");
    } else {Print("<p>Success! You're all set! <a href='loginForm.php'>Login</a></p>"); }
}

/*this function takes an item name and a user name as arguments
 *      it then makes a connection to the database in order to query information
 *      then the sql string is saved to a variable, along with the query
 *      then we test to see if the query is not false, and if it isn't, then
 *      we save the results into an associative array.
 *      we also declare salestax and payment due as 0, since we're assuming
 *      that they've paid in full. 
 *      
 * Next we add the results from the sale to the sales invoice table with the sql variable.
 *      then we save the query to a variable. if the results are not false, then
 *      we must update the sales item table to reflect that the item sold.
 *      if the results of the sales update are not false, then we select the 
 *      users email from their account so we can send them an email.
 * 
 * If we can gather the users email, then we send them a confirmation email.
 *      the function returns a message whether the email sent or not.
 * 
 * Other wise, a string of error messages are spit out. 
 */
function queryItem($ItemName, $userName, $userType ){
       $db_connection = Connect();
       $SQL = "SELECT ItemID, ItemName, ItemType, Price FROM SalesItems WHERE ItemID = '$ItemName'";
       $queryItem = sqlsrv_Query($db_connection, $SQL);
       if($queryItem !== FALSE){
           $ItemResults = sqlsrv_fetch_array($queryItem, SQLSRV_FETCH_ASSOC);
           $itemID = $ItemResults['ItemID'];
           $itemName = $ItemResults['ItemName'];
           $itemType = $ItemResults['ItemType'];
           $itemPrice = $ItemResults['Price'];
           $salesTax = 0.00;
           $paymentDue = 0.00;
           
           
           
           $SQLadd = "INSERT INTO SalesInvoice (ItemID, UserName, SalesTax, InvoiceType, PaymentRecieved, PaymentDue) ".
            "VALUES ('$itemID', '$userName', '$salesTax', '$itemType', '$itemPrice', '$paymentDue')";
           $createInvoice = sqlsrv_Query($db_connection, $SQLadd);
           
           if($createInvoice !== FALSE) {
               $SQLupd = "UPDATE SalesItems SET SaleStatus = 'S' WHERE ItemID = '$itemID'";
               $updateItem = sqlsrv_Query($db_connection, $SQLupd);
               
               if($updateItem !== FALSE){
                   $SQLuser = "SELECT UserEmailEmail  FROM UserAccount WHERE UserName = '$userName'";
                   $userEmail = sqlsrv_Query($db_connection, $SQLuser);
                   
                   if($userEmail !== FALSE) {
                       $emailResult = sqlsrv_fetch_array($userEmail, SQLSRV_FETCH_ASSOC);
                       $userEmail = $emailResult['UserEmailEmail'];
                       
                      $email =  mail($userEmail,"Your recent purchase of $itemName", "Thank you for your purchase!");
                       if($email == TRUE) {$return = "Your message was successfully sent";}
                       else{ print("Couldn't send your email"); $return = "";}
                   }else{print("couldn't select your email"); $return = "";}
               }else{print("couldn't update your sale status");$return = "";}
           }else{print("coudn't create your sales invoice");$return = "";}
       }
       Return($return);
}

function addFee($userName, $billingPeriod, $fee ){
    $db_connection = Connect();
    $SQL = "SELECT FeeID, UserName, BillingPeriod, FeePayment, FeeOwed, ItemCount FROM Fee WHERE UserName = '$userName' AND BillingPeriod = '$billingPeriod'";
    $queryItem = sqlsrv_Query($db_connection, $SQL);
    $addInvoice = sqlsrv_Query($db_connection, $SQL);
    if($queryItem !== FALSE){
        $results = sqlsrv_fetch_array($queryItem, SQLSRV_FETCH_ASSOC);
        if($results != 0){
           $results = sqlsrv_fetch_array($addInvoice, SQLSRV_FETCH_ASSOC);
           $feeID = $results['FeeID'];
           $userName = $results['UserName'];
           $billingPeriod = $results['BillingPeriod'];
           $FeeOwed = $results['FeeOwed'];
           $FeeOwed += $fee;
                if(!preg_match("/[0-999]+\.([0-9])/", $FeeOwed)){
                $FeeOwed .= ".00";}
           $itemCount = $results['ItemCount'] + 1;
           //add to exsisting invoice
           $SQLupd = "UPDATE Fee SET FeeOwed = $FeeOwed, ItemCount = $itemCount WHERE FeeID = '$feeID' AND UserName = '$userName' AND BillingPeriod = '$billingPeriod'";
           $updateItem = sqlsrv_Query($db_connection, $SQLupd);   
              if($updateItem !== FALSE){ $return = "Success!"; } else { $return = "ERROR";}  
        } else{
           $initialPayment = 0.00;
           $initialItem = 1;
           $SQLadd = "INSERT INTO Fee (UserName, BillingPeriod, FeePayment, FeeOwed, ItemCount) VALUES ('$userName', '$billingPeriod', $initialPayment, $fee, $initialItem)";
           $createFee = sqlsrv_Query($db_connection, $SQLadd);
           if($createFee !== FALSE){ $return = "Success!"; } else { $return = "ERROR";}  
        }
    }
    return($return);
}

/*this function takes a user name as an argument.
 *      it then makes a connection to the database, and a sql statement is created.
 *      then the query is saved to a variable. if the results are not false, then
 *      the results are returned as an associative array. 
 * if the rows returned equals 0, then print an error message, and other wise
 *      print a database connection error.
 */
function queryUser($userName){
	$db_connection = Connect();
        $SQL = "SELECT Password, FirstName, LastName, UserEmailEmail, ZIP, RecoveryAnswer FROM UserAccount WHERE UserName = '$userName'";
        $loginCheck = sqlsrv_Query($db_connection, $SQL);
       if($loginCheck !== FALSE) { $Return = sqlsrv_fetch_array($loginCheck, SQLSRV_FETCH_ASSOC);
           if($Return != 0) { // print("Hello " . $Row['UserName'] . " . Your password is " . $Row['Password'] . " .");
           } else { print("Sorry, your username couldn't be found"); $Return= "";}
       } else { print("database connection ERROR"); $Return = "";} return $Return;
}

/*this function takes a user name as an argument. it then connects to the database.
 *      then an sql statement is set up. the results of the query are saved to the variable.
 *      if the results of the query are not false, then the results are fetched
 *      as an associative array. otherwise, an error message is displayed
 */
function queryStudentUser($userName){
    $db_connection = Connect();
    $SQL = "SELECT SchoolEmail, School, CurrentlyEnrolled, ExpGradDate, Major FROM StudentUserAccount WHERE UserName = '$userName'";
    $createStudent = sqlsrv_Query($db_connection, $SQL);
    if($createStudent !== FALSE) { $Return = sqlsrv_fetch_array($createStudent, SQLSRV_FETCH_ASSOC);
    } else {Print("<p>Something went wrong</p>"); $Return = ""; } return $Return;
}

/*this function takes a user name, first name, last name, email, and password as arguments.
 *      then a db connection is established and an sql statement set up.
 *      the results of the query are saved to the database.
 *      if the results of the query are false, then there was an error. otherwise
 *      it was successful.
 */
function updateUser($userName, $firstName, $lastName, $email, $password, $zip, $recoveryQuestion, $recoveryAnswer){ 
    $db_connection = Connect();
    $SQL = "UPDATE UserAccount SET Password = '$password', UserEmailEmail = '$email', FirstName = '$firstName', LastName = '$lastName', ZIP = '$zip', RecoveryQuestion = '$recoveryQuestion' , RecoveryAnswer = '$recoveryAnswer' WHERE UserName = '$userName'";
    $createStudent = sqlsrv_Query($db_connection, $SQL);
    if($createStudent == FALSE) {Print("<p>Sorry, we were unable to edit your account</p>");
    } else {Print("<p>Success! You're all set!</p>"); }    
}

function updatePassword($sha1Password, $userName){
    $db_connection = Connect();
    $SQL = "UPDATE UserAccount SET Password = '$sha1Password' WHERE UserName = '$userName'";
    $createStudent = sqlsrv_Query($db_connection, $SQL);
    if($createStudent == FALSE) {Print("<p>Sorry, we were unable to edit your account</p>");
    } else {Print("<p>Success! You're all set!</p>"); }    
}
  
/*this function takes a user name, school email, school, expected graduation date, major, and current enrollment as arguments.
 *      then a db connection is established and an sql statement set up.
 *      the results of the query are saved to the database.
 *      if the results of the query are false, then there was an error. otherwise
 *      it was successful.
 */
function updateStudent($userName, $schoolEmail, $school, $expGradDate, $major, $currEnroll) {
        $db_connection = Connect();
    $SQL = "UPDATE StudentUserAccount SET SchoolEmail = '$schoolEmail', School = '$school', CurrentlyEnrolled = '$currEnroll', ExpGradDate = '$expGradDate', Major = '$major' WHERE UserName = '$userName'";
    $createStudent = sqlsrv_Query($db_connection, $SQL);
    if($createStudent == FALSE) {Print("<p>Sorry, we were unable to edit your account</p>");
    } else {Print("<p>Success! You're all set!</p>"); }  
}

/*this function takes an item name, category, item type, description, picture, and price as arguments.
 *      then a db connection is established and an sql statement set up.
 *      the results of the query are saved to the database.
 *      if the results of the query are false, then there was an error. otherwise
 *      it was successful.
 */
function updateItem($ItemName, $Category, $ItemType, $Description, $Picture, $Price, $ItemID){
    $db_connection = Connect();
    $SQL = "UPDATE SalesItems SET ItemName = '$ItemName', Category = '$Category', ItemType = '$ItemType', Description = '$Description', Picture = '$Picture', Price = '$Price' WHERE ItemID = '$ItemID' ";
    $createItem = sqlsrv_Query($db_connection, $SQL);
    if($createItem == FALSE) {Print("<p>Sorry, we were unable to edit an Item for you</p>");
    } else {Print("<p>Success! Your Item has been edited!"); }
}


/*this function takes a user name as an argument. it then connects to the database.
 *      then an sql statement is set up. the results of the query are saved to the variable.
 *      if the results of the query are not false, then the results are fetched
 *      as an associative array. otherwise, an error message is displayed
 */
function queryListItem($ItemName){
    $db_connection = Connect();
    $SQL = "SELECT ItemID, ItemName, Category, ItemType, Description, Picture, Price FROM SalesItems WHERE ItemID = '$ItemName'";
    $createItem = sqlsrv_Query($db_connection, $SQL);
    if($createItem == FALSE) {Print("<p>Sorry something went wrong</p>"); $return = "";
    } else { $return = sqlsrv_fetch_array($createItem, SQLSRV_FETCH_ASSOC); }
    Return($return);
}


//fee payment... just like item buying
function updateFees($FeeID, $userName ){
       $db_connection = Connect();
       $SQL = "SELECT FeePayment, FeeOwed FROM Fee WHERE FeeID = '$FeeID' AND UserName = '$userName'";
       $queryItem = sqlsrv_Query($db_connection, $SQL);
       if($queryItem !== FALSE){
           $ItemResults = sqlsrv_fetch_array($queryItem, SQLSRV_FETCH_ASSOC);
           $feeOwed = $ItemResults['FeeOwed'];
           $feePayment = $ItemResults['FeePayment'];
           $newfeePayment = $feeOwed - $feePayment;
           $feePayment += $newfeePayment;
           if(!preg_match("/[0-999]+\.([0-9])/", $feePayment)){
                $feePayment .= ".00";}
           
           $SQLadd = "UPDATE Fee SET FeePayment = '$feePayment', FeeOwed = '$feeOwed'  WHERE FeeID = '$FeeID' AND UserName = '$userName'";
           $createInvoice = sqlsrv_Query($db_connection, $SQLadd);
           
           if($createInvoice !== FALSE) {
               $SQLupd = "UPDATE StudentUserAccount SET FeeStatus = 'P' WHERE UserName = '$userName'";
               $updateItem = sqlsrv_Query($db_connection, $SQLupd);
               
               if($updateItem !== FALSE){
                   $SQLuser = "SELECT UserEmailEmail FROM UserAccount WHERE UserName = '$userName'";
                   $userEmail = sqlsrv_Query($db_connection, $SQLuser);
                   
                   if($userEmail !== FALSE) {
                       $emailResult = sqlsrv_fetch_array($userEmail, SQLSRV_FETCH_ASSOC);
                       $userEmail = $emailResult['UserEmailEmail'];
                       
                      $email =  mail($userEmail,"Your recent payment of $FeeID", "Thank you for your payment!");
                       if($email == TRUE) {print("Your message was successfully sent");}
                       else{ print("Couldn't send your email");}
                   }else{print("couldn't select your email");}
               }else{print("couldn't update your sale status");}
           }else{print("coudn't create your sales invoice");}
       }else{print("database connection error");}
}

function deleteItem($itemID){
     $db_connection = Connect();
    $SQL = "DELETE FROM SalesItems WHERE ItemID = '$itemID' ";
    $createItem = sqlsrv_Query($db_connection, $SQL);
    if($createItem == FALSE) {$return = "<p>Sorry, we were unable to delete an Item for you</p>";
    } else {$return = "<p>Success! Your Item has been deleted!"; }
    return($return);
}


?>