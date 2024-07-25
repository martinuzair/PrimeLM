<?php

$results = []; // Initialize an empty array to store search results

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attemptsearch = $_POST["attemptsearch"];

    try {
        // require_once check if the file has been included
        require_once "lmdatabase.php";

        $query = "SELECT * FROM attempt WHERE code = :attemptsearch;";

        // Run Query
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":attemptsearch", $attemptsearch);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage);
    }
} else {
    // Check if the current page is not the destination of the redirect
    if (!strpos($_SERVER['REQUEST_URI'], "teacherViewAttempt.php")) {
        header("Location: ../teacherViewAttempt.php");
        exit; // Make sure to exit after performing the redirect
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="teacherthemes.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <center>
        <?php if (!empty($results)): ?>

        <div class="searchresult-title">Search results:</div>

        <div class="mcqscrollable-box">
            <?php
            // Initialize variable to keep track of current attempt_id
            $currentAttemptId = null;

            foreach ($results as $row) {
                // Check if attempt_id has changed
                if ($currentAttemptId !== $row['attempt_id']) {
                    // If it has, close previous box (if any) and start a new box
                    if ($currentAttemptId !== null) {
                        echo "</div>"; // Close previous box
                    }
                    // Start a new box for the current attempt_id
                    echo "<div class='question-box'>";
                    $currentAttemptId = $row['attempt_id'];
                }

                // Display data for this row
                echo "<div>";
                echo "<h4>" . htmlspecialchars($row["student_email"]) . "</h4>";
                echo "<p>" . htmlspecialchars($row["code"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["question_number"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["answer"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["timestamp"]) . "</p>";
                echo "</div>";
            }

            // Close the last box
            echo "</div>";
            ?>
        </div>
        <?php endif; ?>
    </center>

    <div class="top-left">
        <figure>
            <img src="/images.png/TransPrimeLM.png" alt="">
        </figure>
    </div>

    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <img class="resize" src="/images.png/TransPrimeLM.png" alt="">
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <div class="user">
            <img src="/images.png/profile-pic.png" alt="me" class="user-img">
            <div>
                <p class="bold">Name</p>
                <p>Teacher</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="/addMCQ.php">
                    <i class='bx bxs-plus-square'></i>
                    <span class="nav-item">Create MCQ Quiz</span>
                </a>
                <span class="tooltip">Create MCQ Quiz</span>
            </li>
            <li>
                <a href="/addSubjective.php">
                    <i class='bx bx-bulb'></i>
                    <span class="nav-item">Create Subjective Quiz</span>
                </a>
                <span class="tooltip">Create Subjective Quiz</span>
            </li>
            <li>
                <a href="/teacherViewAttempt.php">
                    <i class='bx bxs-objects-vertical-bottom'></i>
                    <span class="nav-item">View Subjective Attempts</span>
                </a>
                <span class="tooltip">View Subjective Attempts</span>
            </li>
            <li>
                <a href="/teachermenupage.php">
                    <i class="bx bx-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
                <span class="tooltip">Settings</span>
            </li>
            <li>
                <a href="/teachermenupage.php">
                    <i class='bx bx-home-alt' ></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="logOut.inc.php">
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



