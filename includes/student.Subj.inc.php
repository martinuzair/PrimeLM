<?php
// Function to retrieve quiz information based on revision code
function get_subjective_info($pdo, $revision_code) {
    // Prepare and execute SQL query to retrieve quiz information based on revision code
    $stmt = $pdo->prepare("SELECT * FROM revision_code WHERE code = ?");
    $stmt->execute([$revision_code]);
    $quiz_info = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $quiz_info;
}


// Function to retrieve all MCQ questions and choices associated with the revision code
function get_all_subjective_questions($pdo, $revision_code) {
    // Prepare the SQL query to retrieve all MCQ questions and choices based on the revision code
    $query = "SELECT subjective.*
    FROM subjective
    INNER JOIN revision_code ON subjective.subjective_id = revision_code.subjective_id 
    WHERE revision_code.code = ?
    ORDER BY subjective.subjective_id, subjective.question_number;";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($query);
    //$stmt->bindParam("s", $revision_code);
    //$stmt->execute();
    $stmt->execute([$revision_code]);
    

    // Initialize an empty array to store the questions and choices
    $questions = [];

    // Iterate through the results and organize them into an array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $subjective_id = $row['subjective_id'];
        $question_number = $row['question_number'];
        // Check if the question already exists in the array, if not, initialize it
        if (!isset($questions[$subjective_id][$question_number])) {
            $questions[$subjective_id][$question_number] = [
                'question' => $row['question'],
            ];
        }
    }

    return $questions;
  
}
?>