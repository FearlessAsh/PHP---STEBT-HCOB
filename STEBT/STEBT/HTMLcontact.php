<?php  session_start(); ?>
<html>
    <head>
        <title>Contact Us</title>
        <link rel ="stylesheet" type="text/css" href="css/acordionStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/formStyle.css" />
        <link rel ="stylesheet" type="text/css" href="css/NewAccordion.css" />
        <link href="HTML/styles/style3.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
    </head>
<body>
<?php
        //require stuff for performance
        require_once("config/db.php");
        require_once("classes/tableClass.php");
        require_once("classes/outsideSessionVariables.php");
        require_once("includes/STEBTsmartHeader.php");
        require_once("classes/redisplayFormClass.php");
        require_once("classes/StickyFormClass.php");
        ?>
<h1>Contact Us</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque 
ornare ipsum at erat. Quisque elementum tempus urna. Donec ornare fringilla 
erat. Phasellus gravida lectus vel dui. Fusce eget justo at odio posuere 
dignissim.</p>
<h3>Send us an Email!</h3>

        <?php 
        
                //if the user has pressed the submit button
		if (isset($_POST['submit'])) { 
                    
                //set the error count to 0
		$errorCount = 0;
                //initialize and test those variables
		$subject = validateInput($_POST['subject'], "Subject", 50);
		$message = validateInput($_POST['message'], "Message", 50);
                
                        //if there were any errors
			if ($errorCount > 0) {
                            //print an error message and redisplay the form
				print("<p>Please re-enter the information below.</p><br>");
				$email = contactForm($subject, $message);
			} else {
                            
                            //otherwise, there were no errors. go forth and make email!
                            
                            $messageStatus = contactEmail($subject, $message);
                                 }	
		}else {
                //initialize the variables
		$subject = "";
		$message = "";
		//display the form for the first time
		$email = contactForm($subject, $message);
		}
        
        
        //give the user some links so they can go forth and do stuff  
        if($userName !== ""){require_once("includes/basicFooter.html"); 
        } else {require_once("includes/STEBTfooter.html"); } 
        
            ?>
    </body>
</html>