<?php



function check_signup_errors(){
    if(isset($_SESSION['error_signup'])){
        $errors = $_SESSION["error_signup"];

            echo '<br>';

            foreach($errors as $error){
                echo '<p class="form_error">' . $error . '<P>';
            }

        unset($_SESSION['error_signup']);
    }elseif(isset($_GET["signup"]) && $_GET["signup"] === "success"){
        echo '<br>';
        echo '<p class="form_success"> Sign Up Success! </P>';
    }
}