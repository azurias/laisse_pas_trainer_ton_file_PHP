<?php require "script.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laisse pas trainer ton file !</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
    <input type="submit" value="Upload!" />
</form>
<?php
$uploadDirectory = 'upload/';
$images = scandir($uploadDirectory);
?>
<div class="row">
    <?php foreach ($images as $image) :
        if ($image !== '.' && $image !== '..'):?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <?='<img src="' . $uploadDirectory . $image . '/> '?>
            <div class="caption">
                <p><?= $image ?></p>
                <form action="delete.php" method="post">
                    <input type="hidden" name="delete" value="<?= $uploadDirectory . $image?>">
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
            </div>
        </div>
    </div>
            <?php endif ?>
    <?php endforeach;?>
</div>
</body>
<!-- Latest compiled and minified JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>