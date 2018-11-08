<?php
	session_start();
	include "./php/dbconnect.php";
	$user_id = $_SESSION["user_id"];
	$sql = "SELECT * FROM booking INNER JOIN facility ON facility.id = booking.facility_id WHERE user_id='$user_id'";
	$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
	echo '
			<!DOCTYPE html>
			<html lang="en">
			<head>
					<title>My Booking</title>
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
					<h1>My Booking</h1>
					<div id="show-booking">
					<table>
						<tr>
							<td><h2>Type of facility</h2></td>
							<td><h2>Date and Time<h2></td>
						</tr>';
						if (mysqli_num_rows($result) > 0) {
			
							while($row = mysqli_fetch_array($result)) {
								echo "<tr><td>". $row["Type"]. "</td><td>". $row["datetime"]. "</td></tr>";
							}
						} else {
							echo "<tr><td colspan='2' text-align='center'>No Results</td></tr>";
						}
						echo '
					</table>
				</div>
            </div>
		</div>
	</div>	
	</body>
	</html>';
	include "./php/common/footer.php";
 ?>