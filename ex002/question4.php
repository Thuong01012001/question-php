<?php
$firstName = $lastName = "";
$firstNameErr = $lastNameErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
        $firstNameErr = "First name is required.";
    } else {
        $firstName = htmlspecialchars($_POST["first_name"]);
    }

    if (empty($_POST["last_name"])) {
        $lastNameErr = "Last name is required.";
    } else {
        $lastName = htmlspecialchars($_POST["last_name"]);
    }

    if (empty($firstNameErr) && empty($lastNameErr)) {
        echo "Success! First Name: $firstName, Last Name: $lastName";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name: <input type="text" name="first_name">
    <span style="color:red;"><?php echo $firstNameErr;?></span><br><br>
    Last Name: <input type="text" name="last_name">
    <span style="color:red;"><?php echo $lastNameErr;?></span><br><br>
    <input type="submit" value="Submit">
</form>
 