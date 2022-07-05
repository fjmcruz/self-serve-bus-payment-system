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
    <title>S.S.B.P.S | Ticket Reservation</title>
    <link rel="stylesheet" type="text/css" href="commuterstyle.css">
    <meta name="viewport" content="initial-scale=0.8, maximum-scale=0.8">
</head>

<body>
    <nav class="navigationbar">
        <ul class="navigationbar-navigation">
            <li class="logo">
                <a href="#" class="navigation-expand">
                    <img src="images/expand.svg">
                    <span class="link-text">
                        <h4>S.S.B.P.S</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="commuterhome.php" class="navigation-link">
                    <img src="images/commuterhome.svg">
                    <span class="link-text">
                        <h4>Home</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="commuteraccount.php" class="navigation-link">
                    <img src="images/commuteraccount.svg">
                    <span class="link-text">
                        <h4>Account</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="commutersurvey.php" class="navigation-link">
                    <img src="images/survey.svg">
                    <span class="link-text">
                        <h4>Survey</h4>
                    </span>
                </a>
            </li>
            <li class="navigation-item">
                <a href="logoutaction.php" class="navigation-link">
                    <img src="images/logout.svg">
                    <span class="link-text">
                        <h4>Logout</h4>
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <header>
        <?php
            echo "<h2>$username</h2>";
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT Balance 
                    FROM commuteraccounts 
                    WHERE Username = '".$username."'";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<h2>BALANCE: " . $row['Balance'] . "</h2>"; 
            }
        ?>
    </header>
    <div id="table">
        <form action="booknowseatreservation.php" class="form" method="POST">
            <h4>ROUTE SELECTION:</h4>
            <select name="routedetails" required>
                <option value="" disabled selected>Select your desired destination:</option>
                <?php
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
            <input type="button" name="cancel" class="button" value="CANCEL" onclick="window.location.href='commuterhome.php'">
            <input type="submit" name="submit" class="button" value="NEXT">
        </form>
    </div>
</body>

</html>