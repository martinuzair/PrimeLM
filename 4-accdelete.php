<?php
session_start(); // Start the session

require_once "includes/lmdatabase.php"; // Include your database connection script

// Initialize variables
$message = "";
$adminName = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        // Connect to the database
        require_once "includes/lmdatabase.php";

        // Prepare and execute the DELETE query
        $query = "DELETE FROM users WHERE email = :email AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        // Set success message
        $message = "<p style='color: green;'>Account deleted successfully.</p>";

        // Close connections
        $pdo = null;
        $stmt = null;

        // Set success message
        $_SESSION['delete_message'] = $message;

        // Redirect user to accdelete.php
        header("Location: 4-accdelete.php");
        exit(); // Ensure no further code execution after redirection

    } catch (PDOException $e) {
        // Set error message
        $message = "<p style='color: red;'>An error occurred: " . $e->getMessage() . "</p>";
    }
}

// Fetch the admin name from the database
$adminId = 15000;
$queryAdmin = "SELECT name FROM admin WHERE admin_id = :admin_id";
$stmtAdmin = $pdo->prepare($queryAdmin);
$stmtAdmin->bindParam(":admin_id", $adminId);
$stmtAdmin->execute();

// Fetch the name from the database
$rowAdmin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);
if ($rowAdmin) {
    $adminName = $rowAdmin['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrimeLM Account Deletion</title>
    <link rel="stylesheet" href="adminthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <center>
        <div class="accountdelete_box">
            <div class="box-title">
                Account Deletion
            </div>

            <div class="deletion-form">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="delete-password" name="password" required><br><br>

                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I have read and agree to the terms and conditions.</label><br><br>

                    <div class="g-recaptcha" data-sitekey="6LfWzJMpAAAAADxVliZKhDxEDeqysmR03t-Vud4N"></div><br/>
                    <input id="DeleteButton" type="submit" value="Delete">
                </form>
            </div>
            
            <?php if (!empty($message)) echo $message; // Display the message here if it's not empty ?>
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



