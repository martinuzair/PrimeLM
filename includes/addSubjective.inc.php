<?php 

require_once 'lmdatabase.php'; 
require_once 'addSubjective_contr.inc.php';
require_once 'config_session.inc.php';

?>

<?php 


if (isset($_POST['submit'])) {
    // Get post variables
    $quiz_title = $_POST['quizTitle'];
    $numQuestions = $_POST['numQuestions'];
    $teacher_email = $_SESSION['user_email']; // Retrieve teacher's email
    $error = false; // Initialize error flag

    // Iterate through each question number
    for ($i = 1; $i <= $numQuestions; $i++) {
        // Access the value of the question number for each question
        $question_number = $_POST['question'][$i]['question_number'];
    }

    // Process each question
    for ($i = 1; $i <= $numQuestions; $i++) {
        $question_number = $i; // The question number
        $question_text = $_POST['question'][$i]['question_text']; // Retrieve the question text
    }
    //Error Handler
    $errors = [];
       
    if(is_input_field_empty($quiz_title)){
        $errors['empty_field'] = "Quiz title must be inputted!";
    }
    if(is_questiontext_empty()){
        $errors['question_text'] = "All question text must be filled!";
    }

    
    if($errors){
        $_SESSION['error_addSubjective'] = $errors;
        header("Location: ../addSubjective.php");
        die();
    }


  


    // Process form if no error
    if (!$error) {
        try {
            $pdo->beginTransaction();

            // Insert all subjective questions
            for ($i = 1; $i <= $numQuestions; $i++) {
                $question_number = $i;
                $question_text = $_POST['question'][$i]['question_text'];

                $stmt = $pdo->prepare("INSERT INTO subjective (title, question_number, question, answer, teacher_email) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$quiz_title, $question_number, $question_text, NULL, $teacher_email]);

                // Get the auto-generated subjective_id
                $subjective_id = $pdo->lastInsertId();

                }
                

                // Generate revision code
                $revision_code = generateRevisionCode(); // Your function to generate revision code

                // Get the last numberof subjective IDs based on the number of questions inputted
                $stmt = $pdo->prepare("SELECT subjective_id FROM subjective ORDER BY subjective_id DESC LIMIT :limit");
                $stmt->bindValue(':limit', $numQuestions, PDO::PARAM_INT); // Bind the limit parameter
                $stmt->execute();
                $subjective_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);


                // Insert revision code for all MCQ IDs
                foreach ($subjective_ids as $subjective_id) {
                    // Insert revision code into Revision_Codes table
                    $stmt = $pdo->prepare("INSERT INTO revision_code (code, MCQ_id, subjective_id, teacher_email) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$revision_code, NULL, $subjective_id, $teacher_email]);
                }

                // Commit the transaction
                $pdo->commit();
                header("Location: ../addSubjective.php?addSubjective=success&revision_code=$revision_code");
                
                die();
            }catch (Exception $e) {
                    // Rollback the transaction
                    $pdo->rollBack();
                    echo "Error: " . $e->getMessage();
                }
            }
        }
// Function to generate revision code
function generateRevisionCode() {
    // Generate a random alphanumeric code or use any other method
    return substr(md5(uniqid(rand(), true)), 0, 4);
    
}
?>

