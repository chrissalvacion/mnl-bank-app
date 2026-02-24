<?php

include 'user-account/php/config.php';
session_start();

if(! empty($_SESSION['userid'])){
    header('Location: user-account/dashboard.php?user=' . $_SESSION['userid']);
}

if(isset($_GET["btnLogin"])){

    $accountnum = $_GET["account_number"];
    $password = $_GET["password"];

    $sqlQuery = "SELECT * FROM users WHERE accountno='$accountnum' AND password='$password' LIMIT 1";
    $result = $conn->query($sqlQuery);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $userid = $row['userid'];
        $_SESSION['userid'] = $userid;
        header("Location: user-account/dashboard.php?user=" . $_SESSION['userid']);
    } 

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MNL Bank - Login</title>
        <link rel="stylesheet" href="user-account/assets/uikit-3.15.1/css/uikit-rtl.min.css">
        <link rel="stylesheet" href="user-account/assets/uikit-3.15.1/css/uikit.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/css/uikit.min.css" />
    </head>
    <body>
        <script src="user-account/assets/uikit-3.15.1/js/uikit.min.js"></script>
        <script src="user-account/assets/uikit-3.15.1/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.24/dist/js/uikit-icons.min.js"></script>

        <div class="uk-container uk-position-center uk-margin-medium-bottom" style="width:50%" >
           
            <div class="uk-card uk-card-body uk-box-shadow-small uk-align-center" style="width:550px">
                    <h1 class="uk-text-center uk-text-bold">MNL ONLINE BANK</h1>
                    <p class="uk-text-center">Please enter your login credentials.</p>

                    <form action="<?php $_PHP_SELF ?>" method="get">
                        <div class="uk-margin">
                            <label class="uk-form-label uk-text-left" for="form-account_number">Account No.</label>
                            <input class="uk-input uk-form-width-large uk-border-rounded" type="text" name="account_number" placeholder="12-Digit Account Number" aria-label="account-number">
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-password">Password</label>
                            <input class="uk-input uk-form-width-large uk-border-rounded" type="password" name="password" placeholder="Password" aria-label="password">
                        </div>
                        <div class="uk-margin">
                            <a class="uk-text-meta uk-align-left" href="#forgot-password">Forgot password?</a>
                        </div>
                        <button class="uk-button uk-button-secondary uk-button-default uk-width-1-1 uk-margin-small-bottom uk-border-rounded" type="submit" name="btnLogin" value="Login">Login</button>
                        <br>
                    
                    </form> 
            </div>
        
            <div class="uk-text-center">
                <p class="uk-text-bold uk-text-small">Disclaimer</p>
                <p class="uk-text-center uk-text-small">MNL online banking system is for educational purposes only. It is designed to simulate and investigate the principles of confidentiality, integrity, and availability in the context of Information Assurance and Security. This system does not process real transactions, store actual financial data, or provide any real banking services. Any resemblance to actual systems is purely coincidental. Users should not enter real personal or financial information.</p>
                <div class="uk-margin">
                    <p class="uk-text-meta uk-text-center">&copy; 2023 - 2025 Version 3.1.5 by CHRISSALVACION </p>
                </div>
            </div>
            
        </div>
    </body>
</html>