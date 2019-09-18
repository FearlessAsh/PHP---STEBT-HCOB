<?php  session_start(); ?>
<html>
    <head>
        <title>About Us</title>
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
<h1>Information Links</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque 
ornare ipsum at erat. Quisque elementum tempus urna. Donec ornare fringilla 
erat. Phasellus gravida lectus vel dui. Fusce eget justo at odio posuere 
dignissim.</p>
<h3>Link List Title</h3>
<ul>
        <li><a href="#">Hypertext Link</a><br />
        Duis quis erat. Curabitur lobortis. Cras nunc. Aliquam erat volutpat.
        </li>
        <li><a href="#">Hypertext Link</a><br />
        Cras nunc. Aliquam erat volutpat. Praesent rhoncus porttitor wisi.</li>
        <li><a href="#">Hypertext Link</a> <br />
        Curabitur lobortis. </li>
</ul>
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