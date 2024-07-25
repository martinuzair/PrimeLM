<?php
require_once 'lmdatabase.php';
require_once 'config_session.inc.php';

// Process the form submission
if(isset($_POST['submit'])) {
    $revision_code = $_POST['revision_code'];
    $_SESSION['revision_code'] = $revision_code;

    // Query the database to find the associated quiz
    $stmt = $pdo->prepare("SELECT * FROM revision_code WHERE code = ?");
    $stmt->execute([$revision_code]);
    $quiz = $stmt->fetch(PDO::FETCH_ASSOC);

    if($quiz) {
        // Redirect the student to the appropriate quiz page
        if($quiz['MCQ_id']) {
            header("Location: ../student.MCQ.php?revision_code={$revision_code}");
            exit();
        } elseif($quiz['subjective_id']) {
            header("Location: ../student.Subjective.php?revision_code={$revision_code}");
            exit();
        } else {
            // Handle the case where no quiz is found for the revision code
            $error_message = "No quiz found for the entered revision code.";
        }

        
    } else {
        // Handle the case where the revision code is not found in the database
        $error_message = "Invalid revision code.";
    }
}


?>
