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
        <h2>TICKET TRANSACTIONS</h2>
        <form action="ticketsearchaction.php" target="POPUP" onsubmit="POPUP=window.open('about:blank','POPUP','width=1800,height=600');">
            <input type="text" name="search" class="searchbar" placeholder="SEARCH....">
            <input type="submit" name="submit" class="searchbutton" value="SEARCH & FILTER">
        </form>
        <?php
            $resultsperpage = 100;
            if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page = 1; }; 
            $startfrom = ($page - 1) * $resultsperpage;
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT COUNT(ID) 
                    AS TOTAL 
                    FROM tickettransactions";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalpages = ceil($row["TOTAL"] / $resultsperpage);
            echo "<h4>PAGE: " . $page . " OF " . $totalpages . "</h4>"; 
        ?>
        <table>
            <tr>
                <th>YEAR:</th>
                <th>MONTH:</th>
                <th>DATE:</th>
                <th>TIME:</th>
                <th>SOURCE:</th>
                <th>USERNAME:</th>
                <th>ROUTE:</th>
                <th>BUS#:</th>
                <th>DISPATCH TIME:</th>
                <th>DISPATCH DATE:</th>
                <th>SEATS:</th>
                <th>FARE:</th>
                <th>STATUS:</th>
            </tr>
            <?php
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM tickettransactions 
                        ORDER BY Year DESC, Month DESC, Date DESC, Time DESC 
                        LIMIT $startfrom, ".$resultsperpage."";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Year"] . "</td>" .
                        "<td>" . $row["Month"] . "</td>" . 
                        "<td>" . $row["Date"] . "</td>" . 
                        "<td>" . date('h:i A', strtotime($row["Time"])) .  "</td>" .
                        "<td>" . $row["Source"] . "</td>" .
                        "<td>" . $row["Username"] . "</td>" .
                        "<td>" . $row["Route"] . "</td>" .
                        "<td>" . $row["Bus_Number"] . "</td>" .
                        "<td>" . date('h:i A', strtotime($row["Dispatch_Time"])) . "</td>" .
                        "<td>" . date('M/d', strtotime($row["Dispatch_Date"])) . "</td>" .
                        "<td>" . $row["Seats"] . "</td>" .
                        "<td>" . $row["Fare"] . "</td>" . 
                        "<td>" . $row["Status"] . "</td></tr>"; 
                    }                    
                }
            ?>
        </table>
        <div id="pagination">
            <?php
                if ($page > 1) {
                    echo "<a href='tickettransactions.php?page=".($page - 1)."'><</a>";
                }
                for ($i = max(1, $page - 5); $i <= min($page + 5, $totalpages); $i++) {
                    echo "<a href='tickettransactions.php?page=".$i."'";
                    if ($i == $page) echo "class='currentpage'";
                    echo ">".$i."</a>";
                }
                if ($totalpages > 1 && $page != $totalpages) {
                    echo "<a href='tickettransactions.php?page=".($page + 1)."'>></a>";
                }
            ?>
        </div>
    </div>
</body>

</html>