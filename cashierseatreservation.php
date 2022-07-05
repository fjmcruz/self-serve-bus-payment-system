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
    <div id="table">
        <?php
            session_start();
            $Route_Details = $_POST['routedetails'];
            $_SESSION['Route_Details'] = $Route_Details;
            $connection = mysqli_connect($host, $system, $password, $database);
            $sql = "SELECT * 
                    FROM terminalschedule
                    WHERE ID = ".$Route_Details."";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $destination = $row['Route'];
                echo "<h4>SEAT RESERVATION FOR: $destination</h4>";
                $A1 = $row['A1'];
                $A2 = $row['A2'];
                $A3 = $row['A3'];
                $A4 = $row['A4'];
                $B1 = $row['B1'];
                $B2 = $row['B2'];
                $B3 = $row['B3'];
                $B4 = $row['B4'];
                $C1 = $row['C1'];
                $C2 = $row['C2'];
                $C3 = $row['C3'];
                $C4 = $row['C4'];
                $D1 = $row['D1'];
                $D2 = $row['D2'];
                $D3 = $row['D3'];
                $D4 = $row['D4'];
                $E1 = $row['E1'];
                $E2 = $row['E2'];
                $E3 = $row['E3'];
                $E4 = $row['E4'];
                $F1 = $row['F1'];
                $F2 = $row['F2'];
                $F3 = $row['F3'];
                $F4 = $row['F4'];
                $G1 = $row['G1'];
                $G2 = $row['G2'];
                $G3 = $row['G3'];
                $G4 = $row['G4'];
                $H1 = $row['H1'];
                $H2 = $row['H2'];
                $H3 = $row['H3'];
                $H4 = $row['H4'];
                $I1 = $row['I1'];
                $I2 = $row['I2'];
                $I3 = $row['I3'];
                $I4 = $row['I4'];
                $J1 = $row['J1'];
                $J2 = $row['J2'];
                $J3 = $row['J3'];
                $J4 = $row['J4'];
                $K1 = $row['K1'];
                $K2 = $row['K2'];
                $K3 = $row['K3'];
                $K4 = $row['K4'];
                $L1 = $row['L1'];
                $L2 = $row['L2'];
                $L3 = $row['L3'];
                $L4 = $row['L4'];
                $M1 = $row['M1'];
                $M2 = $row['M2'];
                $M3 = $row['M3'];
                $M4 = $row['M4'];
                $M5 = $row['M5'];
            }  
        ?>
        <div id="legend">
            <table class="seattable">
                <tr>
                    <td>
                        <h4>Taken:</h4>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input type="button" class="disabled" name="T" value="T"><span>T</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <h4>Available:</h4>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input type="button" name="A" value="A"><span>A</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <h4>Selected:</h4>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input type="button" name="S" value="S" disabled><span>S</span>
                            </label>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <form onsubmit="return validate()" action="cashierconfirmation.php" class="form" method="POST">
            <table class="seattable">
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input type="button" name="Driver" value="Driver" class="disabled" onclick="driver()"><span>👨‍✈️</span>
                            </label>
                        </div>
                    </td>
                    <td>E</td>
                    <td>X</td>
                    <td>I</td>
                    <td>T</td>
                </tr>
                <tr>
                    <td>_______</td>
                    <td>_______</td>
                    <td></td>
                    <td>_______</td>
                    <td>_______</td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="A1" <?php if ($A1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>A1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="A2" <?php if ($A2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>A2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="A3" <?php if ($A3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>A3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="A4" <?php if ($A4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>A4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="B1" <?php if ($B1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>B1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="B2" <?php if ($B2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>B2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="B3" <?php if ($B3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>B3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="B4" <?php if ($B4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>B4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="C1" <?php if ($C1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>C1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="C2" <?php if ($C2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>C2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="C3" <?php if ($C3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>C3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="C4" <?php if ($C4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>C4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="D1" <?php if ($D1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>D1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="D2" <?php if ($D2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>D2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="D3" <?php if ($D3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>D3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="D4" <?php if ($D4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>D4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="E1" <?php if ($E1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>E1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="E2" <?php if ($E2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>E2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="E3" <?php if ($E3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>E3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="E4" <?php if ($E4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>E4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="F1" <?php if ($F1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>F1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="F2" <?php if ($F2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>F2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="F3" <?php if ($F3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>F3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="F4" <?php if ($F4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>F4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="G1" <?php if ($G1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>G1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="G2" <?php if ($G2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>G2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="G3" <?php if ($G3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>G3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="G4" <?php if ($G4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>G4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="H1" <?php if ($H1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>H1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="H2" <?php if ($H2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>H2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="H3" <?php if ($H3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>H3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="H4" <?php if ($H4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>H4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="I1" <?php if ($I1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>I1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="I2" <?php if ($I2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>I2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="I3" <?php if ($I3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>I3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="I4" <?php if ($I4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>I4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="J1" <?php if ($J1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>J1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="J2" <?php if ($J2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>J2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="J3" <?php if ($J3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>J3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="J4" <?php if ($J4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>J4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="K1" <?php if ($K1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>K1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="K2" <?php if ($K2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>K2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="K3" <?php if ($K3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>K3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="K4" <?php if ($K4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>K4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="L1" <?php if ($L1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>L1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="L2" <?php if ($L2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>L2</span>
                            </label>
                        </div>
                    </td>
                    <td></td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="L3" <?php if ($L3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>L3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="L4" <?php if ($L4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>L4</span>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="M1" <?php if ($M1 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>M1</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="M2" <?php if ($M2 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>M2</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="M3" <?php if ($M3 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>M3</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="M4" <?php if ($M4 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>M4</span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <div id="checkbutton">
                            <label>
                                <input name="seat[]" value="M5" <?php if ($M5 == 1) {echo"type='button' class='disabled' onclick='seattaken()'";} else {echo"type='checkbox'";} ?>><span>M5</span>
                            </label>
                        </div>
                    </td>
                </tr>
            </table>
            <input type="button" name="cancel" class="button" value="CANCEL" onclick="window.location.href='cashierhome.php'">
            <input type="submit" name="submit" class="button" value="NEXT">
            <div style="visibility:hidden; color:red;" id="check_error">
                <h2>Please select at least one seat before proceeding.</h2>
            </div>
            <script>
            function validate() {
                var form_data = new FormData(document.querySelector("form"));
                if (!form_data.has("seat[]")) {
                    document.getElementById("check_error").style.visibility = "visible";
                    return false;
                } else {
                    document.getElementById("check_error").style.visibility = "hidden";
                    return true;
                }
            }

            function seattaken() {
                alert("This seat is already taken!  🙁 ");
            }

            function driver() {
                alert("The driver seat cannot be taken! ❌ ");
            }
            </script>
        </form>
    </div>
</body>

</html>