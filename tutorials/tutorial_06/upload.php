<?php
$tmp = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$dir = $_POST['folder'];
$maxsize    = 2097152;
if (!empty($name)) {
    if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
        header('location: index.php?size=choose');
    } elseif (empty($dir)) {
        $dir = "upload";
        mkdir($dir);
        $folder = $dir . "/" . $name;
        move_uploaded_file($tmp, $folder);
        header('location: index.php?success=save');
    } elseif (is_dir($dir) === false) {
        mkdir($dir);
        $folder = $dir . "/" . $name;
        move_uploaded_file($tmp, $folder);
        header('location: index.php?success=save');
    } else {
        $folder = $dir . "/" . $name;
        move_uploaded_file($tmp, $folder);
        header('location: index.php?success=save');
    }
} else {
    header('location: index.php?error=choose');
}
