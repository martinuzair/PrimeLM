<?php
require_once 'includes/lmdatabase.php';
require_once 'includes/student.Subj.inc.php';



//require_once 'includes/student.MCQprocess.inc.php';

// Check if the revision code is provided in the URL
if (isset($_GET['revision_code'])) {
    $revision_code = $_GET['revision_code'];

    // Query the database to retrieve subjective information
    $subjective_info = get_subjective_info($pdo, $revision_code);
    
    if ($subjective_info) {
        // Query the database to retrieve all subjective question based on revision code
        //$questions = get_all_mcq_questions($pdo, $quiz_info['MCQ_id']);
        $questions = get_all_subjective_questions($pdo, $revision_code);
        
        // Display the subjective form
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
            Subjective Questions: 
        </h1><br>
    
        <form action="includes/student.Subjprocess.inc.php" method="post">
            <?php 
            
            $question_number = 0;

            foreach ($questions as $question):
            ?>
                <div class="question">
                    
                    <p class="MCQ"><?php 
                    
                    foreach ($question as $singlequestion){
                        echo $question_number+1 . ": ";
                        echo $singlequestion['question'];
                        echo "<br>";
                        echo '<textarea name="answer[' . $question_number . '][answer]"' . 'id="answer[' . $question_number . ']"' . 'cols="30" rows="10" >
                        </textarea>';
                        $question_number++;
                    }
                        ?><br></p>
                </div>
                
                    
                
            <?php endforeach; ?>
            <input class="submit" type="submit" name="submit" value="Submit">
        </form>
    </center>

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

<?php
    } else {
        echo "Quiz not found for the provided revision code.";
    }
} else {
    echo "Revision code not provided.";
}
?>

</body>
</html>

