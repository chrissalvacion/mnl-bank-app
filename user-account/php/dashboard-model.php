<?php
include('php/config.php');
$userid = $_GET['user'];
$balance = 0;
$status = "";

if(isset($_GET['user'])){

    $sql_query = "SELECT * FROM accounts WHERE accountno = (SELECT accountno FROM users WHERE userid='$userid')";
    $result = $conn->query($sql_query);
    $row = $result->fetch_assoc();

    $accountno = $row['accountno'];
    $balance = number_format($row['balance'], 2);
    $status = $row['status'];
    $conn->close();
}

function getRecentTransactions(String $accountno){
    
    include('php/config.php');
    $sql_query = "SELECT * FROM transactions WHERE accountorig='$accountno' or accountrecip='$accountno' ORDER BY transactionid DESC LIMIT 5";
    $result = $conn->query($sql_query);

    if($result->num_rows > 0){
        echo '<table class="uk-table uk-table-small">
        <thead><tr><th>AMOUNT</th><th></th><th>TYPE</th><th>DATE</th><th>STATUS</th></tr>';
        while($row = $result->fetch_assoc()){
            echo "<tr><td>" . number_format($row['amount']) . "</td><td><span uk-icon='icon:info' uk-tooltip='title: Transaction ID: " . $row['transactionid'] . "<br> Account Origin: " . $row['accountorig'] . "<br> Account Recipient: " . $row ['accountrecip'] . "; pos: right'></td><td>" . $row['transtype'] . "</td><td>" . $row['transdate'] . "</td><td>" . $row['transtatus'] . "</td></tr>";
        }
        echo '</table>';
    }else{
        echo '<span class="uk-text-muted">No recent transactions.</span>';
    }
}

?>