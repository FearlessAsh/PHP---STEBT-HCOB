<?php
//This class manages all of the sticky form handling

/*this function takes a fieldname as an argument
 *      it then returns a generic error message for error handling for the user
 */
function displayRequired($fieldName) {
   print("<p>The field \"$fieldName\" is required.</p>");
}

/*this function takes information, a field name, and field size as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is missing or is greater than the given fieldsize
 *      then the display required function is called, the error count is incremented
 *      and the function returns an emptied out string
 *      otherwise, 
 *      the function trims the data and strips and slashes and returns proper data
 *      the variable return is returned
 */		
function validateInput($data, $fieldName, $fieldSize) {
    global $errorCount;
            if (empty($data) OR (strlen($data) > $fieldSize) ) {
                    displayRequired($fieldName);
                    ++$errorCount;
                    $return = "";
            } else {
                    $return = trim($data);
                    $return = str_replace("'", "&#39;", $return); }
    return($return);
}

/*this function takes information, a field name, and field size as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is missing or is greater than the given fieldsize
 *      then the display required function is called, the error count is incremented
 *      and the function returns an emptied out string
 *      otherwise, 
 *      the function trims the data and strips and slashes
 *      and the first letter is capitalized. then it returns proper data
 *      the variable return is returned
 */
function validateName($data, $fieldName, $fieldSize) {
    global $errorCount;
            if (empty($data) OR (strlen($data) > $fieldSize)) { 
                displayRequired($fieldName); ++$errorCount; $return = "";
            } else if (is_numeric($data)) {
                print("<p>Please enter non-numeric charaters for names.</p>"); 
                ++$errorCount; $return = "";
            } else {  
                $return = trim($data); $return = str_replace("'", "&#39;", $return);
                $return = ucfirst($return); }
    return($return);
}

/*this function takes information, a field name, and field size as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is missing or is greater than the given fieldsize
 *      then the display required function is called, the error count is incremented
 *      and the function returns an emptied out string
 *      also, if the pregmatch function for the data doesn't match, (@ sign, .xxx)
 *      the function returns an error message, increments the error count, and empties the string
 *      otherwise, 
 *      the function trims the data and strips and slashes
 *      then it returns proper data
 *      the variable return is returned
 */
function validateEmail($data, $fieldName, $fieldSize) {
    global $errorCount;
            if (empty($data)OR (strlen($data) > $fieldSize)) {
                    displayRequired($fieldName); ++$errorCount; $return = "";
            } else if(preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.[a-zA-Z]{2,})$/i", $data) == 0){
                    print("<p>Please enter a valid email address.</p>"); ++$errorCount; $return = "";
            } else {
                    $return = trim($data);
                    $return = str_replace("'", "&#39;", $return); }
    return($return);
}


/*this function takes information, a field name, and field size as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is missing or is greater than the given fieldsize
 *      then the display required function is called, the error count is incremented
 *      and the function returns an emptied out string
 *      also, if the pregmatch function for the data doesn't match, (@ sign, .xxx)
 *      the function returns an error message, increments the error count, and empties the string
 *      otherwise, 
 *      the function trims the data and strips and slashes
 *      then it returns proper data
 *      the variable return is returned
 */
function validateSchoolEmail($data, $fieldName, $fieldSize) {
    global $errorCount;
            if (empty($data)OR (strlen($data) > $fieldSize)) {
                    displayRequired($fieldName); ++$errorCount; $return = "";
            } else if(preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.edu)$/i", $data) == 0){
                    print("<p>Please enter a valid email address.</p>"); ++$errorCount; $return = "";
            } else {
                    $return = trim($data);
                    $return = str_replace("'", "&#39;", $return); }
    return($return);
}

 
//*********************************************************************************************************************
//CHANGE CONSTRAINT CHECKING

