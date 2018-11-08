<?php
	session_start();
	include "php/dbconnect.php";

	if ((isset($_POST['date'])) && (isset($_POST['facility'])))
	{
		$date = $_POST['date'];
		$facility = $_POST['facility'];
		$timing = array();

		$sql = 'SELECT DATE_FORMAT(datetime, "%H:%i") as timing, facility_id FROM `booking` INNER JOIN facility ON facility.id = booking.facility_id WHERE facility.Type = "' . $facility . '" AND datetime between \'' . $date . '\' and \'' . $date . ' 23:59:59\';';
		$result = mysqli_query($conn, $sql) or die("Error: ".mysqli_error($conn));

		if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					array_push($timing, $row["timing"]);
				}
		}
	}

	$sql2 = 'SELECT * FROM facility WHERE Type = "' . $facility . '"';
	$result_facility = mysqli_query($conn,$sql2) or die("Error: ".mysqli_error($conn));
	$row2 = mysqli_fetch_array($result_facility,MYSQLI_ASSOC);

	$facility_id = $row2['id'];

	$available_period = array(
		"08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00"
	);
	$available_period = array_diff($available_period, $timing);
	$available_period_html = "";

	foreach ($available_period as &$value) {
		$hour = explode(":", $value)[0];
		$next_hour = strval($hour + 1);
		if (strlen($next_hour) == 1) {
			$next_hour = "0" . $next_hour;
		}
		$next_value = $next_hour . ":00";
		$available_period_html .= '<option value="' . $value . '">' . "$value - $next_value" . '</option>';
	}

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
	include "./php/common/header.php";
    echo '
	<div id="my-account-div">
		<div id="my-account-inside">
            <h1>My Account</h1>';

    include "./php/myaccount/sidebar.php";

    echo '
			<div id="facility-booking-content">
				<h1>Facility Booking</h1>
				<h3>Select the facility and the date of your preference:</h3>
				<form action="./php/book_facility/book_facility.php" method="POST" id="submit_form">
					<select name="facility" disabled>
						<option value="basketball" ' . ($facility == "basketball" ? "selected" : "") . '>Basketball</option>
						<option value="tennis" ' . ($facility == "tennis" ? "selected" : "") . '>Tennis</option>
						<option value="badminton" ' . ($facility == "badminton" ? "selected" : "") . '>Badminton</option>
					</select>
					<input type="hidden" name="facility" value=' . $facility_id . '>
					<input type="date" name="date" value="' . $date . '" readonly>
					<br>
					<br>
					Available hour (maximum 2 hour per day):
					<br>
					<select name="time">
						' . $available_period_html . '
					</select>
					<br>
					<br>
					<input type="submit" value="Book">
				</form>
			</div>
		</div>
	</div>
	<script>
		var form = document.getElementById("submit_form");
		form.addEventListener("submit", function(e) {
			e.preventDefault();
			if (confirm("Are you sure want to book this facility? The payment will be deducted directly from your credit card")) {
				form.submit();
			}
		});
	</script>
	</body>
	</html>';
	include "./php/common/footer.php";
?>