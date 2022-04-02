<?php

require '../app/Entity/QCM.php';

class QcmManager {
    
    private $pdo;

    public function __construct()
    {
        try{

            $this->pdo = new PDO('mysql:host=localhost:3306;dbname=qcm','root','');
        }
        catch (PDOException $e)
        {
            echo 'Error : ' . $e->getMessage();
            die;
        }
    }

    public function getAll()
    {
        $req = $this->pdo->prepare("SELECT `id_qcm`, `title` FROM `qcm`");
        $req->execute();
        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($qcms as $qcm) 
        {
            $obj = new QCM();
            $obj->setTitle($qcm['title']);
            $obj->setId($qcm['id_qcm']);
            $result[] = $obj;
        }
        return $result;
    }

    public function getQcmName($id_qcm)
    {

        $sql = "SELECT title FROM `qcm` WHERE id_qcm = :id_qcm";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'id_qcm' => $id_qcm
            ]
            );

        $name = $req->fetchColumn();

        return $name;
    }

    public function insert(string $title) : int
    {
        $sql = "INSERT INTO qcm (title) VALUES (:title)";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'title' => $title
            ]
            );
            return $this->pdo->lastInsertId();
    }

    public function update($id_qcm, $title)
    {

        $sql = "UPDATE `qcm` SET `title`= :title WHERE id_qcm = :id_qcm";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'title' => $title,
                'id_qcm' => $id_qcm
            ]
            );
    }

    
    
}