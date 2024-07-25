<?php 
require_once 'lmdatabase.php'; 
require_once 'add.MCQ_contr.inc.php';
require_once 'config_session.inc.php';

if (isset($_POST['submit'])) {
    // Get post variables
    $quiz_title = $_POST['quizTitle'];
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $choice_text = $_POST['choice_text'];
    $teacher_email = $_SESSION['user_email']; // Retrieve teacher's email
    $error = false; // Initialize error flags
   
    //Error Handler
    $errors = [];
       
    if(is_input_empty($quiz_title)){
        $errors['empty_field'] = "Quiz Title must be inputted!";
    }
    if(is_questiontext_empty()){
        $errors['question_text'] = "All question text must be filled!";
    }

    if(is_choicetext_empty()){
        $errors['choice_text'] = "All choice text must be filled!";
    }
    if(is_checkbox_empty()){
        $errors['choice'] = "Checkbox at least 10!";
    }  
    if($errors){
        $_SESSION['error_addMCQ'] = $errors;
        header("Location: ../addMCQ.php");
        die();
    }
        
    // Process form if no error
    if (!$error) {
        try {
            // Begin the transaction
            $pdo->beginTransaction();

            // Insert all MCQ questions
            foreach ($_POST['question'] as $question) {
                $question_number = $question['question_number'];
                $question_text = $question['question_text'];

                // Validate question text
                if (empty($question_text)) {
                    $error = true;
                    $error_message = "Question text cannot be empty.";
                    break; // Exit loop if error occurs
                }

                // Insert MCQ question
                $stmt = $pdo->prepare("INSERT INTO mcq_question (title, question_number, question_text, teacher_email) VALUES (?, ?, ?, ?)");
                $stmt->execute([$quiz_title, $question_number, $question_text, $teacher_email]);

                // Validate insertion of question
                if ($stmt->rowCount() <= 0) {
                    throw new Exception("Error inserting MCQ question");
                }

                // Get the auto-generated MCQ_id
                $mcq_id = $pdo->lastInsertId();

                // Insert choices for the MCQ question
                foreach ($question['choices'] as $choice) {
                $choice_text = $choice['choice_text'];
                $is_correct = isset($choice['is_correct']) ? $choice['is_correct'] : 0; // Check if the key exists, default to 0 if not

                // Choice Query
                $stmt = $pdo->prepare("INSERT INTO mcq_choice (MCQ_id, question_number, choice_text, is_correct) VALUES (?, ?, ?, ?)");
                $stmt->execute([$mcq_id, $question_number, $choice_text, $is_correct]);

                // Validate insert
                if ($stmt->rowCount() <= 0) {
                    throw new Exception("Error inserting choice");
                    }
                }

                
            }

            // Generate revision code
            $revision_code = generateRevisionCode(); // Your function to generate revision code

            // Get the last 10 MCQ IDs
            $stmt = $pdo->prepare("SELECT MCQ_id FROM mcq_question ORDER BY MCQ_id DESC LIMIT 10");
            $stmt->execute();
            $mcq_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Insert revision code for all MCQ IDs
            foreach ($mcq_ids as $mcq_id) {
                // Insert revision code into Revision_Codes table
                $stmt = $pdo->prepare("INSERT INTO revision_code (code, MCQ_id, subjective_id, teacher_email, num_questions) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$revision_code, $mcq_id, NULL, $teacher_email, NULL]);
            }


            // Commit the transaction
            $pdo->commit();
            header("Location: ../addMCQ.php?addMCQ=success&revision_code=$revision_code");
            die();
        } catch (Exception $e) {
            // Rollback the transaction
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: $error_message";    
    }
}

// Function to generate revision code
function generateRevisionCode() {
    // Generate a random alphanumeric code or use any other method
    return substr(md5(uniqid(rand(), true)), 0, 5);
    
}
?>



