<!DOCTYPE html>
<html>
<head>

    <title>Employee Bonus </title>
</head>
<body>

    <h1>Employee Bonus Calculator</h1>

    <form method="POST" action="">
        <label for="years">Enter the number of years the employee has worked:</label>
        <input type="number" id="years" name="years" required><br><br>

        <label for="salary">Enter the employee's salary:</label>
        <input type="number" id="salary" name="salary" required><br><br>

        <button type="submit">Calculate Bonus</button>
    </form>

    <?php
  
    function calculateBonus($years, $salary) {
        $bonus = 0;

       
        if ($years > 10) {
            $bonus = $salary * 0.20;
        }
   
        elseif ($years >= 5) {
            $bonus = $salary * 0.05;
        }
      
        else {
            $bonus = 0;
        }

        return $bonus;
    }

   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['years']) && isset($_POST['salary'])) {
        $years = $_POST['years'];
        $salary = $_POST['salary'];

        if ($years >= 0 && $salary >= 0) {
           
            $bonus = calculateBonus($years, $salary);
            echo "<h2>The employee's bonus is: \$" . number_format($bonus, 2) . "</h2>";
        } else {
            echo "<h2>Please enter valid years and salary.</h2>";
        }
    }
    ?>

</body>
</html>
