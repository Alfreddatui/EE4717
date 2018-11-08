<?php
	include "./php/common/header.php";
	echo '
			<!DOCTYPE html>
			<html lang="en">
			<head>
					<title>Book a Facility</title>
					<meta charset="utf-8">
					<link rel="stylesheet" href="./styles/index.css">
			</head>
			<body>
	';
    echo '
	<div id="my-account-div">
		<div id="my-account-inside">
            <h1>My Account</h1>';

    include "./php/myaccount/sidebar.php";

    echo '
				<div id="facility-booking-content">
				<h1>Facility Booking</h1>
				<h3>Select the facility and the date of your preference:</h3>
				<form action="./timetable.php" method="POST" id="facility_form">
					<select name="facility">
						<option value="basketball">Basketball</option>
						<option value="tennis">Tennis</option>
						<option value="badminton">Badminton</option>
					</select>
					<input type="date" name="date" id="datetime">
					<input type="submit" value="Select">
				</form>
            </div>
		</div>
	</div>
	<script>
		var form = document.getElementById("facility_form");
		var datetime = document.getElementById("datetime");

		var today = new Date();
		var dd = today.getDate() + 1;
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();
		if(dd<10){
						dd="0"+dd
				} 
				if(mm<10){
						mm="0"+mm
				} 

		today = yyyy+"-"+mm+"-"+dd;
		datetime.setAttribute("min", today);

		form.addEventListener("submit", function(e) {
			e.preventDefault();
			if (datetime.value) {
				form.submit();
			} else {
				alert("Please choose a date");
			}
		});
	</script>
	</body>
	</html>';
	include "./php/common/footer.php";
?>