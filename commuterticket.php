<?php
    require_once 'phpqrcode/qrlib.php';
    session_start();
    $QR_Ticket = $_SESSION['QR_Ticket'];
    QRcode::png($QR_Ticket, $outfile = false, $level = QR_ECLEVEL_L, $size = 6, $margin = 4);
?>