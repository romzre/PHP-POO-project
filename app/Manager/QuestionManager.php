<?php

require '../app/Entity/Question.php';

class QuestionManager {
    private $id;
    private string $titre;
    // protected array $answer;
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

    public function getAll(int $id_qcm)
    {
        $req = $this->pdo->prepare("SELECT `id_question`, `title`, `id_qcm` FROM `question` WHERE id_qcm = :id_qcm");
        $req->execute(
            [
                'id_qcm' => $id_qcm,
            ]
        );
        $questions = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($questions as $question) 
        {
            $obj = new Question($question['title']);
            $obj->setId($question['id_question']);
            $result[] = $obj;
        }
        return $result;
    }

    public function getOne($id_question)
    {
        $req = $this->pdo->prepare("SELECT `id_question`, `title` FROM `question` WHERE id_question = :id_question");
        $req->execute(
            [
                'id_question' => $id_question,
            ]
            );
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function insert(string $title, int $id_qcm) 
    {
        $sql = "INSERT INTO `question`(`id_question`, `title`, `id_qcm`) VALUES (NULL,:title ,:id_qcm)";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'title' => $title,
                'id_qcm' => $id_qcm
            ]
            );
            return $id_qcm;
    }

    public function update($id_question, $title)
    {

        $sql = "UPDATE `question` SET `title`= :title WHERE id_question = :id_question";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'title' => $title,
                'id_question' => $id_question
            ]
            );
    }


    public function delete(int $id)
    {

        $sql = "DELETE FROM question WHERE id = :id";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'id' => $id
            ]
            );
    }

    public function getQcm($id_question)
    {

        $sql = "SELECT `id_question`, `title`, `id_qcm` FROM `question` WHERE 'id_question' = :id_question";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'id_question' => $id_question
            ]
            );

        $id = $req->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of answer
     */ 
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     *
     * @return  self
     */ 
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
