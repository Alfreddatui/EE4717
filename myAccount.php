<?php
	session_start();
	include "./php/dbconnect.php";
	$user_id = $_SESSION["user_id"];
	$sql = "SELECT * FROM letssport WHERE id='$user_id'";
	$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
	$row=mysqli_fetch_array($result);
	echo '
			<!DOCTYPE html>
			<html lang="en">
			<head>
					<title>My Account</title>
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
                <h1>My Profile</h1>
				<div id="show-profile">
				<table>
				<tr>
					<td><h3>Full Name:<h3></td>
					<td>'.sprintf('%s', $row["FullName"]).'</td>
				</tr>
				<tr>
					<td><h3>User Name:<h3></td>
					<td>'.sprintf('%s', $row["UserName"]).'</td>
				</tr>
				<tr>
					<td><h3>Email:<h3></td>
					<td>'.sprintf('%s', $row["Email"]).'</td>
				</tr>
				<tr>
					<td><h3>Contact No:<h3></td>
					<td>'.sprintf('%s', $row["HP"]).'</td>
				</tr>
				<tr>
					<td><h3>Birthday:</td>
					<td>'.sprintf('%s', $row["Birthday"]).'</td>
				</tr>
				</table>
				</div>
            </div>
		</div>
	</div>	
	</body>
	</html>';
	include "./php/common/footer.php";
 ?>