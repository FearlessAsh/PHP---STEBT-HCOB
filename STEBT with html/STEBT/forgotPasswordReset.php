<?php  session_start(); 
if (isset($_SESSION['recoverUserName'])) {$userName = $_SESSION['recoverUserName'];}
else {print("<script>window.location='forgotPasswordForm.php';</script>");}
if (isset($_SESSION['resetSuccess'])) { }
else {print("<script>window.location='forgotPasswordForm.php';</script>");}
?>
<html>
	<head>
		<title>Password Reset</title>
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
                $password = validateInput($_POST['password'], "Password", 40);
                $password2 = validateInput($_POST['password2'], "SecondPassword", 40);
                
                if(validatePasswords($password, $password2) == "") {
                //and manually empty out both password fields
                $password = "";
                $password2 = "";
                $error = 1;
                } else {$sha1Password = validatePasswords($password, $password2);}
                
                //if there were any errors
                        if ($errorCount > 0) {
                            //print an error message and redisplay the form
                                print("<p>Please re-enter the information below.</p><br>");
                                pickNewPassword($password, $password2);
                        } else {
                           
                           $newPassword =  updatePassword($sha1Password, $userName);
                           header('location:logOut.php');
                            //close this page
                            exit();}

                }else{               
                //initialize the variables
		$password = "";
                $password2 = "";
		//display the form for the first time
		pickNewPassword($password, $password2);
                }
                require_once("includes/STEBTfooter.html");
		?>
	</body>
</html>