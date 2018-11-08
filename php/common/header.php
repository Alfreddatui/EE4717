<?php ob_start(); ?>
<?php
    session_start();
    $user_id = $_SESSION['user_id'];
    $login_logout = '';
    if (!$user_id) {
        $login_logout = '
            <a href="index.php" class="nav_link">
                <div class="navbar_menu">
                    Home
                </div>
            </a>
            <a href="#div_rates" class="nav_link">
                <div class="navbar_menu">
                    Rates
                </div>
            </a>
            <a href="#footer_div" class="nav_link">
                <div class="navbar_menu">
                    Contact
                </div>
            </a>
            <a href="javascript:openForm()" class="nav_link">
                <div class="navbar_menu">
                    Login
                </div>
            </a>
        ';
        $url = explode("/", $_SERVER['REQUEST_URI'])[3];
        
        if ($url != 'index.php' && $url != 'signup.php') {
            echo "
                    <script>
                        window.location.href = './index.php';
                    </script>
                ";
        }
    } else {
        $login_logout = '
        
        <a href="index.php" class="nav_link">
            <div class="navbar_menu">
                Home
            </div>
        </a>
        <a href="myAccount.php" class="nav_link">
            <div class="navbar_menu">
                My Account
            </div>
        </a>
            <a href="./php/authentication/logout.php" class="nav_link">
                <div class="navbar_menu">
                    Logout
                </div>
            </a>
        ';
    }
    $html = '
        <nav>
            <div id="nav_container">
                <div id="logo_div">
                    <a href="index.php">
                        <img src="./assets/LOGO.png" id="logo">
                    </a>
                </div>
                <div id="navbar">
                ' . $login_logout . '
					<div class="form-popup" id="myForm">
						<form action="./php/authentication/login_user.php" method="post" class="form-container">
						<h1>Login</h1>

						<label for="username"><b>Username</b></label>
						<input type="text" placeholder="Enter Username" name="username" required>

						<label for="password"><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="password" required>

						<button type="submit" class="btn">Login</button>
						<button type="button" class="btn New" onclick="SignForm()">Sign Up</button>
						<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
						</form>
					</div>
                </div>
			</div>
		<script>
			function openForm() {
				document.getElementById("myForm").style.display = "block";
			}

			function closeForm() {
				document.getElementById("myForm").style.display = "none";
			}
			function SignForm(){
				document.location="signup.php";
			}
		</script>
        </nav>

    ';
    echo $html;
?>
<?php ob_flush(); ?>