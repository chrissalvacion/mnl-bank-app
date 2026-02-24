<?php

include('php/session.php');
$userid = $_GET['user'];

include('php/dashboard-model.php');
include('php/account-model.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Bank - Login</title>
        <link rel="stylesheet" href="assets/uikit-3.15.1/css/uikit-rtl.min.css">
        <link rel="stylesheet" href="assets/uikit-3.15.1/css/uikit.min.css">
        <link rel="stylesheet" href="assets/uikit-3.15.1/css/apps.css">
    </head>
    <body>
        <script src="assets/uikit-3.15.1/js/uikit.min.js"></script>
        <script src="assets/uikit-3.15.1/js/uikit-icons.min.js"></script>



        <!--header-->
        <header class="uk-navbar-container"  style="background-color:#222;" uk-navbar>
            <div class="uk-navbar-left">
                <a href="#dashboard" class="uk-navbar-item uk-logo uk-padding-small uk-light"> MNL Online Bank</a>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li class="uk-margin-right"><a href="php/logout.php" class="uk-padding-small">Logout</a></li>
                </ul>
            </div>
        </header>

        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-center">
                <ul class="uk-navbar-nav">
                    <li class="uk-active uk-text-bold"><a href="dashboard.php?user=<?php echo $userid; ?>">Dashboard</a></li>
                    <li><a href="transactions.php?user=<?php echo $userid; ?>">Transactions</a></li>
                    <li><a href="transfer-fund.php?user=<?php echo $userid;; ?>">Fund Transfer</a></li>
                    <li><a href="account.php?user=<?php echo $userid; ?>">My Account</a></li>
                </ul>
            </div>
        </nav>

        <!--main content / dashboard-->

        <main class="uk-container-large uk-padding uk-margin-auto">

            <div class="uk-margin-auto uk-width-xlarge">
                <h4>Hello <?php echo $firstname; ?>!</h4>   
            </div>
           
            <div class="uk-card uk-card-secondary uk-margin-auto uk-width-xlarge uk-padding-small uk-border-rounded uk-animation-slide-top-small">
                <p><?php echo $status; ?> Balance</p>
                <h1><?php echo "Php " . $balance; ?></h1>
            </div>

            <div class="uk-margin-auto uk-width-xlarge uk-margin-top">
                <hr>
                <p>RECENT TRANSACTIONS</p>
                <?php getRecentTransactions($accountno); ?>
            </div>
           
        </main>

    </body>
</html>