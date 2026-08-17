<?php
require 'D:/xampp/htdocs/Commune/vendor/autoload.php';
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('D:/xampp/htdocs/Commune/app'));
foreach($files as $f) {
    if($f->getExtension() === 'php') {
        echo $f->getPathname() . PHP_EOL;
        flush();
        require_once $f->getPathname();
    }
}
echo 'all loaded ok';