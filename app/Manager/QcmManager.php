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


    
}