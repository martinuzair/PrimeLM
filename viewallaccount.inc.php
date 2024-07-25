<?php
require_once 'includes/lmdatabase.php';

// Fetch data from the users table along with their IDs
$sql = "SELECT id, email, role FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize arrays to hold student, teacher, and admin names
$studentNames = [];
$teacherNames = [];
$adminNames = [];

// Fetch student names
$sql = "SELECT name FROM student WHERE users_id = ?";
$stmt = $pdo->prepare($sql);
foreach ($users as $user) {
    $stmt->execute([$user['id']]);
    $name = $stmt->fetchColumn();
    if ($name) {
        $studentNames[$user['id']] = $name;
    }
}

// Fetch teacher names
$sql = "SELECT name FROM teacher WHERE users_id = ?";
$stmt = $pdo->prepare($sql);
foreach ($users as $user) {
    $stmt->execute([$user['id']]);
    $name = $stmt->fetchColumn();
    if ($name) {
        $teacherNames[$user['id']] = $name;
    }
}

// Fetch admin names
$sql = "SELECT name FROM admin WHERE users_id = ?";
$stmt = $pdo->prepare($sql);
foreach ($users as $user) {
    $stmt->execute([$user['id']]);
    $name = $stmt->fetchColumn();
    if ($name) {
        $adminNames[$user['id']] = $name;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Accounts Profile</title>
    <link rel="stylesheet" href="adminthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <center>
    <div class="searchbar-container">
      <input type="text" id="searchInput" class="searchbar-input" placeholder="Search...">
    </div>
    <div class="scrollable-box" id="userProfiles">
        <?php foreach ($users as $user): ?>
        <div class="accountprofile-box">
            <div class="profilename-text">
                <?php
                if (isset($studentNames[$user['id']])) {
                    echo $studentNames[$user['id']];
                } elseif (isset($teacherNames[$user['id']])) {
                    echo $teacherNames[$user['id']];
                } elseif (isset($adminNames[$user['id']])) {
                    echo $adminNames[$user['id']];
                } else {
                    echo "Name Not Found";
                }
                ?>
            </div>
            <div class="profilerole-text">
                <?php echo $user['role']; ?>
            </div>
            <div class="profileemail-text">
                <?php echo $user['email']; ?>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="accountprofile-box"></div>
        <div class="accountprofile-box"></div>
        <div class="accountprofile-box"></div>
        <div class="accountprofile-box"></div>
        <div class="accountprofile-box"></div>
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

  <script>
    // Function to filter user profiles based on search input
    function filterProfiles() {
        var input, filter, profiles, profile, name, role, email, i;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        profiles = document.getElementById('userProfiles').getElementsByClassName('accountprofile-box');

        for (i = 0; i < profiles.length; i++) {
            profile = profiles[i];
            name = profile.getElementsByClassName('profilename-text')[0].textContent.toUpperCase();
            role = profile.getElementsByClassName('profilerole-text')[0].textContent.toUpperCase();
            email = profile.getElementsByClassName('profileemail-text')[0].textContent.toUpperCase();
            if (name.indexOf(filter) > -1 || role.indexOf(filter) > -1 || email.indexOf(filter) > -1) {
                profile.style.display = '';
            } else {
                profile.style.display = 'none';
            }
        }
    }

    // Attach event listener to the search input
    document.getElementById('searchInput').addEventListener('input', filterProfiles);
  </script>
</body>
</html>
