<?php
	session_start();
	include "./php/dbconnect.php";
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM letssport WHERE id='$user_id'";
	$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
	$row=mysqli_fetch_array($result);
	echo '
			<!DOCTYPE html>
			<html lang="en">
			<head>
					<title>Membership</title>
					<meta charset="utf-8">
					<link rel="stylesheet" href="./styles/index.css">
			</head>
			<body>
	';
	include "./php/common/header.php";
    echo '
	<div id="my-account-div">
		<div id="my-account-inside">
            <h1>My Account</h1>';

    include "./php/myaccount/sidebar.php";

    echo '
            <div id="my-account-content">
                <h1>Membership</h1>
		';
		if ($row['Member']==0){
			echo '<h2>LetsSport facilities are conveniently located throughout Singapore. Sign up for your LetsSport membership for just $10/month to enjoy the following privileges:</h2>
				<ul>
					<li>Enjoy discounted fare for booking of facilities</li>
					<li>Complimentary trial classes</li>
					<li>Invitation to exclusive members events</li>
				</ul>
				<br>
				<h3>You can sign up for membership by selecting button below</h3>
				<form action="php/myaccount/bemember.php" method="POST" id="submit_form">
				<input type="submit" name="member" value="Be Member!" >
				</form>

				<script>
				var form = document.getElementById("submit_form");
				form.addEventListener("submit", function(e) {
					e.preventDefault();
					if (confirm("Membership fee $10 will be deducted to your credit card monthly")) {
						form.submit();
					}
				});
			</script>
				';
		}
		else{
			echo '<h2>Welcome to LetsSport Membership</h2>';
		}
			echo '
            </div>
		</div>
	</div>	
	</body>
	</html>';
	include "./php/common/footer.php";
 ?>