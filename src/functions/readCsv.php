<?php



function read($pathCsv){
    $file = fopen($pathCsv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    foreach ($line as $l) {
        foreach($l as $s){
            $datas[] = $s;
        }
    }

    fclose($file);
    return $datas;
}
