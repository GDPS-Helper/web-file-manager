<?php require_once '!chkpass.php';

if ($priority < 1) exit(-3);

$path = $_GET['dir'];

foreach ($_FILES['files']['tmp_name'] as $key => $tempFilePath) {
    $fileName = $_FILES['files']['name'][$key];
    $destination = $path . $fileName;

    if ($_FILES['files']['error'][$key] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($tempFilePath, $destination)) {
            //echo '<p color=green>'.$destination.'</p>';
            null;
        } else {
            //echo '<p color=yellow>'.$destination.'</p>';
            null;
        }
    }
}
include 'findFiles.php';