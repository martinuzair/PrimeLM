<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $attemptsearch = $_POST["attemptsearch"];

    
        try { 
            //require_once check if the file has been included
            require_once "lmdatabase.php";
    
            $query = "SELECT * FROM attempt WHERE code = :attemptsearch;";
    
            //Run Query
            $stmt = $pdo->prepare($query);
    
            $stmt -> bindParam(":attemptsearch", $attemptsearch);
    
            $stmt -> execute();

            $results = $stmt -> fetchALL(PDO::FETCH_ASSOC);
    
            $pdo = null;
            $stmt = null;
        
    
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage);
        }
    
    }else{
        header("Location: ../ViewSubj.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Search results:</h2>

        <?php
        
        if(empty($results)){
            echo "<div>";
            echo "<p> No attempts were found! </p>";
            echo "</div>";

        }else{
            foreach($results as $row){
                echo "<div>";
                echo "<h4>" . htmlspecialchars($row["student_email"]) . "</h4>";
                echo "<p>" . htmlspecialchars($row["code"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["question_number"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["answer"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["timestamp"]) . "</p>";
                echo "</div>";

            }
        }
        ?>

</body>
</html>
