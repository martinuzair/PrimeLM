<?php
require_once 'config_session.inc.php';
require_once 'lmdatabase.php';
require_once 'student.Subj.inc.php';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get submitted answers and revision code
    $student_email = $_SESSION['user_email']; // Retrieve student's email   
    $revision_code = $_SESSION['revision_code'];

    $question_number = 0;
    // Insert all Subjective answers
    foreach ($_POST['answer'] as $answer) {
        $question_number++;
        $answer_text = $answer['answer'];

        add_attempt($pdo, $student_email, $revision_code, $question_number, $answer_text);
    }

    header("Location: ../studententercode.php");
    die();

} else {
echo "Form not submitted.";
}



function add_attempt($pdo, $student_email, $revision_code, $question_number, $answer_text){
    // Insert Subjective question
    $stmt = $pdo->prepare("INSERT INTO attempt (student_email, code, question_number, answer) VALUES (?, ?, ?, ?)");
    $stmt->execute([$student_email, $revision_code, $question_number, $answer_text]);
}
    

?>