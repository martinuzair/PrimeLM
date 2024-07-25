<?php
require_once 'config_session.inc.php';
require_once 'lmdatabase.php';
require_once 'student.MCQ.inc.php';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get submitted answers and revision code
    $revision_code = $_SESSION['revision_code'];
    $choices = $_POST['choices'];
    $_SESSION['score'] = 0;

    $query = "SELECT question_number, choice_text FROM `mcq_choice` 
                INNER JOIN revision_code ON mcq_choice.MCQ_id = revision_code.MCQ_id 
                WHERE revision_code.code = ? AND is_correct = 1 
                ORDER BY revision_code.MCQ_id;";
    $stmt = $pdo->prepare($query);
    $stmt -> execute([$revision_code]);
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $question_number = 0;
    foreach($results as $result){
        $question_number++;
        $correct_choice = $result['choice_text'];
        $selected_choice = $choices[$question_number]['choice_text'];
        if($correct_choice == $selected_choice){
            //Answer is correct
            $_SESSION['score']++;
            echo $_SESSION['score'] . "<br><br>";
        }
    }
    
    header("Location: ../MCQresult.php");
    die();
    /* // Retrieve quiz information
    $quiz_info = get_quiz_info($pdo, $revision_code);
    
    if($quiz_info && $quiz_info['MCQ_id']) {
        // Initialize score if not set
        if(!isset($_SESSION['score'])) {
            $_SESSION['score'] = 0;
        }
        
        // Query the database to retrieve correct answers
        $questions = get_mcq_questions($pdo, $quiz_info['MCQ_id']);
        
        // Compare submitted answers with correct answers
        foreach($questions as $question) {
            $correct_choice = get_correct_choice($pdo, $quiz_info['MCQ_id'], $question['question_number']);
            if(isset($answers[$question['question_number']]) && $answers[$question['question_number']] == $correct_choice) {
                $_SESSION['score']++;
            }
        }
        header("Location: ../MCQresult.php");
        die();
    } else {
        echo "Invalid revision code or quiz not found.";
    } */
} else {
    echo "Form not submitted.";
}
?>

