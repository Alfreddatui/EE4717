<?php
	session_start();
	include "dbconnect.php";

	$fullname=$_POST['fullname'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$hp=(int)$_POST['hp'];
	$birthday=$_POST['birthday'];
	$password=md5($_POST['password']);

	$sql = "INSERT INTO letssport (FullName, UserName, Email, HP, Birthday, Password, Member) VALUES('$fullname', '$username', '$email','$hp', '$birthday' ,'$password','0')";

	if (mysqli_query($conn, $sql)) {
		$_SESSION['user_id'] = $conn->insert_id;
		echo "
			<script>
				alert('User Created');
				window.location.href = '../myAccount.php';
			</script>
		";
	} else {
		$error_strings = mysqli_error($conn);
		echo '
			<script>
				alert("ERROR: ' . $error_strings . '");
				window.history.back();
			</script>
		';
	}

	mysqli_close($conn);
?>