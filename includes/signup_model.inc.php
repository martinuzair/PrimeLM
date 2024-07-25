<?php

function get_email(object $pdo, $email){
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, $fullname, $nric, $email, $password, $role){
    
        $query= "INSERT INTO users (email, password, role) VALUES (:email, :password, :role);";
        $stmt = $pdo->prepare($query);

        

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        $stmt->execute();

        $user_id = $pdo->lastInsertId();

        if ($role == 'Student') {
            $query="INSERT INTO student (name, NRIC, users_id) VALUES (:fullname, :nric, :user_id);";
            $stmt = $pdo->prepare($query);

            

            $stmt->bindParam(":fullname", $fullname);
            $stmt->bindParam(":nric", $nric);
            $stmt->bindParam(":user_id", $user_id);

            $stmt->execute(); 

            header("Location: ../3-accountregistration.php");
            die();
        } elseif ($role == 'Teacher') {
            $query="INSERT INTO teacher (name, NRIC, users_id) VALUES (:fullname, :nric, :user_id);";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":fullname", $fullname);
            $stmt->bindParam(":nric", $nric);
            $stmt->bindParam(":user_id", $user_id);

            $stmt->execute();

            header("Location: ../3-accountregistration.php");
            die();

        } elseif ($role == 'Admin') {
            $query="INSERT INTO admin (name, NRIC, users_id) VALUES (:fullname, :nric, :user_id);";
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":fullname", $fullname);
            $stmt->bindParam(":nric", $nric);
            $stmt->bindParam(":user_id", $user_id);

            $stmt->execute();

            header("Location: ../3-accountregistration.php");
            die();
        }else {
            echo "Invalid role!";
            die();
        }
}

   