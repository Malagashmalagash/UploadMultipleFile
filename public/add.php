<?php
include 'header.php';


if (isset($_POST['add'])) {

    foreach ($_FILES['upload']['name'] as $key => $name) {

        $fileName = $_FILES['upload']['name'][$key];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $uploadDir = 'upload/';

        $maxSize = 1000000;
        $allowed = array('jpg', 'gif', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($_FILES['upload']['error'][$key] == 0) {
                if ($_FILES['upload']['size'][$key] < $maxSize) {
                    $fileNameNew = 'image' . uniqid('', true) . '.' . $fileActualExt;
                    $uploadFile = $uploadDir . $fileNameNew;
                    move_uploaded_file($_FILES['upload']['tmp_name'][$key], $uploadFile);

                } else {
                    echo 'Your file is bigger than expected. Max ' . $maxSize / 1000000 . ' mo )';
                }
            } else {
                echo 'There was an error uploading your files';
            }
        } else {
            echo 'you cannot upload of this type! ( type allowed ' . implode(', ', $allowed) . ')';
        }
    }
}
    include 'addForm.php';
    include 'footer.php';