/*this function takes two passwords as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the password is less than the required minimum size,
 *      then the the error count is incremented, an error message is shown
 *      and the function returns an emptied out string
 *      also, if the passwords do no match (meaning the user typed in two differernt passwords)
 *      then the the error count is incremented, an error message is shown
 *      and the function returns an emptied out string
 *      also, if the pregmatch function for the data doesn't match, (NOT SURE YET)
 *      the function returns an error message, increments the error count, and empties the string
 *      otherwise, 
 *      the function returns the encripted password (sha1)
 *      the variable return is returned
 */
function validatePasswords($firstPassword, $secondPassword) {
    global $errorCount;
             if (strlen($firstPassword) < 6) {
                  ++$errorCount; print("<p>The password is too short</p>");
                  $return = "";
             }else if ($firstPassword <> $secondPassword) {
                  ++$errorCount; print("<p>The passwords do not match.</p>");
                  $return = "";
            // } else if(!preg_match("/^[0-99]{5}$/", $firstPassword)) {
                  //++$errorCount; print("<p>The password must contain SOMETHING.</p>");
                  //$return = "";
             } else {$return = sha1($firstPassword);}  
    return($return);
}

/*this function takes the data and a fieldname as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the data is empty then
 *      then the the error count is incremented, an error message is shown
 *      and the function returns an emptied out string
 *      also, if the pregmatch function for the data doesn't match, (must be a 5 digit number)
 *      the function returns an error message, increments the error count, and empties the string
 *      otherwise, 
 *      the function returns the trimmed data and strips the slashes
 *      the variable return is returned
 */
function validateZipCode($data, $fieldName) {
    global $errorCount;
        if (empty($data)) {
                displayRequired($fieldName);
                ++$errorCount; $return = "";
        } elseif (!preg_match("/^[0-9]{5}$/",$data)){
                print("<p>You must enter a 5 digit numeric zipcode.</p>");
                ++$errorCount; $return = "";
        } else {
                $return = trim($data); $return = str_replace("'", "&#39;", $return); } 
    return($return);
}

/*this function takes the data and a fieldname as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the data is empty then
 *      then the the error count is incremented, an error message is shown
 *      and the function returns an emptied out string
 *      also, if the pregmatch function for the data doesn't match, (must be a 4 digit number)
 *      the function returns an error message, increments the error count, and empties the string
 *      otherwise, 
 *      the function returns the trimmed data and strips the slashes
 *      the variable return is returned
 */
function validateGradYear($data, $fieldName) {
    global $errorCount;
        if (empty($data)) {
                displayRequired($fieldName);
                ++$errorCount; $return = "";
        } elseif (!preg_match("/^[0-9]{4}$/",$data)){
                print("<p>You must enter a 4 digit numeric year.</p>");
                ++$errorCount; $return = "";
        } else {
                $return = trim($data); $return = str_replace("'", "&#39;", $return); } 
    return($return);
}
/*this function takes the data as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      it then makes a connection to the database using db.php
 *      then an sql statement is saved to a variable to query user names
 *      the query is saved to the taken user check variable
 *      then, if the query executes sucessfully,
 *      the results are saved to a variable so we can use them as a test
 *      if there is a username already (there are rows in the query)
 *      then print that that user name has already been taken and empty the field out
 *      otherwise, 
 *      keep the user name
 *      the variable return is returned
 */
function validateUser($data) {
    global $errorCount;
    $db_connection = Connect();
    $SQL = "SELECT UserName FROM UserAccount WHERE UserName = '$data'"; 
    $takenUserCheck = sqlsrv_Query($db_connection, $SQL);
    if($takenUserCheck !== FALSE) { $Row = sqlsrv_fetch_array($takenUserCheck, SQLSRV_FETCH_ASSOC);
        if($Row > 0) { print("<p>That User Name has already been taken</p>"); $return = ""; ++$errorCount;}
        else{$return = $data;} }
    return($return); 
}

