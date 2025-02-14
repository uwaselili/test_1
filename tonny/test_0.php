<?php
function validatePassword($password) {
   
    $errors = [];

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must contain at least one uppercase letter.";
    }

    if (!preg_match('/\d/', $password)) {
        $errors[] = "Password must contain at least one digit.";
    }

    if (!preg_match('/[@#$%\&]/', $password)) {
        $errors[] = "Password must contain at least one special character (@, #, $, %, &).";
    }

    if (empty($errors)) {
        return "Password is valid.";
    }

    return implode("<br>", $errors);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password']; 
    $result = validatePassword($password); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>document</title>
</head>
<body>
    <h2>Password</h2>
   
    <form method="POST" action="">
        <label for="password">Enter your password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit"> 
    </form>

    <?php
    
    if (isset($result)) {
       
        echo "<div style='color: " . (strpos($result, "valid") === false ? "red" : "green") . ";'>";
        echo $result;
        echo "</div>";
    }
    ?>
</body>
</html>
