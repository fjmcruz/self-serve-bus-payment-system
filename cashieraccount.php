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
        <?php
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT * 
                    FROM employeeaccounts 
                    WHERE Username = '$username'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <h2>MY ACCOUNT:</h2>
        <table>
            <tr>
                <td><b>Type:</b></td>
                <td>
                    <b><?php echo $row["Type"]; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Name:</b></td>
                <td>
                    <b><?php echo $row["Name"]; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Username:</b></td>
                <td>
                    <b><?php echo $username; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td>
                    <b><?php echo $row["Email"]; ?></b>
                </td>
            </tr>
            <tr>
                <td><b>Contact#:</b></td>
                <td>
                    <b><?php echo $row["Contact"]; ?></b>
                </td>
            </tr>
        </table>
        <input type="button" name="cashierchangepassword" class="button" value="CHANGE PASSWORD" onclick="window.open('employeechangepassword.php', 'cashierchangepassword', 'width=600, height=400')">
    </div>
</body>

</html>