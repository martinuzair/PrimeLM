<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["full_name"] ?? '';
    $nric = $_POST["nric"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $role = $_POST["role"] ?? '';

    try {
        require_once 'lmdatabase.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //Error Handlers
        $errors = [];

        
        
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid Email Used!";
        }
        if(is_email_taken($pdo, $email)){
            $errors["email_taken"] = "Email already taken!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["error_signup"] = $errors;

            header("Location: ../3-accountregistration.php");
            die();
        }

        create_user($pdo, $fullname, $nric, $email, $password, $role);

        header("Location: ../3-accountregistration.php?signup=success");
        die();
        
        $pdo = NULL;
        $stmt = NULL;

    } catch (PDOException $e) {
        die( "Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../3-accountregistration.php");
    die();
}

?>








