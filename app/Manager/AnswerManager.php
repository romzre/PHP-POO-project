<?php

require '../app/Entity/Answer.php';

class AnswerManager {
    
    private string $text;
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

    public function getAll(int $id_question)
    {
        $req = $this->pdo->prepare("SELECT  `title`, `id_answer` FROM `question` WHERE id_question = :id_question");
        $req->execute(
            [
                'id_question' => $id_question,
            ]
        );
        $answers = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($answers as $answer) 
        {
            $obj = new Answer($answer['title']);
            $result[] = $obj;
        }
        return $result;
    }

    public function insert(string $text, bool $isGoodAnswer, int $id_question) 
    {
        $sql = "INSERT INTO `answer`(`id_answer`, `text`, `isGoodAnswer`, `id_question`) VALUES (NULL,:text,:isGoodAnswer,:id_question)";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'text' => $text,
                'isGoodAnswer' => $isGoodAnswer,
                'id_question' => $id_question
            ]
            );
            return $id_question;
    }


    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
