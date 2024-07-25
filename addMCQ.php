<?php 

require_once 'includes/config_session.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LM</title>
    <link rel="stylesheet" href="teacherthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>

        <br><br>

        <div class="editmcq-title">
            <h1>Add MCQ Questions</h1>
        </div>

        <div class="mcqscrollable-box">
            <?php 
            if(isset($msg)){
                echo '<p>' . $msg . '</p>';
            }
            ?>
            <form method="post" action="includes/addMCQ.inc.php">
                <!-- Add a hidden input field to store the teacher's email -->
                <input type="hidden" name="email" value="<?php echo $_SESSION['user_email']; ?>">

                <p>
                    <label for="quizTitle">Quiz Title:</label>
                    <textarea id="quizTitle" name="quizTitle"></textarea>
                </p>

                <?php
                if(isset($_SESSION['error_addMCQ'])){
                    $errors = $_SESSION["error_addMCQ"];

                    echo '<br>';

                    foreach($errors as $error){
                        echo '<p class="form_error">' . $error . '</p>';
                    }

                    unset($_SESSION['error_addMCQ']);
                }
                
                // Check if the addSubjective parameter is set in the URL indicating success
                if(isset($_GET["addMCQ"]) && $_GET["addMCQ"] === "success"){
                    // Display success message
                    echo '<p class="form_success"> MCQ successfully added! <br> Revision Code: ' . $_GET['revision_code'] . '</p>';
                }
                ?>
                
                <!-- Loop for up to 10 questions -->
                <?php for ($i = 0; $i < 10; $i++): ?>
                <div class="question-box"> <!-- Wrap each question in a box -->
                    <div class="question">
                        <label for="question<?php echo $i . $j; ?>">Question <?php echo $i+ 1; ?>:</label>
                        <input type="text" name="question[<?php echo $i; ?>][question_number]" value="<?php echo $i + 1; ?>">
                        <textarea name="question[<?php echo $i; ?>][question_text]" placeholder="Question Text"></textarea>

                        <!-- Choices for the question -->
                        <div class="choices">
                            <?php for ($j = 0; $j < 4; $j++): ?>
                            <p>
                                <label for="choice<?php echo $i . $j; ?>">Choice <?php echo $j + 1; ?>:</label>
                                <textarea id="choice<?php echo $i . $j; ?>" name="question[<?php echo $i; ?>][choices][<?php echo $j; ?>][choice_text]"></textarea>
                                <input type="checkbox" id="checkbox<?php echo $i . $j; ?>" name="question[<?php echo $i; ?>][choices][<?php echo $j; ?>][is_correct]" value="1"> Correct
                            </p>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>

                <input type="submit" class="submit" name="submit" value="Submit">
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
