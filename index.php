<?php
    include "./php/common/header.php";
    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Lets Sport</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="./styles/index.css">
        </head>
        <body>
    ';
    include "./php/common/hero.php";
    echo '
        <div id="container">
            <div id="sub-menu">
                <h1>Our Facility</h1>
                <ul id="ul-sub-menu">
                    <li>
                        <div class="facility-div">
                            <img src="assets/basketball.jpg" class="facility-image">
                            <h3>Basketball</h3>
							<div class="facility-para">
								<p>A new modern basketball court ready for athlete to train themselves</p>
							</div>
                        </div>
                    </li>
                    <li>
                        <div class="facility-div">
                            <img src="assets/tennis.jpg" class="facility-image">
                            <h3>Tennis</h3>
							<div class="facility-para">
								<p>Tennis can be played as a sport or as a recreational activity with friends and family.</p>
							</div>
                        </div>
                    </li>
                    <li>
                        <div class="facility-div">
                            <img src="assets/badminton.jpg" class="facility-image">
                            <h3>Badminton</h3>
							<div class="facility-para">
								<p>Badminton is a racquet sport played using racquets to hit a shuttlecock across a net.</p>
							</div>
                        </div>
                    </li>
                    <li>
                        <div class="facility-div">
                            <img src="assets/swimming.jpg" class="facility-image">
                            <h3>Swimming</h3>
							<div class="facility-para">
								<p><span style="color: #DAA520">Member Only:</span><br>Swimming is the movement of the body through water using arms and legs.</p>
							</div>
                        </div>
                    </li>
                    <li>
                        <div class="facility-div">
                            <img src="assets/gym.jpg" class="facility-image">
                            <h3>Gym</h3>
							<div class="facility-para">
								<p><span style="color: #DAA520">Member Only:</span><br>A place, typically a private club, providing a range of facilities designed to improve and maintain physical fitness and health.</p>
							</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="container2">
                <div id="div_rates">
                    <div id="show_rates">
                        <h1>Our Rates</h1>
                        <table id="rates_table" border="1">
                            <thead>
                                <tr>
                                    <th rowspan="2">Facility</th>
                                    <th colspan="2">Price per hour</th>
                                </tr>
                                <tr>
                                    <th>Member</th>
                                    <th>Non-Member</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>BasketBall</td>
                                    <td>$30</td>
                                    <td>$39</td>
                                </tr>
                                <tr>
                                    <td>Tennis</td>
                                    <td>$9.50</td>
                                    <td>$12.40</td>
                                </tr>
                                <tr>
                                    <td>Badminton</td>
                                    <td>$7.40</td>
                                    <td>$9.70</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>';
    include "./php/common/footer.php";
    echo '
        </div>
        </body>
        </html>
    '
?>