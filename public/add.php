<?php
include 'header.php';


if (isset($_POST['add'])) {

    foreach ($_FILES['upload']['name'] as $key => $name) {

        $fileName = $_FILES['upload']['name'][$key];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        var_dump($fileActualExt);

        $uploadDir = 'upload/';

        $maxSize = 2000000;
        $allowed = array('jpg','gif','png');

        if (in_array($fileActualExt, $allowed)) {
            if ($_FILES['upload']['error'][$key] == 0) {
                if ($_FILES['upload']['size'][$key] < $maxSize) {
                    $fileNameNew = 'image' . uniqid('', true) . '.' . $fileActualExt;
                    $uploadFile = $uploadDir . $fileNameNew;
                    move_uploaded_file($_FILES['upload']['tmp_name'][$key], $uploadFile);

                } else {
                    echo 'Your file is bigger than expected. Max ' . $maxSize/1000000 . ' mo )';
                }
            } else {
                echo 'There was an error uploading your files';
            }
        } else {
            echo 'you cannot upload of this type! ( type allowed ' . implode(', ', $allowed) . ')';
        }
    }

}

else {


    ?>

    <html>

    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <form action="add.php" method="post" name="add" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="upload">Ajouter un fichier</label>
                        <input type="file" multiple="multiple"  name="upload[]" id="upload"/>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
                    </div>
                    <button type="submit" name="add" class=" form-control"btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php

}