<?php  session_start(); if (isset($_SESSION['recoverUserName'])) {$userName = $_SESSION['recoverUserName'];}
else {print("<script>window.location='forgotPasswordForm.php';</script>");} ?>
<html>
	<head>
		<title>Password Answer</title>
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
		
                $userForgot = returnSecurityQuestions($userName);  
                if($userForgot !== "") {
                    $securityQ = $userForgot['RecoveryQuestion'];
                    $securityA = $userForgot['RecoveryAnswer'];
                    
                    //if the user has pressed the submit button
                    if (isset($_POST['submit'])) { 
                    $errorCount = 0;
                    $answer = validateInput($_POST['answer'], "Answer", 40);
                    $sha1Answer = sha1($answer);
                    if ($sha1Answer <> $securityA){
                         Print("sorry your security answer doesn't match. please try again");
                         ++$errorCount;}
                    //if there were any errors
                            if ($errorCount > 0) {
                                print("$securityQ");
                                displaySecurityAnswer();
                            } else { 
                            $_SESSION['resetSuccess'] = "TRUE";
                            header('location:forgotPasswordReset.php');
                            //close this page
                            exit();}

                    }else{               
                    //display the form for the first time
                    print("$securityQ");
                    displaySecurityAnswer();
                }}
                
                require_once("includes/STEBTfooter.html");
		?>
	</body>
</html>