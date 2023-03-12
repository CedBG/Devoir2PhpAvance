<?php

require '../classes/Discuss.php';

function read($csv){
    $file = fopen($csv, 'r');
    while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024);
    }
    fclose($file);
    return $line;
}

$csv = 'paris.csv';

$csv = read($csv);
echo '<pre>';
print_r($csv);
echo '</pre>';


?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devoir2PhpAvance</title>
</head>
<body>
    


</body>
</html>


