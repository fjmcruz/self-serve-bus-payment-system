<?php
    require "credentials.php";
    $connection = mysqli_connect($host, $system, $password, $database);
    $response = array();
    $Ticket = $_POST['Ticket'];
    $sql1 = "SELECT *
             FROM commuteraccounts
             WHERE Ticket = '".$Ticket."'";
    $sql2 = "SELECT *
             FROM tickettransactions
             WHERE Ticket = '".$Ticket."'";         
    $sql3 = "UPDATE commuteraccounts
             SET Status = 'Verified'
             WHERE Ticket = '".$Ticket."'";
    $sql4 = "UPDATE tickettransactions
             SET Status = 'Verified'
             WHERE Ticket = '".$Ticket."'";     
    $result1 = mysqli_query($connection, $sql1);
    $result2 = mysqli_query($connection, $sql2);
    if (mysqli_num_rows($result1) == 1) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $information = $row;
        }
        mysqli_query($connection, $sql3);
        mysqli_query($connection, $sql4);
        echo json_encode($information);
    } else if (mysqli_num_rows($result2) == 1) {
        while ($row = mysqli_fetch_assoc($result2)) {
            $information = $row;
        }
        mysqli_query($connection, $sql4);
        echo json_encode($information);
    } else {
        $response['Status'] = "Verified";
        echo json_encode($response);
    }
?>