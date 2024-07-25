<?php

function get_user(object $pdo, $email){
    // Prepare and execute the query to fetch user data based on email
    $query = "SELECT id, email, password, role FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}