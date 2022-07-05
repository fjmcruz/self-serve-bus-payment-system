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
        <h2>COMMUTERS:</h2>
        <form action="cashiercommutersearchaction.php" target="POPUP" onsubmit="POPUP=window.open('about:blank','POPUP','width=1000,height=400');">
            <input type="text" name="search">
            <input type="submit" name="submit" value="SEARCH">
        </form>
        <?php
            $resultsperpage = 100;
            if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page = 1; }; 
            $startfrom = ($page - 1) * $resultsperpage;
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT COUNT(ID) 
                    AS TOTAL 
                    FROM commuteraccounts";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalpages = ceil($row["TOTAL"] / $resultsperpage);
            echo "<h4>PAGE: " . $page . " OF " . $totalpages . "</h4>"; 
        ?>
        <table>
            <tr>
                <th>USERNAME</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CONTACT#:</th>
                <th>BALANCE</th>
            </tr>
            <?php
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM commuteraccounts 
                        ORDER BY ID ASC 
                        LIMIT $startfrom, ".$resultsperpage."";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["Username"] . "</td>" . 
                        "<td>" . $row["Name"] . "</td>" .
                        "<td>" . $row["Email"] . "</td>" .
                        "<td>" . $row["Contact"] . "</td>" . 
                        "<td>" . $row["Balance"] . "</td></tr>";
                    }
                }
            ?>
        </table>
        <div id="pagination">
            <?php
                if ($page > 1) {
                    echo "<a href='cashiercommuters.php?page=".($page - 1)."'><</a>";
                }
                for ($i=max(1, $page - 5); $i<=min($page + 5, $totalpages); $i++) {
                    echo "<a href='cashiercommuters.php?page=".$i."'";
                    if ($i == $page) echo "class='currentpage'";
                    echo ">".$i."</a>";
                }
                if ($totalpages > 1 && $page != $totalpages) {
                    echo "<a href='cashiercommuters.php?page=".($page + 1)."'>></a>";
                }
            ?>
        </div>
    </div>
</body>

</html>