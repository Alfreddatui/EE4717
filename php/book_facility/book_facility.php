<?php
	include "../dbconnect.php";
  session_start();
  
  $user_id = $_SESSION["user_id"];
  $facility_id = $_POST["facility"];
  $date = $_POST["date"];
  $time = $_POST["time"];

  # CHECK A USER ALREADY BOOK 2 HOURS;
  $sql_check = "SELECT * FROM booking WHERE user_id = $user_id AND datetime between '$date' and '$date 23:59:59';";
  $check = mysqli_query($conn,$sql_check) or die("Error: ".mysqli_error($conn));
  $count = mysqli_num_rows($check);

  if ($count < 2) {
    $sql = "INSERT INTO booking (datetime, user_id, facility_id) VALUES ('$date $time:00', $user_id, $facility_id)";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
      $sql_facility = "SELECT * FROM facility WHERE id = $facility_id";
      $result = mysqli_query($conn, $sql_facility) or die("Error: ".mysqli_error($conn));
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $to = 'f33ee@localhost';
      $subject = 'booking facility Just Sport';
      $message = 'Your booking is confirmed with the details below:
      Date = ' . $date . ' ' . $time . '
      Facility = ' .$row["Type"] . '
      ';
      $headers = 'From: f33ee@localhost' . '\r\n' . 'Reply-To: f33ee@localhost' . '\r\n' . 'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers, '-ff33ee@localhost');
      echo "
        <script>
          alert('Booking Confirmed');
          window.location.href = '../../myAccount.php';
        </script>
      ";
    } else {
      $eerror = mysqli_error($conn);
      echo "
        <script>
          alert('Booking Failed Error: $eerror');
          // window.location.href = '../../facilityBooking.php';
        </script>
      ";
    }
  } else {
    echo "
      <script>
        var hostname = window.location.hostname;
        var pathnames = window.location.pathname.split('/');
        var stringpath = hostname + '/';
        for (var i = 1; i < pathnames.length - 1; i++) {
          stringpath += pathnames[i] + '/';
        }
        alert('Booking limit exceed');
        window.location.href = '../../facilityBooking.php';
      </script>
    ";
  }
?>