<?php
//this class handles all of the form showing and "stickyness"

function changeItemFormStudent($itemName, $category, $description, $picture, 
                        $price, $service, $item ) {
		?>
		<form name="changeItemFormStudent" id="changeItemFormStudent" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1>Change an Item or Service</h1>
				Item Name: <input type="text" name="itemName"
				value="<?php print($itemName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                
                                Category: <select name="category" id ='category'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Category</option>
                                <option value='Computers'>Computers</option>
                                <option value='Clothing'>Clothing</option>
                                <option value='Electronics'>Electronics</option>
                                <option value='Books'>Books</option>
                                <option value='Home Decor'>Home Decor</option>
                                <option value='Miscellaneous'>Miscellaneous</option>
                                </select>
				<br>
                                
                                Description: <input type="text" name="description"
				value="<?php print($description); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Picture: <input type="text" name="picture"
				value="<?php print($picture); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Price: <input type="text" name="price" 
				value="<?php print($price); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Item or Service?
                                <br>
                                <input type="radio" name="itemStatus" 
				value="Service"
                                <?php print($service); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Service
                                <br>
                                <input type="radio" name="itemStatus" 
				value="Item"
                                <?php print($item); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Item
				<br>
                                
                                
				<input type="submit" name="submit" 
                                value="Change Item" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
                                <input type="submit" name="deletesubmit" 
                                value="Delete Item" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}
          
                
                
                
                
function changeItemForm($itemName, $category, $description, $picture, 
                        $price, $service, $item ) {
		?>
		<form name="changeItemForm" id="changeItemForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1>Change an Item or Service</h1>
				Item Name: <input type="text" name="itemName"
				value="<?php print($itemName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Category: <select name="category" id ='category'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Category</option>
                                <option value='Computers'>Computers</option>
                                <option value='Clothing'>Clothing</option>
                                <option value='Electronics'>Electronics</option>
                                <option value='Books'>Books</option>
                                <option value='Home Decor'>Home Decor</option>
                                <option value='Miscellaneous'>Miscellaneous</option>
                                </select>
				<br>
                                
                                Description: <input type="text" name="description"
				value="<?php print($description); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Picture: <input type="text" name="picture"
				value="<?php print($picture); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Price: <input type="text" name="price" 
				value="<?php print($price); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                <?php $service = ''; $item = 'Item'; ?>
                                
				<input type="submit" name="submit" 
                                value="Change Item" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
                                <input type="submit" name="deletesubmit" 
                                value="Delete Item" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}
                
                
                
function createItemFormStudent($itemName, $category, $description, $picture, 
                        $price, $service, $item ) {
		?>
		<form name="createItemFormStudent" id="createItemFormStudent" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1>Create an Item or Service</h1>
				Item Name: <input type="text" name="itemName"
				value="<?php print($itemName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                
                                Category: <select name="category" id ='category'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Category</option>
                                <option value='Computers'>Computers</option>
                                <option value='Clothing'>Clothing</option>
                                <option value='Electronics'>Electronics</option>
                                <option value='Books'>Books</option>
                                <option value='Home Decor'>Home Decor</option>
                                <option value='Miscellaneous'>Miscellaneous</option>
                                </select>
				<br>
                                
                                Description: <input type="text" name="description"
				value="<?php print($description); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Picture: <input type="text" name="picture"
				value="<?php print($picture); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Price: <input type="text" name="price" 
				value="<?php print($price); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Item or Service?
                                <br>
                                <input type="radio" name="itemStatus" 
				value="Service"
                                <?php print($service); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Service
                                <br>
                                <input type="radio" name="itemStatus" 
				value="Item"
                                <?php print($item); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Item
				<br>
                                
                                
				<input type="submit" name="submit" 
                                value="Create Item" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}
                
function createItemForm($itemName, $category, $description, $picture, 
                        $price, $service, $item ) {
		?>
		<form name="createItemForm" id="createItemForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1>Create an Item or Service</h1>
				Item Name: <input type="text" name="itemName"
				value="<?php print($itemName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Category: <select name="category" id ='category'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Category</option>
                                <option value='Computers'>Computers</option>
                                <option value='Clothing'>Clothing</option>
                                <option value='Electronics'>Electronics</option>
                                <option value='Books'>Books</option>
                                <option value='Home Decor'>Home Decor</option>
                                <option value='Miscellaneous'>Miscellaneous</option>
                                </select>
				<br>
                                
                                Description: <input type="text" name="description"
				value="<?php print($description); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Picture: <input type="text" name="picture"
				value="<?php print($picture); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Price: <input type="text" name="price" 
				value="<?php print($price); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                <?php $service = ''; $item = 'Item'; ?>
                                
				<input type="submit" name="submit" 
                                value="Create Item" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}                

