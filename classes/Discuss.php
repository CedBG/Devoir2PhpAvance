<?php

class Discuss 
{
    $pdo = new PDO('mysql:host=localhost;dbname=paris', 'root', '',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    echo '<pre>'; print_r($pdo); echo '</pre>';
    echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';


    public function takeData()
    {
        $result = $pdo->query("SELECT * FROM paris");
        $meteo = $result->fetch(PDO::FETCH_ASSOC); 
        echo "<pre>"; print_r($meteo); echo "</pre>";
    }

    public function registerInDb()
    {
        $result = $pdo->exec("INSERT INTO paris (date, city, period, summary, id_summary, temperature_min, temperature_max, comment) VALUES (date, city, period, summary, id_summary, temperature_min, temperature_max, comment),");
    }

    public function displayOnPage()
    {
       
    }
}

?>


