<?php
        //changed from mssql_connect
	//database connection where connect('ip address', 'username', 'password')
        //$serverName = "ASHLEA-PC"; //serverName\instanceName

/*
 * begin the connect function, which takes no arguments
 *      initialize the server name,
 *      and start an array with the connection credentials (username, password, db)
 *      then save the connection to a variable
 *      
 *      if the connection is true, meaning it was established
 *      then return the connection for use in other parts of the program.
 *      otherwise, print an error message, close the connection, and print an error message
 */
function Connect(){
	$serverName = "ASHLEA-PC"; //serverName\instanceName
	$connectionInfo = array("Database"=>"master");
	$db_connection = sqlsrv_connect($serverName, $connectionInfo);
	if($db_connection){
                //print("SUCCESS DB.php");
                return $db_connection;
	} else{
                print(sqlsrv_errors());
                sqlsrv_close($db_connection);
		return "There was an error connecting to the database";    
	} 
}

?>