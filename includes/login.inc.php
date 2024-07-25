<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';
    $role = $_POST["role"]?? '';
    try {
        require_once 'lmdatabase.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //Error Handlers
        $errors = [];

        if(is_input_empty($email, $password)){
            $errors["field_empty"] = "Input all fields!";
        }

        $result = get_user($pdo, $email);
        
        if(is_email_wrong($result)){
            $errors["login_incorrect"] = "Incorrect Login Email!";
        }

        if(!is_email_wrong($result) && is_password_wrong($password, $result["password"])){
            $errors["login_incorrect"] = "Incorrect Login Password!";
        }

        check_role_redirect($role);

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;

            header("Location: ../1-MainLogin.php");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result["id"];
        session_id($sessionID);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);

        $_SESSION['last_regeneration'] = time();

        header("Location:../1-MainLogin.php?login=success");
        
        die();
    } catch (PDOException $e) {
        die( "Query Failed: " . $e->getMessage());
    }


}else {
    header("Location: ../1-MainLogin.php");
    die();
}

?>