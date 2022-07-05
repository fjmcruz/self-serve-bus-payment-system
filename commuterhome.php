<?php
    session_start();
    date_default_timezone_set('Asia/Manila');
    require "credentials.php";
    $test = "test";
    $username = $_SESSION['username'];
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>

<head>
    <title>S.S.B.P.S | Home</title>
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
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScX7AkHm5YvQW2RWf3TSd--NgbWeghu7lIqwEgjzHQ867re4w/viewform?fbclid=IwAR1BO9eDN7y4Uywt2EJMp3u4jNalHWNwDqW4_j5MUp149rqXntRsYdrgMJw" target="_blank" class="navigation-link">
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
    <div id="container">
        <div id="ticket">
            <h2>TICKET:</h2>
            <?php
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM commuteraccounts 
                        WHERE Username = '".$username."'";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $Date = $row["Dispatch_Date"];
                    if (empty($row["Ticket"])) {
                        echo "<h2>You don't have a ticket yet!</h2>";
                        $ticket = 0;
                    } else {
                        echo "<h2>" . "BUS#" . $row["Bus_Number"] . " - " . $row["Route"] . " - " . "@" . date('M d', strtotime($row["Dispatch_Date"])) . ", " . date('h:i A', strtotime($row["Dispatch_Time"])) . "</h2>";
                        echo "<h2>Seats: " . $row["Seats"] . "</h2>";
                        $QR_Ticket = $row["Ticket"];
                        $_SESSION['QR_Ticket'] = $QR_Ticket;
                        $ticket = 1;
                        $Route = $row["Route"];
                        $Dispatch_Time = $row["Dispatch_Time"];
                        $Bus_Number = $row["Bus_Number"];
                        $Status = $row["Status"];
                    }
                }
            ?>
            <img src="commuterticket.php" width="280px" height="280px" <?php if ($ticket == 0) {echo"hidden";} ?>>
            <?php
                if ($ticket == 1) {
                    if ($Status == "Unverified") {
                        $sql = "SELECT Status, Dispatch_Date
                                FROM terminalschedule 
                                WHERE Route = '".$Route."' AND Dispatch_Time = '".$Dispatch_Time."' AND Bus_Number = '".$Bus_Number."'";
                        $result = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row["Status"]=="Available") {
                                echo "<p>Please present this QR Code ticket to the bus condcutor during boarding.</p>";
                            }
                            // Missed bus if() statement:
                            if ($row["Status"]=="In-Transit" || date('M d Y', strtotime($Date))<date('M d Y', strtotime($row["Dispatch_Date"]))) { 
                                $sql = "UPDATE commuteraccounts 
                                        SET Ticket = '', Bus_Number = '', Route ='', Dispatch_Time = '', Dispatch_Date = '', Seats = '', Status = ''
                                        WHERE Username = '".$username."'";
                                mysqli_query($connection, $sql);
                                echo "<script>alert('You have missed your trip, your ticket will be deleted :('); location.reload();</script>";
                            }
                        }
                    } else if ($Status == "Verified") {
                        $sql = "UPDATE commuteraccounts 
                                SET Ticket = '', Bus_Number = '', Route ='', Dispatch_Time = '', Dispatch_Date = '', Seats = '', Status = ''
                                WHERE Username ='".$username."'";
                                mysqli_query($connection, $sql);
                        echo "<script>alert('Your ticket has been verified and will be deleted. Thank you for using our services :)'); location.reload();</script>";
                    }
                }
            ?>
            <input type="<?php if ($ticket == 1) {echo"hidden";} else {echo"button";} ?>" name="booknow" class="button" value="BOOK NOW!" onclick="window.location.href='booknowrouteselection.php'">
        </div>
        <div id="schedule">
            <h2>SCHEDULE:</h2>
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
                            "<td>" . $row["Slots"] . " / 53</td>" .
                            "<td>" . $row["Status"] . "</td></tr>";
                        }
                    }
                ?>
            </table>
            <br>
        </div>
    </div>
</body>

</html>