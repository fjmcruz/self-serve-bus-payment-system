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
				$Commuter_Balance = $row['Balance'];
				$_SESSION['Commuter_Balance'] = $Commuter_Balance;
            }
        ?>
    </header>
    <div id="table">
        <div id="finalticket">
            <?php
				session_start();
				$Route_Details = $_SESSION['Route_Details'];
				$Seat = $_POST['seat'];
				$_SESSION['Seat'] = $Seat;
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
				$Ticket = $Date . " " . "(" . $username . ")" . " " . "BUS#" .  $Bus_Number . " " . $Route . " [" . $Dispatch_Time . "] " . "SEAT/S: " . $Seat_String;
				$_SESSION['Seat_String'] = $Seat_String;
				$_SESSION['Ticket'] = $Ticket;
			?>
        </div>
        <form action="booknowaction.php" class="form" method="POST">
            <input type="button" name="cancel" class="button" value="CANCEL" onclick="window.location.href='commuterhome.php'">
            <input type="submit" name="submit" class="button" value="BOOK">
        </form>
    </div>
</body>

</html>