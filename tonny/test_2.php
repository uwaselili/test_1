<!DOCTYPE html>
<html>
<head>
   
    <title>Electricity Bill Calculator</title>
</head>
<body>

    <h1>Electricity Bill Calculator</h1>

    <form method="POST" action="">
        <label for="units">Enter the number of units consumed:</label>
        <input type="number" id="units" name="units" required>
        <button type="submit">Calculate Bill</button>
    </form>

    <?php
  
    function calculateBill($units) {
        $bill = 0;


        if ($units <= 50) {
            $bill = $units * 3;
        }
        
        elseif ($units <= 150) {
            $bill = 50 * 3 + ($units - 50) * 5;
        }
        
        elseif ($units <= 250) {
            $bill = 50 * 3 + 100 * 5 + ($units - 150) * 8;
        }
   
        else {
            $bill = 50 * 3 + 100 * 5 + 100 * 8 + ($units - 250) * 10;
        }

        return $bill;
    }

  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['units'])) {
        $units = $_POST['units'];
        if ($units >= 0) {
            $bill = calculateBill($units);
            echo "<h2>Electricity Bill for {$units} units is: \$" . number_format($bill, 2) . "</h2>";
        } else {
            echo "<h2>Please enter a valid number of units.</h2>";
        }
    }
    ?>

</body>
</html>
