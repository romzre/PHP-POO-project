<?php

class Answer
{
    private $id;
    private string $text;

    private bool $isGoodAnswer;

    public function __construct(string $text,int $id, bool $isGoodAnswer = false)
    {
        $this->setText($text)->setIsGoodAnswer($isGoodAnswer)->setId($id);

    }

    // TODO : ajouter les propriétés

    // TODO : ajouter les méthodes


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