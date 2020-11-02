<?php //adder-wrong.php

if (isset($_POST['num1'], $_POST['num2']) &&
    is_numeric($_POST['num1']) &&
    is_numeric($_POST['num2'])
    ){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $myTotal = $num1 + $num2;
    echo '<h2>You added '.$num1.' and '.$num2.'</h2>';
    echo '<p> and the answer is</p>
    <p style="color:red;">'.$myTotal.'!</p>';
    echo'<p><a href="">Reset page</a>';
}

?>
<html>
<head>
<title>My Adder Assignment</title>
<style>

</style>
</head>
<body>
    <h1>Adder.php</h1> <form action="" method="post">
    <label>Enter the first number:</label><input type="text" name="num1"><br>
    <label>Enter the second number:</label><input type="text" name="num2"><br>
    <input type="submit" value="Add Em!!"> </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (empty($_POST['num1'])){
            echo '<h2 style="color:red;">Please enter the first number!</h2>';
        } elseif (!is_numeric($_POST['num1'])){
            echo '<h2 style="color:red;">Please enter a number for the first number!</h2>';
        }
        if (empty($_POST['num2'])){
            echo '<h2 style="color:red;">Please enter the second number!</h2>';
        } elseif (!is_numeric($_POST['num2'])){
            echo '<h2 style="color:red;">Please enter a number for the second number!</h2>';
        }
    }
    ?>
</body>
</html>

<!-- 
Line 3-10: indented for clarity
Line 6: Changed -= to = and Num2 to num2
Line 7: Fixed non-matching quote marks around echos and variables
Line 8: Closed p tag, removed break tag
Line 9: Added ' to close echo tag before semicolon, added opening p tag
Line 10: added ;
Line 11: Added closing tag for PHP section
Line 20: Changes <\form> to <form>, added '"method="post"'
Line 21: Added opening tag for label, changed "Num1" to "num1"
Line 22: Fixed label tags
Line 23: Closed double quotes around value
Line 25: Removed unnecessary garbage after closing HTML tag
 -->