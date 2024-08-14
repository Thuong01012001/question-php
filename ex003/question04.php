<?php
session_start();

$color = $gender = $hobbies = "";
$colorErr = $genderErr = $hobbiesErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["color"])) {
        $colorErr = "Please select your favorite color.";
    } else {
        $color = $_POST["color"];
        $_SESSION['color'] = $color;
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Please select your gender.";
    } else {
        $gender = $_POST["gender"];
        $_SESSION['gender'] = $gender;
    }

    if (empty($_POST["hobbies"])) {
        $hobbiesErr = "Please select at least one hobby.";
    } else {
        $hobbies = implode(", ", $_POST["hobbies"]);
        $_SESSION['hobbies'] = $hobbies;
    }

    if (empty($colorErr) && empty($genderErr) && empty($hobbiesErr)) {
        echo "Success! Your preferences have been saved.";
    }
} else {
    $color = isset($_SESSION['color']) ? $_SESSION['color'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $hobbies = isset($_SESSION['hobbies']) ? $_SESSION['hobbies'] : '';
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Favorite Color:
    <select name="color">
        <option value="Red" <?php if($color=="Red") echo "selected"; ?>>Red</option>
        <option value="Blue" <?php if($color=="Blue") echo "selected"; ?>>Blue</option>
        <option value="Green" <?php if($color=="Green") echo "selected"; ?>>Green</option>
    </select>
    <span style="color:red;"><?php echo $colorErr;?></span><br><br>

    Gender:
    <input type="radio" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>>Female
    <input type="radio" name="gender" value="Other" <?php if($gender=="Other") echo "checked"; ?>>Other
    <span style="color:red;"><?php echo $genderErr;?></span><br><br>

    Hobbies:
    <input type="checkbox" name="hobbies[]" value="Reading" <?php if(strpos($hobbies, "Reading") !== false) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="Gaming" <?php if(strpos($hobbies, "Gaming") !== false) echo "checked"; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="Traveling" <?php if(strpos($hobbies, "Traveling") !== false) echo "checked"; ?>>Traveling
    <span style="color:red;"><?php echo $hobbiesErr;?></span><br><br>

    <input type="submit" value="Submit">
</form>
