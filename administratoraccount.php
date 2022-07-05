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
        <input type="button" name="administratorchangepassword" class="button" value="CHANGE PASSWORD" onclick="window.open('employeechangepassword.php', 'administratorchangepassword','width=600, height=400')">
    </div>
</body>

</html>