<?php

namespace App\classes;

use PDO;
use PDOException;

class Discuss 
{
    public $pdo;

    public function connection($host, $dbname, $user, $password)
    {
        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            return $this->pdo;
        }catch(PDOException $e){
            $e->getMessage();
        }
         
    }


    public function createTable(PDO $conn)
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS meteo(                
                id INT AUTO_INCREMENT,
                date DATE NOT NULL,
                ville VARCHAR(50) NOT NULL,
                periode VARCHAR(50) NOT NULL,
                tempMin INT NOT NULL,
                tempMax INT NOT NULL,
                idResume INT NOT NULL,
                resume VARCHAR(150) NOT NULL,
                comment VARCHAR(255) NOT NULL,
                PRIMARY KEY(id)
            )";

        $conn->exec($sql);
    }


    public function takeData(PDO $connect, $date): array
    {
        $stmt = $connect->query("SELECT * FROM meteo WHERE id >=4");
        $meteo = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $meteo;
    }


    public function registerInDb(PDO $conn, array $datas)
    {
        foreach($datas as $data){
            $tab[] = explode(";", $data);
        }

        foreach($tab as $t){
            $tmp[] =$t;
            $stmt = $conn->prepare("INSERT INTO meteo (date, ville, periode, resume, tempMin, tempMax, idResume, comment) 
                VALUES (:date, :ville, :periode, :resume, :tempMin, :tempMax, :idResume, :comment)");
            $stmt->bindValue(':date', $t[0]);
            $stmt->bindValue(':ville', $t[1]);
            $stmt->bindValue(':periode', $t[2]);
            $stmt->bindValue(':resume', $t[3]);
            $stmt->bindValue(':tempMin', $t[4]);
            $stmt->bindValue(':tempMax', $t[5]);
            $stmt->bindValue(':idResume', $t[6]);
            $stmt->bindValue(':comment', $t[7]);

            $result = $stmt->execute();
        }

    }

    public function displayOnPage(PDO $connect)
    {
        $stmt = $connect->query("SELECT * FROM meteo WHERE date >= '2100-12-06'");
        $meteo = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $meteo;
    }
}

?>


