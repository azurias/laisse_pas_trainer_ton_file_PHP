<?php


// fixe le niveau de rapport d'erreur
if (version_compare(phpversion(), '7.2', '>=') == 1) {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
} else {
    error_reporting(E_ALL & ~E_NOTICE);
}


function bytesToSize1024($bytes, $precision = 2)
{
    $unit = array('B', 'KB', 'MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision) . ' ' . $unit[$i];
}

if (isset($_FILES['myfile'])) {
    $sFileName = $_FILES['myfile']['name'];
    $sFileType = $_FILES['myfile']['type'];
    $sFileSize = bytesToSize1024($_FILES['myfile']['size'], 1);



//    if (count($_FILES['myfile']['name']) > 0) {
//Loop through each file
        /*for ($i = 0;
             $i < count($_FILES['myfile']['name']);
             $i++) {*/
//Get the temp file path
            $tmpFilePath = $_FILES['myfile']['tmp_name'];

//Make sure we have a filepath
            if ($tmpFilePath != "") {

//save the filename
                $shortname = $_FILES['myfile']['name'];

//save the url and the file
                $filePath = "upload/" . date('d-m-Y-H-i-s') . '-' . $_FILES['myfile']['name'];

//Upload the file into the temp dir
                if (move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;

                    echo "<div class=\"s\">
                        <p>Le fichier : $sFileName a été correctement transféré.</p>
                        <p>Type : $sFileType</p>
                        <p>Taille : $sFileSize</p>
                        <img src=\"$filePath\">
                    </div>";
                } else {
                    echo '<div class="f">Une erreur s\'est produite</div>';
                }
            }
        //}
    //}
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Laisse pas trainer ton file !</title>
    <link rel="icon" type="image/png"
          href="https://wildcodeschool.fr/wp-content/uploads/2017/01/logo_orange_pastille.png">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="src/css/style.css"/>
</head>

<div class="container">
    <div class="contr"><h2>Glissez - déposez vos fichiers dans la «&#160;zone de drop&#160;» (maximum cinq fichiers -
            taille maximale par fichier 1&#160;mo)</h2></div>
    <div class="upload_form_cont">
        <div id="dropArea">Zone de drop</div>
        <div class="info">
            <div>Fichiers restants : <span id="count">0</span></div>
            <div>URL de destination : <input id="url" value=""/></div>
            <h2>Résultat :</h2>
            <div id="result"></div>

            <canvas width="500" height="20"></canvas>
        </div>
    </div>
</div>
<script src="src/js/script.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
