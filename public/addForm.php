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