<?php
session_start();


if(!isset($_POST['submit']))
{
    header("Location:index_question.php?error_del");
}
else
{
    require '../app/Manager/AnswerManager.php';
    $manager = new AnswerManager();
    $del = $manager->delete($_POST['id']);

    if($del)
    {
        header("Location:index_answer.php?id_question=".$_SESSION['id_question']);
    }
}