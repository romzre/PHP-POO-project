<?php
session_start();


if(!isset($_POST['submit']))
{
    header("Location:index_question.php?error_del");
}
else
{
    require '../app/Manager/QuestionManager.php';
    $manager = new QuestionManager();
    $del = $manager->delete($_POST['id']);

    if($del)
    {
        header("Location:index_question.php?id=".$_SESSION['id_qcm']);
    }
}