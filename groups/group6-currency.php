<?php
// Declare regular variables
$name = '';
$email = '';
$amount = '';
$bank = '';
$currency = '';
// Declare error variables
$name_error = '';
$email_error = '';
$amount_error = '';
$bank_error = '';
$currency_error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // We need to declare our errors, i.e if a field is empty, do something - more or less, we are going to declare a whole bunch of if statements and after-
    // wards, if all the if statements are true, then yippy and skippy!

    if(empty($_POST['name'])){
        $name_error = '<p>Please fill in your name.</p>';
    } else {
        $name = $_POST['name'];
    }
    if(empty($_POST['email'])){
        $email_error = '<p>Please fill in your email.</p>';
    } else {
        $email = $_POST['email'];
    }
    if(empty($_POST['amount'])){
        $amount_error = '<p>Please fill in your amount of currency.</p>';
    } else {
        $amount = $_POST['amount'];
    }
    if($_POST['bank'] == 'NULL'){
        $bank_error = '<p>Please choose your banking institution.</p>';
    } else {
        $bank = $_POST['bank'];
    }
    if(empty($_POST['currency'])){
        $currency_error = '<p>Please select your currency.</p>';
    } else {
        $currency = $_POST['currency'];
    }

} // close server
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Currency Form</title>

    <style>
        form{
            width: 350px;
            margin: 0 auto;
        }
        input[type=text]{
            width: 100%;
        }
        fieldset{
            color: #666;
            padding: 10px, 15px, 10px, 10px;
        }
        label{
            display: block;
            margin-bottom: 5px;
        }
        input{
            margin-bottom: 10px;
        }
        ul{
            list-style: none;
        }
        .box{
            width: 600px;
            margin: 20px auto;
            background: beige;
            padding: 20px;
            border: 1px solid green;
        }
        select {
            margin-bottom: 10px;
        }
        span{
            display: block;
            color: red;
            font-style: italic;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <form action="" method="post">
    <fieldset>
        <label>Name</label>
        <input type="text" name="name" value='<?php if (isset($_POST['name'])){echo $_POST['name'];}?>'>
        <span><?php echo $name_error; ?></span>
        <label>Email</label>
        <input type="text" name="email" value='<?php if (isset($_POST['email'])){echo $_POST['email'];}?>'>
        <span><?php echo $email_error; ?></span>
        <label>How Much Money Do You Have?</label>
        <input type="text" name="amount" value='<?php if (isset($_POST['amount'])){echo $_POST['amount'];}?>'>
        <span><?php echo $amount_error; ?></span>

        <label>Choose your Banking Institution</label>
        <select name="bank">
            <option value="NULL" <?php
                if(isset($_POST['bank']) && $_POST['bank'] == 'NULL'){
                    echo 'selected = unselected';
                }
            ?>>Select one</option>
            <option value="Bank of America" <?php
                if(isset($_POST['bank']) && $_POST['bank'] == 'Bank of America'){
                    echo 'selected = selected';
                }
            ?>>Bank of America</option>
            <option value="BECU" <?php
                if(isset($_POST['bank']) && $_POST['bank'] == 'BECU'){
                    echo 'selected = selected';
                }
            ?>>BECU</option>
            <option value="Chase Bank" <?php
                if(isset($_POST['bank']) && $_POST['bank'] == 'Chase Bank'){
                    echo 'selected = selected';
                }
            ?>>Chase Bank</option>
            <option value="Wells Fargo" <?php
                if(isset($_POST['bank']) && $_POST['bank'] == 'Wells Fargo'){
                    echo 'selected = selected';
                }
            ?>>Wells Fargo</option>
            <option value="Mattress" <?php
                if(isset($_POST['bank']) && $_POST['bank'] == 'Mattress'){
                    echo 'selected = selected';
                }
            ?>>Mattress</option>
        </select>
        <span><?php echo $bank_error; ?></span>
        <label>Choose your currency</label>
        <ul>
            <li><input type="radio" name="currency" value="0.013"
                <?php if(isset($_POST['currency']) && $_POST['currency'] == 0.013){echo 'checked = checked';} ?>
            >Rubles</li>
            <li><input type="radio" name="currency" value="0.76"
                <?php if(isset($_POST['currency']) && $_POST['currency'] == 0.76){echo 'checked = checked';} ?>
            >Canadian Dollars</li>
            <li><input type="radio" name="currency" value="1.28"
                <?php if(isset($_POST['currency']) && $_POST['currency'] == 1.28){echo 'checked = checked';} ?>
            >Pounds</li>
            <li><input type="radio" name="currency" value="1.18"
                <?php if(isset($_POST['currency']) && $_POST['currency'] == 1.18){echo 'checked = checked';} ?>
            >Euros</li>
            <li><input type="radio" name="currency" value="0.0094"
                <?php if(isset($_POST['currency']) && $_POST['currency'] == 0.0094){echo 'checked = checked';} ?>
            >Yen</li>
        </ul>
        <span><?php echo $currency_error; ?></span>
        <input type="submit" value="Convert It!!">
        <p><a href="">Reset me!</a></p>
    </fieldset>

    </form>

    <?php

        if (isset(
            $_POST['name'],
            $_POST['email'],
            $_POST['amount'],
            $_POST['currency']) && 
        is_numeric($_POST['amount']) &&
        is_numeric($_POST['currency']) &&
        $_POST['bank'] != 'NULL'
            ){

                // I am doing the arithmetic!
                $total = $amount * $currency;
                $total_f = number_format($total, 2);

                // Display the results
                echo '<div class="box">';
                echo '<h2>Thank you, '.$name.' for filling out our form. Your money will be wired to '.$bank.' within 24 hours!</h2>';
                echo '<p>'.$name.' you now have $'.$total_f.' American Dollars.</p>';
                echo '<p>We will be getting back to you via your email: '.$email.'</p>';
                echo '</div>';


        } // Close if



    ?>
</body>
</html>