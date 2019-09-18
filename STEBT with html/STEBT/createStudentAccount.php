<?php     session_start(); $UserNameSession = $_SESSION['userName']; ?>
<html>
	<head>
		<title>Create a student account</title>
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
		

		//if the user pushed the submit button
		if (isset($_POST['submit'])) { 
                    
                //set the error counter to 0
		$errorCount = 0;
                
                //initialize the fee status
                $feeStatus = 'P';
                $expGradMonth = validateComboBox($_POST['monthSelect'],"Expected Graduation Month");
                $expGradYear = validateGradYear($_POST['gradYear'], "Graduation Year");
                $major = validateName($_POST['major'], "Major", 50);
                $schoolEmail = validateSchoolEmail($_POST['schoolEmail'], "School Email", 50);
                $school = validateName($_POST['school'], "School", 4);
                //the number 10 is just a placeholder
                @$enrollStatus = validateInput($_POST['enrollStatus'], "Enrollment Status", 10);
                
                //validation for student Status variable
                //create the handling for the radio buttons 
                    if($enrollStatus == 'Yes') {$currEnrollYes = 'checked' ; $enroll = 'Y'; $currEnrollNo = 'unchecked'; }
                    if($enrollStatus == 'No') {$currEnrollNo = 'checked'; $enroll = 'N'; $currEnrollYes = 'unchecked'; }
                    //default case
                    if(empty($enrollStatus)) {$currEnrollYes = 'unchecked'; $currEnrollNo = 'unchecked'; $enroll = 'N';}
                    
                        //if there were errors somewhere in this process
			if ($errorCount > 0) {
                            //print an error message and redisplay the form
				print("<p>Please re-enter the information below.</p><br>");
				$studentAccount = createStudentAccountForm($schoolEmail, $school, $expGradMonth, $expGradYear, $major, $currEnrollYes, $currEnrollNo);
			} else {
                                $expGradDate = $expGradMonth . " " . $expGradYear;
                                //SAVE TO DATABASE HERE
                                $newStudentUser = saveStudentInformation($UserNameSession, $schoolEmail, $school, $enroll, $feeStatus, $expGradDate, $major); 
                                
                                //send verification Email
                                $studentVerificationEmail = verificationEmail($UserNameSession);
                        }	
		}else {
                    //initialize the varibles for the first time
                $schoolEmail = "";
                $school = "";
                $expGradMonth = "JAN";
                $expGradYear = "";
                $major = "";
		$enrollStatus = "";
                //empty out our radio buttons
                $currEnrollYes = "unchecked";
                $currEnrollNo = "unchecked";
                $enroll = "";
		//display the form for the first time
		$studentAccount = createStudentAccountForm($schoolEmail, $school, $expGradMonth, $expGradYear, $major, $currEnrollYes, $currEnrollNo);
                
		}
                require_once("includes/STEBTfooter.html");
		?>
	</body>
</html>





