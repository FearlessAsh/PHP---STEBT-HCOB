<?php  session_start(); ?>
<html>
    <head>
        <title>Employees</title>
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
<h1>Employees</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque 
ornare ipsum at erat. Quisque elementum tempus urna. Donec ornare fringilla 
erat. Phasellus gravida lectus vel dui. Fusce eget justo at odio posuere 
dignissim.</p>
<h3>Executive Team</h3>
<img alt="" class="float_right" height="271" src="HTML/images/msfp_smbus1_02.jpg" width="180" />
<p>John Conners<br />
CEO<br />
BASC, MBA</p>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque 
ornare ipsum at erat. Quisque elementum tempus urna. Donec ornare fringilla 
erat. Phasellus gravida lectus vel dui. Fusce eget justo at odio posuere 
dignissim.</p>
<h4>Related resources</h4>
<ul>
        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
</ul>
    
    
        <?php 
        //give the user some links so they can go forth and do stuff  
        if($userName !== ""){require_once("includes/basicFooter.html"); 
        } else {require_once("includes/STEBTfooter.html"); } 
        
            ?>
    </body>
</html>