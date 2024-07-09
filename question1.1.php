<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body>
    <h1>PHP Calculator</h1>
    <form method="post">
        First: <input type="number" name="first" required><br>
        Second: <input type="number" name="second" required><br>
        Operator:
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/option>
        </select><br>
        <button type="submit" name="compute">Compute</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['compute'])) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $operator = $_POST['operator'];
        $result = 0;

        switch ($operator) {
            case '+':
                $result = $first + $second;
                break;
            case '-':
                $result = $first - $second;
                break;
            case '*':
                $result = $first * $second;
                break;
            case '/':
                if ($second != 0) {
                    $result = $first / $second;
                } else {
                    $result = "Division by zero error";
                }
                break;
            default:
                $result = "Invalid operator";
                break;
        }

        echo "Result: " . $result;
    }
    ?>
</body>
</html>
