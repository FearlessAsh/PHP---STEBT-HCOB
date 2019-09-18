<?php  session_start(); ?>
<html>
	<head>
		<title>Edit your Account</title>
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
                require_once("classes/sessionVariablesClass.php");


		//if the user has pushed the submit button
		if (isset($_POST['submit'])) {
                    
                //reset the error count to 0
		$errorCount = 0;
                
                //initialize and declare all of our variables,
                //in addition, use the validate functions to make sure the data is valid
                $firstName = validateName($_POST['firstName'], "FirstName", 50);
                $lastName = validateName($_POST['lastName'], "LastName", 50);
                $email = validateEmail($_POST['email'], "Email", 50);
		$password = validateInput($_POST['password'], "Password", 40);
                $password2 = validateInput($_POST['password2'], "SecondPassword", 40);
                $zipCode = validateZipCode($_POST['zipCode'], "ZipCode");
                $recoveryQuestion = validateComboBox($_POST['recoverySelect'],"Recovery Question");
                $recoveryAnswer = validateInput($_POST['recoveryAnswer'], "Recovery Answer", 40);
                
                
                if($userType ==="S") {
                //initialize the fee status
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
                if(empty($enrollStatus)) {$currEnrollYes = 'unchecked'; $currEnrollNo = 'unchecked'; $enroll = 'N';} }
                //the number 10 is just a placeholder
                
                //validation for double password strings
                    //because functions only return one variable, use an if statement
                    if(validatePasswords($password, $password2) == "") {
                        //and manually empty out both password fields
                        $password = "";
                        $password2 = "";
                    } else {$sha1Password = validatePasswords($password, $password2);}
                    
                        //if there was an error somewhere in this process
			if ($errorCount > 0) {
                            //print an error message and redisplay the form with the good information
                            //"stuck" to the form, and the rest cleared out
				print("<p>Please re-enter the information below.</p><br>");
				if($userType === "S"){ 
                                    $editStudent = editAccountFormStudent ($firstName, $lastName, $email, $password, $password2, $zipCode, $schoolEmail, $school, $expGradYear,$major, $currEnrollYes, $currEnrollNo, $recoveryAnswer );
                                } else{$edit = editAccountForm($firstName, $lastName, $email, $password, $password2, $zipCode, $recoveryAnswer ); }
			} else {
                            $_SESSION['lastName'] = $lastName;
                            $_SESSION['firstName'] = $firstName;
                                $recoveryAnswer = sha1($recoveryAnswer);
                                //SAVE TO DATABASE HERE
                                //use the save user function to save the information to the database
                            if($userType ==="S") {
                                $expGradDate = $expGradMonth . " " . $expGradYear;
                                
                                updateUser($userName, $firstName, $lastName, $email, $sha1Password,$zipCode, $recoveryQuestion, $recoveryAnswer);
                                updateStudent($userName, $schoolEmail, $school, $expGradDate, $major, $enroll);   
                            } else{ updateUser($userName, $firstName, $lastName, $email, $sha1Password, $zipCode, $recoveryQuestion, $recoveryAnswer);}
                                //otherwise, give them a link to login
                                print("<p>Go <a href = 'loggedInHomePage.php'>Home</a></p>"); }     
		} else {
                    
                //initialize all of the variables so they have clear data
                $userCredentials = queryUser($userName);
                $studentCredentials = queryStudentUser($userName);
                
                //prepopulate the forms with database information
                $firstName = $userCredentials['FirstName'];
                $lastName = $userCredentials['LastName'];
                $email = $userCredentials['UserEmailEmail'];
		$password = "";
                $password2 = "";
                $zipCode = $userCredentials['ZIP'];
                $schoolEmail = $studentCredentials['SchoolEmail'];
                $school = $studentCredentials['School'];
                $expGradYear = "";
                $recoveryQuestion = "";
                $recoveryAnswer = "";
                $major = $studentCredentials['Major'];
                //empty out our radio buttons
                $currEnrollYes = "unchecked";
                $currEnrollNo = "unchecked";
                $enroll = "";
                
		//display the form for the first time
                if($userType === "S"){ 
                    $editStudent = editAccountFormStudent ($firstName, $lastName, $email, $password, $password2, $zipCode, $schoolEmail, $school, $expGradYear,$major, $currEnrollYes, $currEnrollNo, $recoveryAnswer );
                } else{$edit = editAccountForm($firstName, $lastName, $email, $password, $password2, $zipCode, $recoveryAnswer ); }
                
		}
                
                //give the user some links so they can go forth and do stuff  
                require_once("includes/basicFooter.html"); 
		?>
	</body>
</html>





