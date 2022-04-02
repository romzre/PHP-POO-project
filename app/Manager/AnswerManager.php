<?php

require '../app/Entity/Answer.php';

class AnswerManager {
    
    // private string $text;
    // private bool $isGoodAnswer;
    
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
        $req = $this->pdo->prepare("SELECT  * FROM `answer` WHERE id_question = :id_question");
        $req->execute(
            [
                'id_question' => $id_question,
            ]
        );
        $answers = $req->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($answers); exit;
        foreach ($answers as $answer) 
        {
            $obj = new Answer($answer['text'],$answer['id_answer'],$answer['isGoodAnswer']);
            $result[] = $obj;
        }
     
        return $result;
    }
    
    /**
     * insert
     *
     * @param  mixed $text
     * @param  mixed $isGoodAnswer
     * @param  mixed $id_question
     * @return void
     */
    public function insert(string $textAnswer, $isGoodAnswer, int $id_question) 
    {
        $sql = "INSERT INTO `answer`(`text`, `isGoodAnswer`, `id_question`) VALUES (:textAnswer,:isGoodAnswer,:id_question)";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'textAnswer' => $textAnswer,
                'isGoodAnswer' => $isGoodAnswer,
                'id_question' => $id_question
            ]
            );
            
            return $id_question;
    }

    public function update($id_answer, $text, $isGoodAnswer)
    {

        $sql = "UPDATE `answer` SET `text`= :text WHERE id_answer = :id_answer ; ";
        $sql .= "UPDATE `answer` SET `IsGoodAnswer`= :isGoodAnswer WHERE id_answer = :id_answer ; ";
        // var_dump($sql); exit;
        $req = $this->pdo->prepare($sql);
        $test = $req->execute(
            [
                'text' => $text,
                'id_answer' => $id_answer,
                'isGoodAnswer' => $isGoodAnswer
            ]
            );
            
      

    }

    public function getQuestionName($id_question)
    {

        $sql = "SELECT title FROM `question` WHERE id_question = :id_question";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'id_question' => $id_question
            ]
            );

        $name = $req->fetchColumn();

        return $name;
    }

    public function getQuestion($id_question)
    {

        $sql = "SELECT `id_question`, `title`, `id_qcm` FROM `question` WHERE 'id_question' = :id_question";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'id_question' => $id_question
            ]
            );
            
        $id = $req->fetch(PDO::FETCH_ASSOC);
        return $id;
    }

    public function getAnswerName($id_answer)
    {

        $sql = "SELECT text FROM `answer` WHERE id_answer = :id_answer";

        $req = $this->pdo->prepare($sql);
        $req->execute(
            [
                'id_answer' => $id_answer
            ]
            );

        $name = $req->fetchColumn();

        return $name;
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

    /**
     * Get the value of isGoodAnswer
     */ 
    public function getIsGoodAnswer()
    {
        return $this->isGoodAnswer;
    }

    /**
     * Set the value of isGoodAnswer
     *
     * @return  self
     */ 
    public function setIsGoodAnswer($isGoodAnswer)
    {
        $this->isGoodAnswer = $isGoodAnswer;

        return $this;
    }
}
