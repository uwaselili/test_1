<?php

function assignGrade($marks) {
  
    if ($marks < 0 || $marks > 100) {
        return "Please enter marks between 0 and 100.";
    }

    
    if ($marks >= 90) {
        return "Grade: A";
    } elseif ($marks >= 80) {
        return "Grade: B";
    } elseif ($marks >= 70) {
        return "Grade: C";
    } elseif ($marks >= 60) {
        return "Grade: D";
    } else {
        return "Grade: F";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marks = $_POST['marks']; 
    $result = assignGrade($marks); 
}
?>

<!DOCTYPE html>
<html>
<head>
   
    <title> Marks Grade</title>
</head>
<body>
    <h2>Enter Student Marks</h2>
    
    <form method="POST" action="">
        <label for="marks">Enter marks (0-100):</label><br>
        <input type="number" id="marks" name="marks" min="0" max="100" required><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
   
    if (isset($result)) {
        echo "<div style='color: green;'>";
        echo $result;
        echo "</div>";
    }
    ?>
</body>
</html>
