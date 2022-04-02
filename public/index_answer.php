<?php
session_start();
if (!isset($_GET['id_question'])) 
{
    if(empty($_GET['id_question'])){

        header("location:index.php?errorId");
    }
}
else
{

    $_SESSION['id_question'] = $_GET['id_question'];
    require '../app/Manager/AnswerManager.php';
    
    $answerManager = new AnswerManager();
    $answers = $answerManager->getAll(intval($_SESSION['id_question'] ));
    $question = $answerManager->getQuestionName($_SESSION['id_question'] );
    if (!empty($answers)){

        require '../template/index_answer.tpl.php';
    }
    else
    {
        header("location:index_question.php?id=".$_GET['id']."&NoAnswers");
    }
}