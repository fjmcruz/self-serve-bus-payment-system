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
        <div id="finalticket">
            <p><img src="commuterticket.php" width="200px" height="200px"></p>
            <?php
                session_start();
                $Route_Details = $_SESSION['Route_Details'];
                $Seat = $_POST['seat'];
                $_SESSION['Seat'] = $Seat;
                $connection = mysqli_connect($host, $system, $password, $database);
                $sql = "SELECT * 
                        FROM terminalschedule
                        WHERE ID = ".$Route_Details."";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ID = $row['ID'];
                    $Route = $row['Route'];
                    $Dispatch_Time = $row['Dispatch_Time'];
                    $Dispatch_Date = $row['Dispatch_Date'];
                    $Fare = $row['Fare'] * count($Seat);
                    $Bus_Number = $row['Bus_Number'];
                    echo "<table>
                            <tr>
                                <td><b>Route:</b></td> 
                                <td>$Route</td>
                            </tr>
                            <tr>
                                <td><b>Date & Time:</b></td>
                                <td>" . date('M d Y', strtotime($Dispatch_Date)) . ", " . date('h:i A', strtotime($Dispatch_Time)) . "</td>
                            </tr>
                            <tr>
                                <td><b>Bus Number:</b></td>
                                <td>$Bus_Number</td>
                            </tr>
                            <tr>
                                <td><b>Fare:</b></td>
                                <td>$Fare</td>
                            </tr>
                            <tr>
                                <td><b>Seats:</b></td>
                                <td>";
                                    foreach ($Seat as $Item) { 
                                        $Seat_String = $Seat_String . $Item . " ";
                                        echo " [$Item] "; 
                                    } 
                    echo "      </td>
                            </tr>
                          </table> <br> Note: Tickets are non-refundable once booked, please make sure you have selected the right destination, time, and seat/s.";
                    $_SESSION['ID'] = $ID;
                    $_SESSION['Route'] = $Route;
                    $_SESSION['Dispatch_Time'] = $Dispatch_Time;
                    $_SESSION['Dispatch_Date'] = $Dispatch_Date;
                    $_SESSION['Fare'] = $Fare;
                    $_SESSION['Bus_Number'] = $Bus_Number;
                }
                $Date = date("Y/m/d h:i:s A");
                $Ticket = $Date . " " . "(" . "Cashier: " . $username . ")" . " " . "BUS#" .  $Bus_Number . " " . $Route . " [" . $Dispatch_Date . ", " . $Dispatch_Time . "] " . "SEAT/S: " . $Seat_String;
                $_SESSION['Seat_String'] = $Seat_String;
                $_SESSION['Ticket'] = $Ticket;
                $_SESSION['QR_Ticket'] = $Ticket;
            ?>
        </div>
        <script>
        function printticket() {
            var divcontents = document.getElementById("finalticket").innerHTML;
            var open = window.open('', '', 'height=600, width=600');
            open.document.write('<html><head>');
            open.document.write('<link rel="stylesheet" type="text/css" href="cashierstyle.css">');
            open.document.write('</head><body>');
            open.document.write('<div id="printticket">');
            open.document.write(divcontents);
            open.document.write('</div>');
            open.document.write('</body></html>');
            setTimeout(function() {
                mywindow.print();
            }, 4000);
            open.document.close();
            open.print();
        }
        </script>
        <form action="cashierticketaction.php" class="form" method="POST">
            <input type="button" name="cancel" class="button" value="CANCEL" onclick="window.location.href='cashierhome.php'">
            <input type="button" name="print" class="button" value="PRINT" onclick="printticket()">
            <input type="submit" name="submit" class="button" value="BOOK">
        </form>
    </div>
</body>

</html>