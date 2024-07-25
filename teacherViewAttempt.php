<?php
require_once "includes/teacherViewAttempt.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Subjective Attempt</title>
    <link rel="stylesheet" href="teacherthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>
        <div class="teacher-box">

            <div class="teacher-text">View Student Subjective Attempt</div>

            <br><br>

            <form action="includes/teacherViewAttempt.inc.php" method="post">
                <label class="search-text" for="search">Search for Student Subjective Attempt:</label><br>
                <input id="search" type="text" name="attemptsearch" placeholder="Enter Revision Code...."><br><br>
                <button>Search</button>
            </form>
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
                <p>Teacher</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="addMCQ.php">
                    <i class='bx bxs-plus-square'></i>
                    <span class="nav-item">Create MCQ Quiz</span>
                </a>
                <span class="tooltip">Create MCQ Quiz</span>
            </li>
            <li>
                <a href="addSubjective.php">
                    <i class='bx bx-bulb'></i>
                    <span class="nav-item">Create Subjective Quiz</span>
                </a>
                <span class="tooltip">Create Subjective Quiz</span>
            </li>
            <li>
                <a href="teacherViewAttempt.php">
                    <i class='bx bxs-objects-vertical-bottom'></i>
                    <span class="nav-item">View Subjective Attempts</span>
                </a>
                <span class="tooltip">View Subjective Attempts</span>
            </li>
            <li>
                <a href="teachermenupage.php">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="teachermenupage.php">
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