function checkUser($data) {
    global $errorCount;
    $db_connection = Connect();
    $SQL = "SELECT UserName FROM UserAccount WHERE UserName = '$data'"; 
    $takenUserCheck = sqlsrv_Query($db_connection, $SQL);
    if($takenUserCheck !== FALSE) { $Row = sqlsrv_fetch_array($takenUserCheck, SQLSRV_FETCH_ASSOC);
        if($Row > 0) {$return = $data;}
        else{ print("<p>Please try another user name</p>"); $return = ""; ++$errorCount;} }
    return($return); 
}

function returnSecurityQuestions($userName){
    global $errorCount;
    $db_connection = Connect();
    $SQL = "SELECT UserName FROM UserAccount WHERE UserName = '$userName'"; 
    $takenUserCheck = sqlsrv_Query($db_connection, $SQL);
    if($takenUserCheck !== FALSE) { 
        $SQLretrieve = "SELECT RecoveryQuestion, RecoveryAnswer FROM UserAccount WHERE UserName = '$userName'";
        $retrieval = sqlsrv_Query($db_connection, $SQLretrieve);
        $Row = sqlsrv_fetch_array($retrieval, SQLSRV_FETCH_ASSOC);
    return($Row); 
} else { ++$errorCount; $return = ""; return($return);}
}

/*this function takes information, a field name, and field size as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is missing or is greater than the given fieldsize
 *      then the display required function is called, the error count is incremented
 *      and the function returns an emptied out string
 *      also, if the pregmatch function for the data doesn't match, (@ sign, .xxx)
 *      the function returns an error message, increments the error count, and empties the string
 *      otherwise, 
 *      the function trims the data and strips and slashes
 *      then it returns proper data
 *      the variable return is returned
 */
function validatePrice($data, $fieldName, $fieldSize) {
    global $errorCount;
        if (empty($data)OR (strlen($data) > $fieldSize)) {
                    displayRequired($fieldName); ++$errorCount; $return = "";
            } else if(!preg_match("/[0-999]+\.([0-9]{2})/", $data)){
                    $return = trim($data); $return = str_replace("'", "&#39;", $return);
                    $return .= ".00";
            } else {
                    $return = trim($data);
                    $return = str_replace("'", "&#39;", $return); }
    return($return);
}

/*this function takes information, a field name as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is equal to null
 *      then the display required function is called, the error count is incremented
 *      and the function returns an emptied out string
 *      otherwise, 
 *      the function trims the data and strips and slashes and returns proper data
 *      the variable return is returned
 */		
function validateComboBox($data, $fieldName) {
    global $errorCount;
            if ($data == "NULL") {
                    displayRequired($fieldName);
                    ++$errorCount;
                    $return = "";
            } else {
                    $return = trim($data);
                    $return = str_replace("'", "&#39;", $return); }
    return($return);
}


/*this function takes  a picture url as an argument
 *      it then makes a global error count variable that can be accessed outside the function
 *      if the information is not empty
 *      then the length of the url is checked to make sure its not over 4000. 
 *          if it is then it is emptied and an error message is displayed.
 *      otherwise, also if the url does not end with the specified endings,
 *          then it is emptied out and an error message is displayed.
 *      otherwise, 
 *      the function trims the data and returns proper data
 *      the variable return is returned
 */
function validatePicture($data){
    global $errorCount;
    if(!empty($data)){
    if (strlen($data) > 4000) {
            $return = ""; print("your picture is too big. try a smaller picture");
            ++$errorCount;
            } else if(!preg_match("/\.(jpg|gif|png)$/i", $data)){
                    $return = ""; print("your picture must be a jpeg, gif, or png.");
                    ++$errorCount;
            } else {
                    $return = trim($data);}      
            }
            else { $return = ""; }
    
    return($return);    
        }
        
        
function contactEmail($subject, $message){
       $email =  mail("mail@stebt.com", $subject, $message);
       if($email == TRUE) {print("Your message email was sent.");}
                       else{ print("Couldn't send your email");}
}        

?>