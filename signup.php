<?php
	include "./php/common/header.php";
	echo '
			<!DOCTYPE html>
			<html lang="en">
			<head>
					<title>Sign Up Lets Sport</title>
					<meta charset="utf-8">
					<link rel="stylesheet" href="./styles/index.css">
			</head>
			<body>
	';
	$html = '
	<div id="signup-div">
		<div id="signup-inside">
			<h1>Sign up for Lets Sport</h1>
		
			<form action="php/Add_New_User.php" method="post" id="signup_form">
				<table border="0">
				<tr>
					<td>Full Name</td>
					<td><input type="text" name="fullname" maxlength="30" size="30" required></td>
				</tr>
				<tr>
					<td>User Name</td>
					<td> <input type="text" name="username" maxlength="30" size="30" required></td>
				</tr>
				<tr>
					<td>Email</td>
					<td> <input type="email" name="email" maxlength="30" size="30" required></td>
				</tr>
				<tr>
					<td>Contact No:</td>
					<td><input type="text" name="hp" pattern="[0-9]{8}" size="15" required></td>
				</tr>
				<tr>
					<td>Birthday</td>
					<td><input type="date" name="birthday" required id="birthday"></td>
				</tr>
					<td>Password</td>
					<td><input type="password" name="password" maxlength="15" size="15" required id="password1" onchange="testPassword()"></td>
				</tr>
					<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="password2" maxlength="15" size="15" required id="password2" onchange="testPassword()"></td>
				</tr>
				<tr>
					<td></td>
					<td id="password_error"><span style="color: red">*Password does not match</span></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Sign Up" disabled id="submit_button">
					<input type="reset" name= "reset" value="Reset">
					<a href="index.php"><button type="button">Cancel</button></a></td>
				</tr>
				</table>
			</form>
		</div>
	</div>
	<script>
		var password1 = document.getElementById("password1");
		var password2 = document.getElementById("password2");
		var submitButton = document.getElementById("submit_button");
		var form = document.getElementById("signup_form");
		var errorMessage = document.getElementById("password_error");

		function testPassword() {
			if (password1.value && password2.value) {
				submitButton.disabled = false;
			} else {
				submitButton.disabled = true;
			}
		}

		form.addEventListener("submit", function(e) {
			e.preventDefault();
			if (password1.value != password2.value) {
				errorMessage.style.display = "inline-block";
			} else {
				form.submit();
			}
		});

		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear() - 17;
		if(dd<10){
						dd="0"+dd
				} 
				if(mm<10){
						mm="0"+mm
				} 

		today = yyyy+"-"+mm+"-"+dd;
		document.getElementById("birthday").setAttribute("max", today);
	</script>
	
	</body>
	</html>';

	echo $html;
	include "./php/common/footer.php";
?>