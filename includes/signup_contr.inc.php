<?php


function is_email_invalid($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
        return true;
    }else{
        return false;
    }
}

function is_email_taken(object $pdo, $email){
    if(get_email($pdo,  $email)){
        return true;
    }else{
        return false;
    }
}

function create_user(object $pdo, $fullname, $nric, $email, $password, $role){
    set_user($pdo, $fullname, $nric, $email, $password, $role);
}



