<?php

function check_login_errors(){
    if(isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        echo "<br>";
        foreach($errors as $error){
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_login"]);
    } elseif(isset($_GET['login']) && $_GET['login'] === "Success") {
        echo '<br>';
        echo '<p class = "form-success">Login Success!<p>';
    }
}
