<?php
if (!isset($_GET['id'])) 
{
    if(empty($_GET['id'])){

        header("location:index.php?errorId");
    }
}
else
{

    require '../app/Manager/AnswerManager.php';
    
    $answerManager = new AnswerManager();
    $answers = $answerManager->getAll(intval($_GET['id']));
    if (!empty($answers)){

        require '../template/index_answer.tpl.php';
    }
    else
    {
        header("location:index.php?NoAnswers");
    }
}