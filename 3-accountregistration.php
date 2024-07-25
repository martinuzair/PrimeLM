<?php 

require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration</title>
    <link rel="stylesheet" href="adminthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>
        <div class="accountregistration_box">
            <div class="registrationbox-title">
                Enter User Details
            </div><br>
            <div class="user-details">
                <form id="registration_form" action="includes/signup.inc.php" method="post">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="text" id="full_name" name="full_name" data-custom="specific" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nric">NRIC:</label>
                        <input type="text" id="nric" name="nric" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" data-custom="specific" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="p_word" name="password" required>
                    </div>
               
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role">
                            <option value="Student">Student</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input type="checkbox" id="agree_terms" name="agree_terms" required>
                        <label for="agree_terms">I agree to the terms and conditions and privacy statement.</label>
                    </div>
                    
                    <input id="SubmitDetails" type="Submit" value="Confirm Details and Submit">
                </form>

                <?php
                check_signup_errors();
                ?>

            </div>
        </div>
    </center>
    <div class="top-left">
        <figure>
            <img src="images.png/TransPrimeLM.png" alt="">
        </figure>
    </div>
    

    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img class="resize" src="images.png/TransPrimeLM.png" alt="">
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <div class="user">
            <img src="images.png/profile-pic.png" alt="me" class="user-img">
            <div>
                <p class="bold">Name</p>
                <p>Administrator</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="3-accountregistration.php">
                    <i class='bx bxs-user-plus'></i>
                    <span class="nav-item">Register Account</span>
                </a>
                <span class="tooltip">Register Account</span>
            </li>
			<li>
                <a href="4-accdelete.php">
                    <i class='bx bxs-user-x'></i>
                    <span class="nav-item">Delete Account</span>
                </a>
                <span class="tooltip">Delete Account</span>
            </li>
            <li>
                <a href="viewallaccount.inc.php">
                    <i class='bx bxs-user-detail'></i>
                    <span class="nav-item">Account Details</span>
                </a>
                <span class="tooltip">Account Details</span>
            </li>
            <li>
                <a href="adminupdate.inc.php">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="2-adminMenu.php">
                    <i class='bx bx-home-alt' ></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="includes/logOut.inc.php">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>

    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar')
        btn.onclick = function () {
            sidebar.classList.toggle('active')
        };
	</script>
    
</body>
</html>

