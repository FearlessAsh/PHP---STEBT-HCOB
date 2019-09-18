<?php
if (isset($_SESSION['userName'])) { 
    $ProperName = "Hello, " . $_SESSION['firstName'] . " ". $_SESSION['lastName']; 
    $signUp = "";
    $homeLink = "loggedInHomePage.php#TopItems";
    $logOut = " &nbsp; <a href='logOut.php'>  Log Out  </a>";
    
    if (isset($_SESSION['status'])) { $verification = $_SESSION['status'];}
    else {$verification = 'N'; $_SESSION['status'] = "";}
    if (isset($_SESSION['userType'])) {$userType = $_SESSION['userType'];}
    else {$userType = "N";}
    
    if($userType == 'S' AND $verification == 'V'){
    $services = "<a href='CategoryServices.php#Services'> Services </a> ";
    } else { $services = "";}
    
}
else { 
    $ProperName = "Please <a href = 'loginForm.php'>Login</a>"; 
    $signUp = "<a href = 'createAccount.php'>Sign Up</a>";
    $homeLink = "index.php#TopItems";
    $logOut = "";
    $services = "";
}


?>

<!-- Begin Container -->
<div id="container" class="auto-style8" style="width: 860px">
	<!-- Begin Masthead -->
	<div id="masthead" style="width: 860px">
		<a href="loggedInHomePage.php#TopItems"><img alt="" height="66" src="images/logo.gif" width="180px" /></a><p class="auto-style5">
		<?php print($signUp); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php print($ProperName . $logOut); ?> </p>
		<p class="auto-style6">&nbsp; Connect with Us</p>
	</div>
	<!-- End Masthead -->
	<!-- Begin Navigation -->
	<div id="navigation">
			
		<ul>
			<li style="width: 180px; color: #545454 "> . </li>
			<li ><a href="loggedInHomePage.php#TopItems">Home</a></li>
			<li ><a href="HTMLaboutUs.php">About</a></li>
			<li ><a href="HTMLhowItWorks.php">How It Works</a></li>
			<li ><a href="HTMLfinanceInfo.php">Financial Info</a></li>
			<li ><a href="HTMLacknowledgement.php">Acknowledgement</a></li>
			<li ><a href="HTMLblog.php">Blog</a></li>
			<li ><a href="HTMLcontact.php">Contact</a></li>
			<li ><a href="HTMLfaq.php">FAQ</a></li>
			<li style="width: 100px"> </li>
		</ul>


	</div>
	<!-- End Navigation -->
	<!-- Begin Page Content -->
	<div id="page_content" style="height:auto;">
		<!-- Begin Left Column -->
		<div id="left-nav" style="left: 0px; top: 0px; width: 160px; height: 800px;">
			<h2>Categories</h2>
                        <p>&nbsp;</p>
			<p> <a href='CategoryComputers.php#Computers'> Computers </a> </p>
			<p>&nbsp;</p>
			<p><a href='CategoryClothing.php#Clothing'> Clothing </a> </p>
			<p>&nbsp;</p>
			<p><a href='CategoryElectronics.php#Electronics'> Electronics </a> </p>
			<p>&nbsp;</p>
			<p><a href='CategoryBooks.php#Books'> Books </a> </p>
			<p>&nbsp;</p>
			<p><a href='CategoryHomeDecor.php#Home Decor'> Home Decor </a> </p>
			<p>&nbsp;</p>
			<p><a href='CategoryMisc.php#Miscellaneous'> Miscellaneous </a> </p>
			<p>&nbsp;</p>
			<p><?php print($services); ?></p>
			<p>&nbsp;</p>
                        <p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>


			</div>
		<!-- End Left Column -->
		<!-- Begin Right Column -->
		<div id="main-content" style="left: 200px; width: 665px; height: auto;">
                    <?php if (isset($_SESSION['userName'])){require_once("searchBar.php");} ?>