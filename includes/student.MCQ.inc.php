<?php
// Function to retrieve quiz information based on revision code
function get_quiz_info($pdo, $revision_code) {
    // Prepare and execute SQL query to retrieve quiz information based on revision code
    $stmt = $pdo->prepare("SELECT * FROM revision_code WHERE code = ?");
    $stmt->execute([$revision_code]);
    $quiz_info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $quiz_info;
}


// Function to retrieve all MCQ questions and choices associated with the revision code
function get_all_mcq_questions($pdo, $revision_code) {
    // Prepare the SQL query to retrieve all MCQ questions and choices based on the revision code
    $query = "SELECT mcq_question.*, mcq_choice.choice_text, mcq_choice.is_correct
    FROM mcq_question 
    INNER JOIN mcq_choice ON mcq_question.MCQ_id = mcq_choice.MCQ_id 
    INNER JOIN revision_code ON mcq_question.MCQ_id = revision_code.MCQ_id 
    WHERE revision_code.code = ?
    ORDER BY mcq_question.MCQ_id, mcq_question.question_number;";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($query);
    //$stmt->bindParam("s", $revision_code);
    //$stmt->execute();
    $stmt->execute([$revision_code]);
    
    $title = ['title'];
    // Initialize an empty array to store the questions and choices
    $questions = [];

    // Iterate through the results and organize them into an array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $mcq_id = $row['MCQ_id'];
        $question_number = $row['question_number'];
        // Check if the question already exists in the array, if not, initialize it
        if (!isset($questions[$mcq_id][$question_number])) {
            $questions[$mcq_id][$question_number] = [
                'question_text' => $row['question_text'],
                'choices' => []
            ];
        }

        // Add the choice to the corresponding question
        $questions[$mcq_id][$question_number]['choices'][] = [

            'choice_text' => $row['choice_text']
        ];
    }

    return $questions;
   
}
?>



