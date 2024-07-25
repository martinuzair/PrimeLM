<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted

    // Include the database connection file
    require_once "includes/lmdatabase.php";

    // Retrieve form data
    $currentEmail = $_POST["currentEmail"];
    $currentPassword = $_POST["currentPassword"];
    $newEmail = $_POST["newEmail"];
    $newPassword = $_POST["newPassword"];

    try {
        // Prepare and execute the SQL query to update the user's email and password
        $query = "UPDATE users SET email = :email, password = :password WHERE id = 74 AND role = 'Admin' AND email = :currentEmail AND password = :currentPassword";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $newEmail);
        $stmt->bindParam(":password", $newPassword);
        $stmt->bindParam(":currentEmail", $currentEmail);
        $stmt->bindParam(":currentPassword", $currentPassword);
        $stmt->execute();

        // Close the database connection
        $pdo = null;
        $stmt = null;

        // Redirect to justwannatest.php after successful update
        header("location: adminupdate.inc.php");
        exit();
    } catch (PDOException $e) {
        // Handle database errors
        die("Query failed: " . $e->getMessage());
    }
}

// Fetch current email and password from the database
require_once "includes/lmdatabase.php"; // Include the database connection file

try {
    // Prepare and execute the SQL query to fetch user data
    $query = "SELECT email, password FROM users WHERE id = 74 AND role = 'Admin'";
    $stmt = $pdo->query($query);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Close the database connection
    $pdo = null;
    $stmt = null;

    // Assign fetched data to variables
    $currentEmail = $user['email'];
    $currentPassword = $user['password'];
} catch (PDOException $e) {
    // Handle database errors
    die("Query failed: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Profile</title>
    <link rel="stylesheet" href="adminthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>
        <div class="updateprofile-box">
            <div class="box-title">
                Update Profile
            </div>
            
            <br>
            <br>

            <form method="POST" action="adminupdate.inc.php">
                <label id="CurrentEmail-txt" for="currentEmail">Current Email:</label><br>
                <input type="text" id="currentEmail" name="currentEmail" value="<?php echo htmlspecialchars($currentEmail); ?>" readonly><br><br>
        
                <label id="CurrentPassword-txt" for="currentPassword">Current Password:</label><br>
                <input type="password" id="currentPassword" name="currentPassword" value="<?php echo htmlspecialchars($currentPassword); ?>" readonly><br><br>
        
                <label id="NewEmail-txt" for="newEmail">New Email:</label><br>
                <input type="email" id="newEmail" name="newEmail" required><br><br>
        
                <label id="NewPassword-txt" for="newPassword">New Password:</label><br>
                <input type="password" id="newPassword" name="newPassword" required><br><br>
        
                <input id="UpdateButton" type="submit" value="Confirm">
            </form>
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