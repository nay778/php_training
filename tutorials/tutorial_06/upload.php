<?php
$tmp = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$dir = $_POST['folder'];
if (!empty($tmp)) {
  if (empty($dir)) {
    $dir = "upload";
    $folder = $dir . "/" . $name;
    move_uploaded_file($tmp, $folder);
    header('location: index.php?success=save');
  } else if (is_dir($dir) === false) {
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
