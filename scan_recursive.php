<?php

/**
 * @author Dinar.
 * @var $dirName: string = directory name
 * @var $searchFilename: array (string) = filename
 * @var $exclude_fir: array (string) = directory want to skip
 */

function scan_recursive($dirName = null, $searchFileName = [], $exclude_dir = [], &$valid_directory = []) {
    
    $dirs = new RecursiveDirectoryIterator($dirName);

    foreach($dirs as $dir) {
        if($dir->isDir()) {
            if($dir->getFilename() != '.' && $dir->getFilename() != '..') {
                $valid_directory[] = $dirName . DIRECTORY_SEPARATOR . $dir->getFilename();
                if (!in_array($dir->getFilename(), $exclude_dir)) {
                    $z = scan_recursive($dirName . DIRECTORY_SEPARATOR . $dir->getFilename(), $searchFileName, $exclude_dir, $valid_directory);
                    array_merge($valid_directory, $z);
                }
            }
        } else if($dir->isFile()) {
            if(in_array($dir->getFilename(), $searchFileName)) {
                $valid_directory[] = $dirName . DIRECTORY_SEPARATOR . $dir->getFilename();
            }
        }
    }
    return $valid_directory;
}

scan_recursive('/tmp', ['backdoor.php'], ['vendor']);
