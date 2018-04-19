<?php
/**
 * Created by PhpStorm.
 * User: takne
 * Date: 10/04/18
 * Time: 15:27
 */

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','gif','pnj');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000) {
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = 'upload/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo 'Your file is bigger than expected. Max ... )';
            }

        } else {
            echo 'There was an error uploading your files';
        }
    } else {
        echo 'you cannot upload of this type! ( type allowed ...)';
    }

}