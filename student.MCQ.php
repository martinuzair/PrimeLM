<?php
require_once 'includes/lmdatabase.php';
require_once 'includes/student.MCQ.inc.php';

// Check if the revision code is provided in the URL
if (isset($_GET['revision_code'])) {
    $revision_code = $_GET['revision_code'];

    // Query the database to retrieve quiz information
    $quiz_info = get_quiz_info($pdo, $revision_code);
    
    if ($quiz_info) {
        // Query the database to retrieve all MCQ questions and choices associated with the revision code
        //$questions = get_all_mcq_questions($pdo, $quiz_info['MCQ_id']);
        $questions = get_all_mcq_questions($pdo, $revision_code);
        
        // Display the quiz form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>
    <h1 class="title"> 
        Multiple Choice Questions: 
    </h1><br>
    <div class="scrollable-box">
        <form action="includes/student.MCQprocess.inc.php" method="post">
            <?php 
            $question_number = 0;
            foreach ($questions as $question):
            ?>
            <div class="question">
                <p class="MCQ"><?php 
                foreach ($question as $singlequestion){
                    $question_number++;
                    echo $question_number . ": ";
                    echo $singlequestion['question_text'];
                    echo "<br>";
                    foreach ($singlequestion['choices'] as $choice){          
                        echo '<input name="choices[' . $question_number . '][choice_text]"' . 'type="radio" value="' . $choice['choice_text'] .'">'; 
                        echo $choice['choice_text'];
                        echo "<br>";
                    }
                }
                ?><br></p>
            </div>
            <?php endforeach; ?>
            <input class="submit" type="submit" name="submit" value="Submit">
        </form>
    </div>
    </center>
<?php
    } else {
        echo "Quiz not found for the provided revision code.";
    }
} else {
    echo "Revision code not provided.";
}
?>

<div class="top-left">
        <figure>
            <img src="images.png/TransPrimeLM.png" alt="">
        </figure>
    </div>

    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img class="resize" src="images.png/TransPrimeLM.png" alt="">
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <div class="user">
            <img src="images.png/profile-pic.png" alt="me" class="user-img">
            <div>
                <p class="bold">Name</p>
                <p>Student</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="studententercode.php">
                    <i class='bx bx-bulb'></i>
                    <span class="nav-item">Quiz</span>
                </a>
                <span class="tooltip">Quiz</span>
            </li>
            <li>
                <a href="studententercode.php">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="studententercode.php">
                    <i class='bx bx-home-alt' ></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="includes/logOut.inc.php">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div> 

    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.sidebar')
        btn.onclick = function () {
            sidebar.classList.toggle('active')
        };
    </script>
</body>
</html>











