<?php
require_once 'config_session.inc.php';
require_once 'lmdatabase.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare and execute the query to fetch user data based on email
        $stmt = $pdo->prepare("SELECT id, email, password, role FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Check if a user with the given email exists
        if ($user) {
            // Verify password (plaintext comparison)
            if ($password === $user['password']) {
                // Password is correct

                $_SESSION['user_email'] = $user['email'];
                // Redirect based on user role
                switch ($user['role']) {
                    case 'Admin':
                        header("Location: ../2-adminMenu.php");
                        exit;
                    case 'Teacher':
                        header("Location: ../teachermenupage.php");
                        exit;
                    case 'Student':
                        header("Location: ../studententercode.php");
                        exit;
                    default:
                        // Handle invalid role
                        $_SESSION['login_error'] = "Invalid role!";
                        header("Location: ../1-MainLogin.php");
                        exit;
                }
            } else {
                // Password is incorrect
                $_SESSION['login_error'] = "Incorrect password!";
                header("Location: ../1-MainLogin.php");
                exit;
            }
        } else {
            // User with given email not found
            $_SESSION['login_error'] = "User with email $email not found!";
            header("Location: ../1-MainLogin.php");
            exit;
        }
    } catch (PDOException $e) {
        // Handle database error
        $_SESSION['login_error'] = "Database error: " . $e->getMessage();
        header("Location: ../1-MainLogin.php");
        exit;
    }
}

// Close connection (if needed)
// $pdo = null;
?>







