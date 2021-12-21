<?php
include 'phpqrcode/qrlib.php';
$id = $_POST['qr-id'];
if (!empty($id)) {
    $file = "images/qr_code.png";
    $ecc = 'H';
    $pixel_size = 20;
    $frame_size = 5;
    QRcode::png($id, $file, $ecc, $pixel_size, $frame_size);
    header('location: index.php?path=' . $file . "&value=" . $id);
} else {
    header('location: index.php?error=text');
}
