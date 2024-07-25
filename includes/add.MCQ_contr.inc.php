<?php

function is_input_empty($quiz_title){
    if(empty($quiz_title)){
        return true;
    }else{
        return false;
    }
}

function is_checkbox_empty(){
    $choice_correct = 0;

    foreach ($_POST['question'] as $question) {
        foreach ($question['choices'] as $choice) {
            isset($choice['is_correct']) ? $choice_correct++ : '';
        }
    }
    if($choice_correct < 10){
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

function is_choicetext_empty(){
    $choice_text_empty = 0;

    foreach ($_POST['question'] as $question) {
        foreach ($question['choices'] as $choice) {
            empty($choice['choice_text']) ? $choice_text_empty++ : '';
        }
    }
    if($choice_text_empty > 0){
        return true;
    }else{
        return false;
    }
}

