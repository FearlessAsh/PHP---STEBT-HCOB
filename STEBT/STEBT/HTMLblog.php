<?php  session_start(); ?>
<html>
    <head>
        <title>Blog</title>
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
<h1>Blog</h1>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque 
ornare ipsum at erat. Quisque elementum tempus urna. Donec ornare fringilla 
erat. Phasellus gravida lectus vel dui. Fusce eget justo at odio posuere 
dignissim.</p>
<h2>Subheading</h2>
<p>Sed porta, turpis sit amet viverra rhoncus, mauris urna interdum 
erat, nec semper dui diam ut libero. Donec adipiscing placerat metus. 
Integer eu eros vel risus ornare consequat. Curabitur sem erat, tempor 
non, ullamcorper quis, dapibus a, ante. Aliquam tempus tellus eget est. 
In hendrerit turpis sed ligula. Integer vulputate nibh congue magna. 
Duis commodo leo sit amet quam. Nunc commodo sodales nunc. Donec est 
nunc, porttitor et, accumsan nec, pretium quis, mauris. Duis sapien. 
Nulla felis lorem, accumsan vitae, ultricies et, hendrerit vel, massa. 
In nonummy tortor et metus. Aenean lacinia orci non risus. Aenean vulputate 
vel lectus. Aliquam erat volutpat. Duis diam.</p>
<h3>Subheading 2</h3>
<ul>
        <li>Proin sed turpis in urna varius venenatis. Morbi sit amet ligula 
        eget est semper tempor. Sed sodales, arcu quis semper iaculis, nibh 
        tortor feugiat purus, et dignissim turpis sem vitae sem. Morbi aliquet 
        purus eget tellus.</li>
        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean 
        enim justo, tincidunt sed, vestibulum sed, pretium eget, arcu.</li>
</ul>
<img alt="" height="288" src="HTML/images/msfp_smbus1_03.jpg" width="193" />
<p>Sed cursus dignissim urna. Vivamus pharetra neque nec turpis. Vivamus 
at metus.</p>
<p>Aenean fringilla mi et erat. Cum sociis natoque penatibus et magnis 
dis parturient montes, nascetur ridiculus mus.</p>
    
    
    
        <?php 
        //give the user some links so they can go forth and do stuff  
        if($userName !== ""){require_once("includes/basicFooter.html"); 
        } else {require_once("includes/STEBTfooter.html"); } 
        
            ?>
    </body>
</html>