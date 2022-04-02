<?php
session_start();

if (!empty($_GET['id'])) 
{
    $_SESSION['id_qcm'] = $_GET['id'];
}
else
{
    if(empty($_SESSION['id_qcm'])){

        header("location:index.php?errorId");
    }
}
    require '../app/Manager/QuestionManager.php';
   
    $questionManager = new QuestionManager();
    
    $name_qcm = $questionManager->getQcmName(intval($_SESSION['id_qcm']));

    $questions = $questionManager->getAll(intval($_SESSION['id_qcm']));
    if (!empty($questions)){

        require '../template/index_questions.tpl.php';
    }
    else
    {
        header("location:index.php?Noquestions");
    }

   
  
    



    
