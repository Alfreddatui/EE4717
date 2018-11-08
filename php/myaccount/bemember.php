<?php
	include "../dbconnect.php";
  session_start();
  $user_id=$_SESSION['user_id'];
  $sql = "UPDATE letssport SET Member='1' WHERE id='$user_id'";
  if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
	header("location: ../../membership.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>