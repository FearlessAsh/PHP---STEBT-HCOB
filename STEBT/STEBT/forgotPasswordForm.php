<?php  session_start(); ?>
<html>
	<head>
		<title>Forgot Password</title>
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
		
		//if the user has pressed the submit button
		if (isset($_POST['submit'])) {    
                //set the error count to 0
		$errorCount = 0;
                //initialize and test those variables
		$userName = checkUser($_POST['username']);
                $userForgot = returnSecurityQuestions($userName);
                //if there were any errors
                        if ($errorCount > 0) {
                            //print an error message and redisplay the form
                                print("<p>Please re-enter the information below.</p><br>");
                                forgotPasswordForm($userName);
                        } else {
                           $_SESSION['recoverUserName'] = $userName;
                           header('location:forgotPasswordAnswer.php');
                            //close this page
                            exit();}
                            
                }else{               
                //initialize the variables
		$userName = "";
		//display the form for the first time
		forgotPasswordForm($userName);
                }
		?>
	</body>
</html>