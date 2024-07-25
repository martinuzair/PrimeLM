<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Main Menu</title>
    <link rel="stylesheet" href="adminthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
	<center>
		<div class="card-container">
			<a href="3-accountregistration.php" class="card">
				<img src="images.png/register-account.png" alt="">
				<div class="create-text">Create Account</div>
			</a>
			<a href="4-accdelete.php" class="card">
				<img src="images.png/delete-account.png" alt="">
				<div class="delete-text">Account Deletion</div>
			</a>
			<a href="viewallaccount.inc.php" class="card">
				<img src="images.png/account-details.png" alt="">
				<div class="view-text">View Account Details</div>
			</a>
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