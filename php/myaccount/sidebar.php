<?php
    $html = '
    <div id="sidebar">
        <ul id="ul-sidebar">
            <li>
                <a href="./myAccount.php" id="my-account"><b>Profile</b></a>
            </li>
            <hr>
            <li>
                <a href="./mybooking.php" id="mybooking"><b>My Booking</b></a>
            </li>
            <hr>
            <li>
                <a href="./facilityBooking.php" id="facility-booking"><b>Facility Booking</b></a>
            </li>
            <hr>
            <li>
                <a href="./membership.php"><b>Membership</b></a>
            </li>
        </ul>
    </div>
    <script>
        const pathname = window.location.pathname;
        const currentTab = pathname.split("/")[3];
        switch(currentTab) {
            case "myAccount.php":
                document.getElementById("my-account").classList.add("selected");
                break;
            case "facilityBooking.php":
                document.getElementById("facility-booking").classList.add("selected");
                break;
            case "timetable.php":
                document.getElementById("facility-booking").classList.add("selected");
                break;
            case "mybooking.php":
                document.getElementById("mybooking").classList.add("selected");
                break;
        }
    </script>';
    echo $html;
?>