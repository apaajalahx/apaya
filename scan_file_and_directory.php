<?php

/**
 * 
 * @var $dirName: string = directory name
 * @var $searchFilename: array (string) = filename
 * @var $exclude_fir: array (string) = directory want to skip
 */
function scan_recursive($dirName = null, $searchFileName = [], $exclude_dir = [], &$valid_directory = []) {
    
    $dirs = new RecursiveDirectoryIterator($dirName);

    foreach($dirs as $dir) {
        if($dir->isReadable()) {
            if($dir->isDir()) {
                if($dir->getFilename() != '.' && $dir->getFilename() != '..') {
                    $valid_directory[] = $dirName . DIRECTORY_SEPARATOR . $dir->getFilename();
                    if (!in_array($dir->getFilename(), $exclude_dir)) {
                        $z = scan_recursive($dirName . DIRECTORY_SEPARATOR . $dir->getFilename(), $searchFileName, $exclude_dir, $valid_directory);
                        array_merge($valid_directory, $z);
                    }
                }
            } else if($dir->isFile()) {
                $regex = join('|', $searchFileName);
                if(preg_match("/$regex/i", $dir->getFilename())) {
                    $valid_directory[] = $dirName . DIRECTORY_SEPARATOR . $dir->getFilename();
                }
            }
        }
    }
    return $valid_directory;
}
$scan_all = [];
if(isset($_GET['dir'])) {

    if(isset($_GET['filename'])) {
        $filename = explode('|', $_GET['filename']);
    } else {
        $filename = ['.htaccess','.php','.phtml'];
    }

    $scan_all = scan_recursive($_GET['dir'],$filename);
}
?>


<html>
    <head>
        <title>SCANNING FILE AND DIRECTORY</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <div class="row">
            <form action="" method="GET">
                <div class="mb-3">
                    <label>
                        <b>Directory Path</b>
                    </label>
                    <input type="text" class="form-control" name="dir" value="<?= (isset($_GET['dir'])) ? $_GET['dir'] : getcwd() ?>">
                </div>
                <div class="mb-3">
                    <label>
                        <b>Filename or extension, using | as separator</b>
                    </label>
                    <input type="text" class="form-control" name="filename" value="<?= (isset($_GET['filename'])) ? $_GET['filename'] : '.htaccess|.php|.phtml' ?>">
                </div>
                <input type="submit" class="btn btn-primary">
            </form>
            </div>
        </div>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Filename</th>
                <th scope="col">Full Path</th>
            </thead>
            <tbody>
                <?php
                $i = 0; 
                if(count($scan_all) > 0) {
                    
                    foreach($scan_all as $result){
                        $i++;
                ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= !is_dir($result) ? basename($result) : '' ?></td>
                    <td><?= $result ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