function createAccountForm($firstName, $lastName, $email, $userName, 
                        $password, $password2, $zipCode, $studentYes, $studentNo, $recoveryAnswer ) {
		?>
		<form name="createAccountForm" id="createAccountForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1> Please input the required information</h1>
				First Name: <input type="text" name="firstName"
				value="<?php print($firstName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Last Name: <input type="text" name="lastName"
				value="<?php print($lastName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Email Address: <input type="text" name="email"
				value="<?php print($email); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                User Name: <input type="text" name="userName"
				value="<?php print($userName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Password: <input type="password" name="password" 
				value="<?php print($password); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Re-enter your Password: <input type="password" 
                                name="password2" 
				value="<?php print($password2); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Password Recovery Question: 
                                <select name="recoverySelect" id ='recoverySelect'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Question</option>
                                <option value='What was your Mothers maiden name?'>What was your Mother's maiden name?</option>
                                <option value='Where were you born?'>Where were you born?</option>
                                <option value='What was the first street you lived on?'>What was the first street you lived on?</option>
                                <option value='What was your first pets name?'>What was your first pet's name?</option>
                                <option value='What was your first mascot?'>What was your first mascot?</option>
                                <option value='What was your first car?'>What was your first car?</option>
                                </select>
                                
                                <input type="text" name="recoveryAnswer"
				value="<?php print($recoveryAnswer); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Zip Code: <input type="text" name="zipCode" 
				value="<?php print($zipCode); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Are you a Student?
                                <br>
                                <input type="radio" name="studentStatus" 
				value="Yes"
                                <?php print($studentYes); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Yes
                                <br>
                                <input type="radio" name="studentStatus" 
				value="No"
                                <?php print($studentNo); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> No
				<br>
                                
                                
				<input type="submit" name="submit" 
                                value="Create Account" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}
                
function createStudentAccountForm($schoolEmail, $school, $expGradMonth, 
                        $expGradYear, $major, $currEnrollYes, $currEnrollNo) {
		?>
		<form name="createStudentAccountForm" id="createStudentAccountForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1> Please input the required additional information</h1>
				School Email: <input type="text" name="schoolEmail"
				value="<?php print($schoolEmail); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                School: <input type="text" name="school"
				value="<?php print($school); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Expected Graduation Date: 
                                <select name="monthSelect" id ='monthSelect'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Month</option>
                                <option value='JAN'>January</option>
                                <option value='FEB'>February</option>
                                <option value='MAR'>March</option>
                                <option value='APR'>April</option>
                                <option value='MAY'>May</option>
                                <option value='JUN'>June</option>
                                <option value='JUL'>July</option>
                                <option value='AUG'>August</option>
                                <option value='SEP'>September</option>
                                <option value='OCT'>October</option>
                                <option value='NOV'>November</option>
                                <option value='DEC'>December</option>
                                </select>
                                
                                <input type="text" name="gradYear"
				value="<?php print($expGradYear); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Major: <input type="text" name="major"
				value="<?php print($major); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Are you currently enrolled?
                                <br>
                                <input type="radio" name="enrollStatus" 
				value="Yes"
                                <?php print($currEnrollYes); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Yes
                                <br>
                                <input type="radio" name="enrollStatus" 
				value="No"
                                <?php print($currEnrollNo); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> No
				<br>
                                
                                
				<input type="submit" name="submit" 
                                value="Create Account" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
                                <br>
                                <input type="submit" name="logIn"
                                value="Login" formaction="loginForm.php"
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}

                

		function loginForm($userName, $password) {
		?>
		<form name="loginForm" id="loginForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
				Username: <input type="text" name="username"
				value="<?php print($userName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
				Password: <input type="password" name="password" 
				value="<?php print($password); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
				<input type="submit" name="submit" value="Login" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
                                <input type="submit" name="createAccount"
                                value="Create Account" formaction="createAccount.php"
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
                                <input type="submit" name="forgotPassword"
                                value="Forgot Password" formaction="forgotPasswordForm.php"
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}     
                
