<?php
include("config.php");
$userid = $_GET['user'];
$transfer_alert = "";

$sql_query = "SELECT * FROM accounts WHERE accountno = (SELECT accountno FROM users WHERE userid='$userid')";
$result = $conn->query($sql_query);
$row = $result->fetch_assoc();

$accountno = $row['accountno'];
$balance = $row['balance'];

if(isset($_GET['transfer'])){

    if(validateRecipient($userid) == True){
        if(validateAmount($balance) == True){
           
            include("config.php");
            date_default_timezone_set('Asia/Bangkok');
            $date = new DateTime();
            $transactionid = date_format($date, "mdYhis");
            $accountorig = (String)$accountno;
            $accountrecip = (String)$_GET['recipient'];
            $amount =  $_GET['amount'];
            $currbalance = (int)((int)$balance - (int)$_GET['amount']);
            $transtype = "FUND TRANSFER";
            $transdate = date("Y-m-d");
            $status = "COMPLETE";

            $sql = "INSERT INTO transactions (transactionid, accountorig, accountrecip, amount, curbalance, transtype, transdate, transtatus) VALUES ('$transactionid', '$accountorig', '$accountrecip', $amount, $currbalance,'$transtype', '$transdate', '$status')";
            
            if($conn->query($sql) == True){

                $sql_query = "UPDATE accounts SET balance='$currbalance' WHERE accountno='$accountorig'";
                if($conn->query($sql_query) == True ){

                    $transfer_alert = '<div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>You have successully transferred the fund.</p></div>';

                } 

                $sql_rbal = "SELECT * FROM accounts WHERE accountno='$accountrecip'";
                $result = $conn->query($sql_rbal);
                $row = $result->fetch_assoc();
                $rec_bal = (int)$row['balance'] + (int)$amount;

                $sql_query = "UPDATE accounts SET balance='$rec_bal' WHERE accountno='$accountrecip'";
                if($conn->query($sql_query) == True ){
 
                }
               
            } 

        }else{
            $transfer_alert = '<div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>Transaction failed. You have no enough credit to transfer funds.</p></div>';

        }
        
    }else{
        $transfer_alert = '<div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>Transaction failed. Please enter a valid account number.</p></div>';
    }

}

function validateRecipient(Int $userid){
    
    $isExist = False;
    include("config.php");
    $recipient = $_GET['recipient'];
    $sql_query = "SELECT * FROM accounts WHERE accountno='$recipient'";
    $result = $conn->query($sql_query);

    if($result->num_rows > 0){

        $isExist = True;
        
    }

    return $isExist;

}

function validateAmount(String $balance){

    $amount = $_GET['amount'];
    
    $isValidAmount = False;

    if((int)$balance >= (int)$amount){
        $isValidAmount = True;
    }

    return $isValidAmount;

}





?>