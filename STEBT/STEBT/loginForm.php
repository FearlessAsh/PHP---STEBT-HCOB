<?php  session_start(); 
if (isset($_SESSION['userName'])) {header('location:loggedInHomePage.php');}

?>
<html>
	<head>
		<title>Username/Password </title>
		<script language="JavaScript" type="text/JavaScript" src="login.js"></script>
		<link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
                <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
                <link href="HTML/styles/style3.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
	</head>
	<body>
	<?php
		//load the neccesary data
		require_once("config/db.php");
		require_once("classes/StickyFormClass.php");
		require_once("classes/LoginClass.php");
                require_once("classes/redisplayFormClass.php");
                require_once("includes/STEBTsmartHeader.php");
		
                
                
                
		//if the user has pressed the submit button
		if (isset($_POST['submit'])) { 
                    
                //set the error count to 0
		$errorCount = 0;
                //initialize and test those variables
		$userName = validateInput($_POST['username'], "UserName", 50);
		$password = validateInput($_POST['password'], "Password", 40);
                
                        //if there were any errors
			if ($errorCount > 0) {
                            //print an error message and redisplay the form
				print("<p>Please re-enter the information below.</p><br>");
				redisplayForm($userName, $password);
			} else {
				//make sure that the user is indeed who they say they are
                                //if their login credentials check out
                                if(queryLogin($userName, $password) !== "") {
                                //pull their database information into the login array
                                $login = queryLogin($userName, $password);
                                //push the database information into variables
                                $userName = $login['UserName'];
                                $password = $login['Password'];
                                $userType = $login['UserType'];
                                $firstName = $login['FirstName'];
                                $lastName = $login['LastName'];
                                
                                if($userType == 'S') { $StudentVerification = queryStudentUser($userName);
                                $status = $StudentVerification['Status'];}
                                else { $status = 'N';}
                                
                                //SAVE TO SESSION!!!!!!!!!!!!!
                                 $_SESSION['userName'] = $userName;
                                 $_SESSION['userType'] = $userType;
                                 $_SESSION['firstName'] = $firstName;
                                 $_SESSION['lastName'] = $lastName;
                                 $_SESSION['status'] = $status;
                                 //push the users to their "home page"
                                 header('location:loggedInHomePage.php#TopItems');
                                 //exit this page
                                 exit();
                                } else { $login = loginForm($userName, $password); } }	
		}else {
                //initialize the variables
		$userName = "";
		$password = "";
		//display the form for the first time
		$login = loginForm($userName, $password);
		}
                
                require_once("includes/STEBTfooter.html");
		?>
	</body>
</html>