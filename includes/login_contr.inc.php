<?php 

function is_input_empty($email, $password){
    if(empty($email) || empty($password)){
        return true;
    }else{
        return false;
    }
}

function is_email_wrong(bool|array $results){
    if(!$result){
        return true;
    }else{
        return false;
    }
}

function is_password_wrong(string $password){
    if(!password_verify($password)){
        return true;
    }else{
        return false;
    }
}

function check_role_redirect($role){
    if ($result) {
        // Verify password (plaintext comparison)
        if ($password === $user['password']) {
            // Password is correct
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
                    echo "Invalid role!";
                    break;
            }
        } else {
            // Password is incorrect
            echo "Incorrect password!";
        }
    }
}