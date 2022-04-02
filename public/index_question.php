<?php
if (!isset($_GET['id'])) 
{
    if(empty($_GET['id'])){

        header("location:index.php?errorId");
    }
}
else
{

    require '../app/Manager/QuestionManager.php';
    
    $questionManager = new QuestionManager();
    $questions = $questionManager->getAll(intval($_GET['id']));
    if (!empty($questions)){

        require '../template/index_questions.tpl.php';
    }
    else
    {
        header("location:index.php?Noquestions");
    }
}