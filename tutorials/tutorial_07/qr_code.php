<?php
include 'phpqrcode/qrlib.php';
$id = $_POST['qr-id'];

function get_num_of_words($string)
{
    $string = preg_replace('/\s+/', ' ', trim($string));
    $words = explode(' ', $string);
    return count($words);
}

if (get_num_of_words($id) >= 7) {
    header('location: index.php?status=1');
} elseif (!empty($id)) {
    $path = 'images/';
    $file = $path . uniqid() . '.png';
    $ecc = 'L';
    $pixel_size = 20;
    $frame_size = 5;
    QRcode::png($id, $file, $ecc, $pixel_size, $frame_size);
    header('location: index.php?path=' . $file . '&value=' . $id);
} else {
    header('location: index.php?status=1');
}
