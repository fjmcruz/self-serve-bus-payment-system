<?php
    session_start();
    require "credentials.php";
    $test = "test";
    $username = $_SESSION['username'];
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>

<head>
    <title>Administrator's Dashboard</title>
    <link rel="stylesheet" type="text/css" href="administratorstyle.css">
</head>

<body onload=clock();>
    <header>
        <?php
            echo "<h2>$username</h2>";
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
        <form method="POST">
            <input type="button" name="dashboard" class="button" value="DASHBOARD" onclick="window.location.href='administratorhome.php'">
            <div class="dropdown">
                <input type="button" name="transactions" class="button" value="TRANSACTIONS">
                <div class="dropdowncontent">
                    <a href="tickettransactions.php">Ticket Transactions</a>
                    <a href="loadtransactions.php">Load Transactions</a>
                </div>
            </div>
            <input type="button" name="myaccount" class="button" value="MY ACCOUNT" onclick="window.location.href='administratoraccount.php'">
            <div class="dropdown">
                <input type="button" name="employees" class="button" value="EMPLOYEES" onclick="window.location.href='administratoremployees.php'">
                <div class="dropdowncontent">
                    <a href="administratoremployees.php">Employee List</a>
                    <a onclick="window.open('addemployee.php', 'addemployee','width=540, height=600')">Add Employee</a>
                </div>
            </div>
            <input type="button" name="commuters" class="button" value="COMMUTERS" onclick="window.location.href='administratorcommuters.php'">
            <input type="button" name="logout" class="button" value="LOGOUT" onclick="window.location.href='logoutaction.php'">
        </form>
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
                <th>ACTION:</th>
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
                        "<td>" . $row["Status"] . "</td>" .
                        "<td>" . "<a href='deleteschedule.php?id=".$row["ID"]."' class='delete'>DELETE</a>" . "</td></tr>"; 
                    }
                }
            ?>
        </table>
        <input type="button" name="addroute" class="button" value="ADD ROUTE" onclick="window.open('addroute.php', 'addroute','width=540, height=600')">
    </div>
</body>

</html>