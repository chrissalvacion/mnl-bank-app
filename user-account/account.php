<?php

include('php/session.php');
$userid = $_GET['user'];

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
                    <li><a href="dashboard.php?user=<?php echo $userid; ?>">Dashboard</a></li>
                    <li><a href="transactions.php?user=<?php echo $userid; ?>">Transactions</a></li>
                    <li><a href="transfer-fund.php?user=<?php echo $userid; ?>">Fund Transfer</a></li>
                    <li class="uk-active uk-text-bold"><a href="account.php?user=<?php echo $userid; ?>">My Account</a></li>
                </ul>
            </div>
        </nav>

        <!--main content / dashboard-->
        <main class="uk-container-large uk-padding uk-margin-auto">
            <div class="uk-width-xlarge uk-margin-auto">
                <h2>My Account</h2>
            
                <div class="uk-card uk-card-secondary uk-padding-small uk-border-rounded uk-animation-fade">
                    <br>
                    <p>Account No:</p>
                    <span class="uk-text-spacing-4" style="font-size:2em;">**** **** <?php echo substr($accountno, 8, 4); ?></span><br>
                    <span class="uk-text-spacing-4"><?php echo $firstname . " " . $lastname; ?></span>
                    <br/>
                    <br/>
                </div>

                <h4>Personal Information</h4>
                <table>
                   <tbody>
                        <tr><td class="td-head">Name:</td><td><?php echo $firstname . " " .$lastname; ?></td></tr>
                        <tr><td class="td-head">Date of Birth:</td><td><?php echo $birthday; ?></td></tr>
                        <tr><td class="td-head">Address:</td><td><?php echo $address; ?></td></tr>
                        <tr><td class="td-head">Mobile Number:</td><td><?php echo $contact; ?></td></tr>
                        <tr><td class="td-head">Email Address:</td><td><?php echo $email; ?></td></tr>
                   </tbody>

                </table>
                

            </div>
        </main>


        <!-- footer -->
        <!-- <footer>
            <div class="uk-position-bottom">
                <p class="uk-text-meta uk-text-center">Online Bank. Version 1.0.</p>
            </div>
        </footer> -->

    </body>
</html>