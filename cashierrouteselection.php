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
        <form action="cashierseatreservation.php" class="form" method="POST">
            <h4>ROUTE SELECTION:</h4>
            <select name="routedetails" required>
                <option value="" disabled selected>Select your desired destination:</option>
                <?php
                    $connection = mysqli_connect($host, $system, $password, $database);
                    $sql = "SELECT ID, Route, Dispatch_Time, Dispatch_Date, Fare, Bus_Number
                            FROM terminalschedule
                            WHERE Status = 'Available'
                            ORDER BY Dispatch_Time ASC";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ID = $row['ID'];
                        $Route = $row['Route'];
                        $Dispatch_Time = $row['Dispatch_Time'];
                        $Dispatch_Date = $row['Dispatch_Date'];
                        $Fare = $row['Fare'];
                        $Bus_Number = $row['Bus_Number'];
                        echo "<option name='routedetails' value='$ID'>BUS#$Bus_Number $Route [" . date('M/d', strtotime($Dispatch_Date)) . " @ " . date('h:i A', strtotime($Dispatch_Time)) . "] - ₱$Fare</option>";
                    }
                ?>
            </select>
            <input type="button" name="cancel" class="button" value="CANCEL" onclick="window.location.href='cashierhome.php'">
            <input type="submit" name="submit" class="button" value="NEXT">
        </form>
    </div>
</body>

</html>