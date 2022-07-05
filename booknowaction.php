<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    require "credentials.php";
    $test = "test";
    $username = $_SESSION['username'];
    $Commuter_Balance = $_SESSION['Commuter_Balance'];
    $ID = $_SESSION['ID'];
    $Route = $_SESSION['Route'];
    $Dispatch_Time = $_SESSION['Dispatch_Time'];
    $Dispatch_Date = $_SESSION['Dispatch_Date'];
    $Fare = $_SESSION['Fare'];
    $Bus_Number = $_SESSION['Bus_Number'];
    $Seat = $_SESSION['Seat'];
    $Seat_String = $_SESSION['Seat_String'];
    $Ticket = $_SESSION['Ticket'];
    $Year = date("Y");
    $Month = date("m");
    $Date = date("d");
    $Time = date("H:i");
    $Source = "Web-Application";
    $connection = mysqli_connect($host, $system, $password, $database);
    foreach ($Seat as $Value) {
        $sql = "SELECT * FROM terminalschedule WHERE ID = ".$ID." AND ".$Value." = '0'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo "<script>window.location.href='commuterseaterror.php'</script>";
            exit();
        } 
    }
    if ($Commuter_Balance >= $Fare) {
        if (in_array("A1", $Seat)) {
            $sql = "UPDATE terminalschedule SET A1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND A1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("A2", $Seat)) {
            $sql = "UPDATE terminalschedule SET A2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND A2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("A3", $Seat)) {
            $sql = "UPDATE terminalschedule SET A3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND A3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("A4", $Seat)) {
            $sql = "UPDATE terminalschedule SET A4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND A4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("B1", $Seat)) {
            $sql = "UPDATE terminalschedule SET B1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND B1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("B2", $Seat)) {
            $sql = "UPDATE terminalschedule SET B2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND B2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("B3", $Seat)) {
            $sql = "UPDATE terminalschedule SET B3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND B3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("B4", $Seat)) {
            $sql = "UPDATE terminalschedule SET B4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND B4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("C1", $Seat)) {
            $sql = "UPDATE terminalschedule SET C1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND C1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("C2", $Seat)) {
            $sql = "UPDATE terminalschedule SET C2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND C2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("C3", $Seat)) {
            $sql = "UPDATE terminalschedule SET C3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND C3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("C4", $Seat)) {
            $sql = "UPDATE terminalschedule SET C4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND C4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("D1", $Seat)) {
            $sql = "UPDATE terminalschedule SET D1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND D1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("D2", $Seat)) {
            $sql = "UPDATE terminalschedule SET D2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND D2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("D3", $Seat)) {
            $sql = "UPDATE terminalschedule SET D3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND D3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("D4", $Seat)) {
            $sql = "UPDATE terminalschedule SET D4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND D4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("E1", $Seat)) {
            $sql = "UPDATE terminalschedule SET E1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND E1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("E2", $Seat)) {
            $sql = "UPDATE terminalschedule SET E2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND E2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("E3", $Seat)) {
            $sql = "UPDATE terminalschedule SET E3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND E3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("E4", $Seat)) {
            $sql = "UPDATE terminalschedule SET E4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND E4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("F1", $Seat)) {
            $sql = "UPDATE terminalschedule SET F1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND F1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("F2", $Seat)) {
            $sql = "UPDATE terminalschedule SET F2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND F2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("F3", $Seat)) {
            $sql = "UPDATE terminalschedule SET F3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND F3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("F4", $Seat)) {
            $sql = "UPDATE terminalschedule SET F4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND F4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("G1", $Seat)) {
            $sql = "UPDATE terminalschedule SET G1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND G1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("G2", $Seat)) {
            $sql = "UPDATE terminalschedule SET G2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND G2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("G3", $Seat)) {
            $sql = "UPDATE terminalschedule SET G3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND G3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("G4", $Seat)) {
            $sql = "UPDATE terminalschedule SET G4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND G4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("H1", $Seat)) {
            $sql = "UPDATE terminalschedule SET H1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND H1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("H2", $Seat)) {
            $sql = "UPDATE terminalschedule SET H2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND H2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("H3", $Seat)) {
            $sql = "UPDATE terminalschedule SET H3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND H3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("H4", $Seat)) {
            $sql = "UPDATE terminalschedule SET H4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND H4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("I1", $Seat)) {
            $sql = "UPDATE terminalschedule SET I1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND I1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("I2", $Seat)) {
            $sql = "UPDATE terminalschedule SET I2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND I2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("I3", $Seat)) {
            $sql = "UPDATE terminalschedule SET I3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND I3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("I4", $Seat)) {
            $sql = "UPDATE terminalschedule SET I4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND I4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("J1", $Seat)) {
            $sql = "UPDATE terminalschedule SET J1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND J1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("J2", $Seat)) {
            $sql = "UPDATE terminalschedule SET J2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND J2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("J3", $Seat)) {
            $sql = "UPDATE terminalschedule SET J3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND J3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("J4", $Seat)) {
            $sql = "UPDATE terminalschedule SET J4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND J4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("K1", $Seat)) {
            $sql = "UPDATE terminalschedule SET K1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND K1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("K2", $Seat)) {
            $sql = "UPDATE terminalschedule SET K2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND K2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("K3", $Seat)) {
            $sql = "UPDATE terminalschedule SET K3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND K3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("K4", $Seat)) {
            $sql = "UPDATE terminalschedule SET K4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND K4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("L1", $Seat)) {
            $sql = "UPDATE terminalschedule SET L1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND L1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("L2", $Seat)) {
            $sql = "UPDATE terminalschedule SET L2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND L2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("L3", $Seat)) {
            $sql = "UPDATE terminalschedule SET L3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND L3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("L4", $Seat)) {
            $sql = "UPDATE terminalschedule SET L4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND L4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("M1", $Seat)) {
            $sql = "UPDATE terminalschedule SET M1 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND M1 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("M2", $Seat)) {
            $sql = "UPDATE terminalschedule SET M2 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND M2 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("M3", $Seat)) {
            $sql = "UPDATE terminalschedule SET M3 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND M3 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("M4", $Seat)) {
            $sql = "UPDATE terminalschedule SET M4 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND M4 = '0'";
            mysqli_query($connection, $sql);
        }
        if (in_array("M5", $Seat)) {
            $sql = "UPDATE terminalschedule SET M5 = '1', Slots = Slots + 1 WHERE ID = ".$ID." AND M5 = '0'";
            mysqli_query($connection, $sql);
        }
        $sql1 = "UPDATE commuteraccounts
                 SET Balance = Balance - '".$Fare."', Ticket = '".$Ticket."', Bus_Number = '".$Bus_Number."', Route = '".$Route."', Dispatch_Time = '".$Dispatch_Time."', Dispatch_Date = '".$Dispatch_Date."', Seats = '".$Seat_String."', Status = 'Unverified'             
                 WHERE Username = '".$username."'";
        $sql2 = "INSERT INTO tickettransactions (Year, Month, Date, Time, Source, Username, Ticket, Bus_Number, Route, Dispatch_Time, Dispatch_Date, Seats, Fare, Status)
                 VALUES ('".$Year."', '".$Month."', '".$Date."', '".$Time."', '".$Source."', '".$username."', '".$Ticket."', '".$Bus_Number."', '".$Route."', '".$Dispatch_Time."', '".$Dispatch_Date."', '".$Seat_String."', '".$Fare."', 'Unverified')";
        mysqli_query($connection,$sql1);
        mysqli_query($connection,$sql2);
        echo "<script>window.location.href='commuterhome.php'</script>";
        exit();
    } else {
        echo "<script>window.location.href='balanceerror.php'</script>";
    }
?>