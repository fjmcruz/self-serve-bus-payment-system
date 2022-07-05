<?php
    session_start();
    require "credentials.php";
    $test="test";
    $username=$_SESSION['username'];
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>

<head>
    <title>Cashier's Dashboard</title>
    <link rel="stylesheet" type="text/css" href="cashierstyle.css">
</head>

<body onload=clock();>
    <header>
        <?php
            echo "<h2>$username<h2>"
        ?>
        <script type="text/javascript">
        function refresh() {
            var refresh = 1000; //REFRESH RATE
            mytime = setTimeout('clock()', refresh)
        }

        function clock() {
            var x = new Date()
            var datetime = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            var hours = x.getHours();
            var minutes = x.getMinutes();
            var ampm = x.getHours() >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            datetime = datetime + " | " + hours + ":" + minutes + ":" + x.getSeconds() + " " + ampm;
            document.getElementById('clock').innerHTML = datetime;
            refresh();
        }
        </script>
        <h2><span id='clock'></span></h2>
    </header>
    <div id="navigation">
        <nav>
            <input type="button" name="dashboard" class="button" value="DASHBOARD" onclick="window.location.href='cashierhome.php'">
            <input type="button" name="ticket" class="button" value="TICKET" onclick="window.location.href='cashierrouteselection.php'">
            <input type="button" name="load" class="button" value="LOAD" onclick="window.open('load.php', 'load', 'width=540, height=400')">
            <input type="button" name="myaccount" class="button" value="MY ACCOUNT" onclick="window.location.href='cashieraccount.php'">
            <input type="button" name="commuters" class="button" value="COMMUTERS" onclick="window.location.href='cashiercommuters.php'">
            <input type="button" name="logout" class="button" value="LOGOUT" onclick="window.location.href='logoutaction.php'">
        </nav>
    </div>
    <div id="containerone">
        <h2>TERMINAL SCHEDULE:</h2>
        <table>
            <tr>
                <th>ROUTE:</th>
                <th>TIME:</th>
                <th>DATE:</th>
                <th>FARE:</th>
                <th>BUS#:</th>
                <th>SLOTS:</th>
                <th>STATUS:</th>
            </tr>
            <?php
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM terminalschedule 
                        ORDER BY Dispatch_Time ASC";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Route"] . "</td>" .
                        "<td>" . date('h:i A', strtotime($row["Dispatch_Time"])) . "</td>" . 
                        "<td>" . date('M d Y', strtotime($row["Dispatch_Date"])) . "</td>" . 
                        "<td>" . $row["Fare"] . "</td>" .
                        "<td>" . $row["Bus_Number"] . "</td>" .
                        "<td>" . $row["Slots"] . " / 53 </td>" .
                        "<td>" . $row["Status"] . "</td></tr>";
                    }
                }
            ?>
        </table>
        <br>
    </div>
</body>

</html>