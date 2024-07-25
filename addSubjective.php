<?php 

require_once 'includes/config_session.inc.php';
require_once 'includes/addSubjective.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subjective Question</title>
    <link rel="stylesheet" href="teacherthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>
        <br><br>
        <div class="editmcq-title">
            <h1>Add a Subjective Question</h1>
        </div>

            <?php 
            if(isset($msg)){
                echo '<p>' . $msg . '</p>';
            }
            ?>
        <div class="scrollable-box">
            <form method="post" action="includes/addSubjective.inc.php">
                <!-- Add a hidden input field to store the teacher's email -->
                <input type="hidden" name="email" value="<?php echo $_SESSION['user_email']; ?>">

                <p>
                    <label for="quizTitle">Quiz Title:</label>
                    <textarea id="quizTitle" name="quizTitle"></textarea>
                </p>

                <?php
                if(isset($_SESSION['error_addSubjective'])){
                    $errors = $_SESSION["error_addSubjective"];

                        echo '<br>';

                        foreach($errors as $error){
                            echo '<p class="form_error">' . $error . '</p>';
                        }

                    unset($_SESSION['error_addSubjective']);
                }

                // Check if the addSubjective parameter is set in the URL indicating success
                if(isset($_GET["addSubjective"]) && $_GET["addSubjective"] === "success"){
                    // Display success message
                    echo '<p class="form_success"> MCQ successfully added! <br> Revision Code: ' . $_GET['revision_code'] . '</p>';
                }
                
                ?>

                <?php 
                if(isset($msg)){
                    echo '<p>' . $msg . '</p>';
                }
                ?>

                
                <p>
                    <label for="numQuestions">Number of Questions:</label>
                    <input type="number" id="numQuestions" name="numQuestions" min="1">
                </p>
                <div id="questionContainer">
                
                </div>
                <p>
                    <input type="submit" class="submit" name="submit" value="Submit">
                </p>
            </form>
        </div>
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
                <p>Teacher</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="addMCQ.php">
                    <i class='bx bxs-plus-square'></i>
                    <span class="nav-item">Create MCQ Quiz</span>
                </a>
                <span class="tooltip">Create MCQ Quiz</span>
            </li>
            <li>
                <a href="addSubjective.php">
                    <i class='bx bx-bulb'></i>
                    <span class="nav-item">Create Subjective Quiz</span>
                </a>
                <span class="tooltip">Create Subjective Quiz</span>
            </li>
            <li>
                <a href="teacherViewAttempt.php">
                    <i class='bx bxs-objects-vertical-bottom'></i>
                    <span class="nav-item">View Subjective Attempts</span>
                </a>
                <span class="tooltip">View Subjective Attempts</span>
            </li>
            <li>
                <a href="teachermenupage.php">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="teachermenupage.php">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('numQuestions').addEventListener('change', function () {
        var numQuestions = parseInt(this.value);
        var questionContainer = document.getElementById('questionContainer');
        questionContainer.innerHTML = ''; // Clear previous inputs
        for (var i = 1; i <= numQuestions; i++) {
            var questionDiv = document.createElement('div');
            questionDiv.classList.add('question');
            questionDiv.innerHTML = `
                <label for="questionNumber${i}">Question ${i}:</label>
                <input type="text" id="questionNumber${i}" name="question[${i}][question_number]" value="${i}">
                <textarea name="question[${i}][question_text]" placeholder="Question Text"></textarea>
            `;
            questionContainer.appendChild(questionDiv);
        }
    });
});
</script>
