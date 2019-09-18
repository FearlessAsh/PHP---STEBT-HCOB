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
        ?>
<h1>Contact Us</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque 
ornare ipsum at erat. Quisque elementum tempus urna. Donec ornare fringilla 
erat. Phasellus gravida lectus vel dui. Fusce eget justo at odio posuere 
dignissim.</p>
<h3>Mailing Address</h3>
<img alt="" class="float_right" height="200" src="HTML/images/map.jpg" width="200" />
<p>123 Main Street<br />
City, ST 00000</p>
<h3>Hours of Operation</h3>
<p>Monday - Friday 09:00 a.m. - 06:00 p.m.<br />
Closed Saturday and Sunday</p>
<h4>Driving Directions</h4>
<ol>
        <li>Lorem ipsum dolor sit amet</li>
        <li>consectetuer adipiscing elit.</li>
</ol>
    
    
    
        <?php 
        //give the user some links so they can go forth and do stuff  
        if($userName !== ""){require_once("includes/basicFooter.html"); 
        } else {require_once("includes/STEBTfooter.html"); } 
        
            ?>
    </body>
</html>