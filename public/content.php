<?php
        $dir = 'upload/';
        $files = scandir($dir,1);

?>


<body>

<div class="container">
    <div class="row">


        <?php for($i=0; $i<(count($files)-2) ;$i++) : ?>

            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?=$dir.$files[$i]?>"/>
                    <div class="caption text-center">
                        <h5><?="$files[$i]"?></h5>
                        <p><a href="<?="delete.php?id=$files[$i]"?>" class="btn btn-warning" role="button">Delete</a></p>
                    </div>
                </div>
            </div>

        <?php endfor ?>
    </div>
</div>
</body>

