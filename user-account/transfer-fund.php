<?php 

include('php/session.php');
$userid = $_GET['user'];

include('php/transferfunds-model.php');

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
                <a href="#dashboard" class="uk-navbar-item uk-logo uk-padding-small uk-light">MNL Online Bank</a>
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
                    <li class="uk-active uk-text-bold"><a href="transfer-fund.php?user=<?php echo $userid; ?>">Fund Transfer</a></li>
                    <li><a href="account.php?user=<?php echo $userid; ?>">My Account</a></li>
                </ul>
            </div>
        </nav>

        <!--main content / dashboard-->
        <main class="uk-container-large uk-padding uk-margin-auto">
            <div class="uk-width-xlarge uk-margin-auto">
                <?php echo $transfer_alert; ?>
                <h2>Transfer Fund</h2>

                <form action="<?php $_PHP_SELF?>" method="GET">
                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Receiver Details</legend>
                        <div class="uk-margin uk-hidden">
                            <label>Acount No.</label>
                            <input class="uk-input" type="user" placeholder="12-Digit Account Number" name="user" value="<?php echo $userid; ?>">
                        </div>
                        <div class="uk-margin">
                            <label>Acount No.</label>
                            <input class="uk-input" type="number" placeholder="12-Digit Account Number" name="recipient" required>
                        </div>
                        <div class="uk-margin">
                            <label>Amount</label>
                            <input class="uk-input" type="number" placeholder="Amount" name="amount" required>
                        </div>
                        <button class="uk-button uk-button-secondary" type="submit" name="transfer" value="transfer">Submit</button>
                    </fieldset>
                </form>
            </div>
        </main>


        <!-- footer -->
        <!-- <footer>
            <div class="uk-position-bottom">
                <p class="uk-text-meta uk-text-center">Online Bank. Version 3.0.</p>
            </div>
        </footer> -->

    </body>
</html>