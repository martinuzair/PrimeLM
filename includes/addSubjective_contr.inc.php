<?php

function is_input_field_empty($quiz_title){
    if(empty($quiz_title)){
        return true;
    }else{
        return false;
    }
}

function is_questiontext_empty(){
    $question_text_empty = 0;
    foreach ($_POST['question'] as $question) {
        
        empty($question['question_text']) ? $question_text_empty++ : '';
        
    }
    if($question_text_empty > 0){
        return true;
    }else{
        return false;
    }
}