function editAccountFormStudent ($firstName, $lastName, $email,
                        $password, $password2, $zipCode, $schoolEmail, $school, $expGradYear,
                        $major, $currEnrollYes, $currEnrollNo, $recoveryAnswer ) {
		?>
		<form name="editAccountFormStudent" id="editAccountFormStudent" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1> Please edit the required information </h1>
				First Name: <input type="text" name="firstName"
				value="<?php print($firstName); ?>" 
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Last Name: <input type="text" name="lastName"
				value="<?php print($lastName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Email Address: <input type="text" name="email"
				value="<?php print($email); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Password: <input type="password" name="password" 
				value="<?php print($password); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Re-enter your Password: <input type="password" 
                                name="password2" 
				value="<?php print($password2); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Password Recovery Question: 
                                <select name="recoverySelect" id ='recoverySelect'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Question</option>
                                <option value='What was your Mothers maiden name?'>What was your Mother's maiden name?</option>
                                <option value='Where were you born?'>Where were you born?</option>
                                <option value='What was the first street you lived on?'>What was the first street you lived on?</option>
                                <option value='What was your first pets name?'>What was your first pet's name?</option>
                                <option value='What was your first mascot?'>What was your first mascot?</option>
                                <option value='What was your first car?'>What was your first car?</option>
                                </select>
                                
                                <input type="text" name="recoveryAnswer"
				value="<?php print($recoveryAnswer); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Zip Code: <input type="text" name="zipCode" 
				value="<?php print($zipCode); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                School Email: <input type="text" name="schoolEmail"
				value="<?php print($schoolEmail); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                School: <input type="text" name="school"
				value="<?php print($school); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Expected Graduation Date: 
                                <select name="monthSelect" id ='monthSelect'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Month</option>
                                <option value='JAN'>January</option>
                                <option value='FEB'>February</option>
                                <option value='MAR'>March</option>
                                <option value='APR'>April</option>
                                <option value='MAY'>May</option>
                                <option value='JUN'>June</option>
                                <option value='JUL'>July</option>
                                <option value='AUG'>August</option>
                                <option value='SEP'>September</option>
                                <option value='OCT'>October</option>
                                <option value='NOV'>November</option>
                                <option value='DEC'>December</option>
                                </select>
                                
                                <input type="text" name="gradYear"
				value="<?php print($expGradYear); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Major: <input type="text" name="major"
				value="<?php print($major); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Are you currently enrolled?
                                <br>
                                <input type="radio" name="enrollStatus" 
				value="Yes"
                                <?php print($currEnrollYes); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> Yes
                                <br>
                                <input type="radio" name="enrollStatus" 
				value="No"
                                <?php print($currEnrollNo); ?>
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';"> No
				<br>
                                
                                
				<input type="submit" name="submit" 
                                value="Create Account" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}
                
function editAccountForm($firstName, $lastName, $email,
                        $password, $password2, $zipCode, $recoveryAnswer ) {
		?>
		<form name="editAccountForm" id="editAccountForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
                            <h1> Please edit the required information </h1>
				First Name: <input type="text" name="firstName"
				value="<?php print($firstName); ?>" 
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Last Name: <input type="text" name="lastName"
				value="<?php print($lastName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Email Address: <input type="text" name="email"
				value="<?php print($email); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
				Password: <input type="password" name="password" 
				value="<?php print($password); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Re-enter your Password: <input type="password" 
                                name="password2" 
				value="<?php print($password2); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Password Recovery Question: 
                                <select name="recoverySelect" id ='recoverySelect'
                                onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                <option value='NULL'>Select a Question</option>
                                <option value='What was your Mothers maiden name?'>What was your Mother's maiden name?</option>
                                <option value='Where were you born?'>Where were you born?</option>
                                <option value='What was the first street you lived on?'>What was the first street you lived on?</option>
                                <option value='What was your first pets name?'>What was your first pet's name?</option>
                                <option value='What was your first mascot?'>What was your first mascot?</option>
                                <option value='What was your first car?'>What was your first car?</option>
                                </select>
                                
                                <input type="text" name="recoveryAnswer"
				value="<?php print($recoveryAnswer); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Zip Code: <input type="text" name="zipCode" 
				value="<?php print($zipCode); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                
				<input type="submit" name="submit" 
                                value="Create Account" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
			</center>
		</form>
		
		<?php
		}
                
function forgotPasswordForm($userName){
    ?>
                <form name="forgotPasswordForm" id="forgotPasswordForm" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
				User Name: <input type="text" name="username"
				value="<?php print($userName); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
				<br>
				<input type="submit" name="submit" value="Submit" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
			</center>
		</form>
<?php
}

function displaySecurityAnswer(){
    ?>
                <form name="securityAnswer" id="securityAnswer" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
				Answer: <input type="text" name="answer"
				value=""
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
				<br>
				<input type="submit" name="submit" value="Submit" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
			</center>
		</form>
<?php
    
}

function pickNewPassword($password, $password2){
    
    ?>
                <form name="newPassword" id="newPassword" 
			action="<?php $_SERVER["SCRIPT_NAME"] ?>"
			method = "POST">
			<br>
			<center>
				Password: <input type="password" name="password" 
				value="<?php print($password); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
				<br>
                                
                                Re-enter your Password: <input type="password" 
                                name="password2" 
				value="<?php print($password2); ?>"
				onFocus="this.style.background = '#ffffff';" 
				onBlur="this.style.background = '#bfbfbf';">
                                
                                
				<br>
				<input type="submit" name="submit" value="Submit" 
				onClick="Login(this.form);" 
				onMouseOver="this.style.color = '#404040';" 
				onMouseOut="this.style.color = '#000000';" 
				onFocus ="this.style.color = '#404040';" 
				onBlur="this.style.color = '#000000';">
                                
			</center>
		</form>
<?php
    
    
    
}