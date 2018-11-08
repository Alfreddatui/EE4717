<?php ob_start(); ?>
<?php
	session_start();
	include "../dbconnect.php";
   
	//if ((isset($_POST['password'])) && (isset($_POST['username'])))
	//{
	//	$username=$_POST['username'];
	//	$password=$_POST['password'];

	if ((isset($_POST['password'])) && (isset($_POST['username'])))
	{
		$myusername = mysqli_real_escape_string($conn,$_POST['username']);
		$mypassword = md5(mysqli_real_escape_string($conn,$_POST['password']));
      
	  $sql = "SELECT * FROM letssport WHERE UserName = '$myusername' and Password = '$mypassword'";

		$result = mysqli_query($conn,$sql) or die("Error: ".mysqli_error($conn));
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$count = mysqli_num_rows($result);
		
		// If result matched $myusername and $mypassword, table row must be 1 row
	
		if($count == 1) {
		if ($row['Member']==0)
			$strMember="No";
		else
			$strMember="Yes";
		 //session_register("myusername");
		 $_SESSION['user_id'] = $row["id"];
         $_SESSION['login_user'] = $myusername;
         echo "Welcome " . $row["FullName"]. " - Membership: " . $strMember;
         header("location: ../../index.php");
      }
		else
		echo "
        <script>
          alert('Account is invalid, please check your username and password');
          window.location.href = '../../index.php';
        </script>
      ";
	}
?>
<?php ob_flush(); ?>