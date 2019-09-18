<?php  session_start(); ?>
<html>
	<head>
		<title>Create an Account</title>
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
		
		//if the user has pushed the submit button
		if (isset($_POST['submit'])) {
                //reset the error count to 0
		$errorCount = 0;
                //initialize and declare all of our variables,
                //in addition, use the validate functions to make sure the data is valid
                $firstName = validateName($_POST['firstName'], "FirstName", 50);
                $lastName = validateName($_POST['lastName'], "LastName", 50);
                $email = validateEmail($_POST['email'], "Email", 50);
		$userName = validateUser($_POST['userName'], "UserName", 50);
		$password = validateInput($_POST['password'], "Password", 40);
                $password2 = validateInput($_POST['password2'], "SecondPassword", 40);
                $zipCode = validateZipCode($_POST['zipCode'], "ZipCode");
                $recoveryQuestion = validateComboBox($_POST['recoverySelect'],"Recovery Question");
                $recoveryAnswer = validateInput($_POST['recoveryAnswer'], "Recovery Answer", 40);
                //the number 10 is just a placeholder
                @$studentStatus = validateInput($_POST['studentStatus'], "Student Status", 10);
                //validation for student Status variable
                //checks and unchecks the radio buttons, as well as saving the student or non student token
                    if($studentStatus == 'Yes') {$studentYes = 'checked' ; $student = 'S'; $studentNo = 'unchecked'; }
                    if($studentStatus == 'No') {$studentNo = 'checked'; $student = 'N'; $studentYes = 'unchecked'; }
                    if(empty($studentStatus)) {$studentYes = 'unchecked'; $studentNo = 'unchecked'; $student = 'N';}
                //validation for double password strings
                    //because functions only return one variable, use an if statement
                    if(validatePasswords($password, $password2) == "") {
                        //and manually empty out both password fields
                        $password = "";
                        $password2 = "";
                    }
                    //otherwise, the passwords are fine, so use the function to encrypt them and move on
                    else {$sha1Password = validatePasswords($password, $password2);}
                //validation for user name
                $userName = validateUser($userName);
                        //if there was an error somewhere in this process
			if ($errorCount > 0) {
                            //print an error message and redisplay the form with the good information
                            //"stuck" to the form, and the rest cleared out
				print("<p>Please re-enter the information below.</p><br>");
				$account = createAccountForm($firstName, $lastName, $email, $userName, 
                        $password, $password2, $zipCode, $studentYes, $studentNo, $recoveryAnswer );
			} 
                        //otherwise, no errors, continue on with the process
                        else {
                                $recoveryAnswer = sha1($recoveryAnswer);
                                //SAVE TO DATABASE HERE
                                //use the save user function to save the information to the database
                                $newUser = saveUser($firstName, $lastName, $email, $userName, $sha1Password, $zipCode, $student, $recoveryQuestion, $recoveryAnswer);
                                //if the student is indeed a student
                                if($student == 'S') {
                                //save their information to the session
                                $_SESSION['userName'] = $userName;
                                //push the user to the student registration page
                                header('location:createStudentAccount.php');
                                //close this page
                                exit(); }
                                //otherwise, give them a link to login
                                else { print("<p>Please <a href = 'loginForm.php'>Login</a></p>");}
			}
                //if the user has not pressed submit, then give them some information        
		}else {
                //initialize all of the variables so they have clear data
		$firstName = "";
                $lastName = "";
                $email = "";
		$userName = "";
		$password = "";
                $password2 = "";
                $zipCode = "";
                $studentStatus = "";
                $recoveryQuestion = "";
                $recoveryAnswer = "";
                //empty out our radio buttons
                $studentYes = "unchecked";
                $studentNo = "unchecked";
                $student= "";
		//display the form for the first time
		$account = createAccountForm($firstName, $lastName, $email, $userName, 
                        $password, $password2, $zipCode, $studentYes, $studentNo, $recoveryAnswer );
		}
                require_once("includes/STEBTfooter.html");
		?>
	</body>
</html>





