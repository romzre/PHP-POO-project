<?php
session_start();

$head_answer="";
$action="";
$title = "";
$message = "";

if(!empty($_POST['submit']) && !empty($_POST['response']) && !empty($_GET['id_answer'])){
    require '../app/Manager/AnswerManager.php';
    // var_dump($_POST); exit;
    $managerUpdate = new AnswerManager();
    $upd = $managerUpdate->update($_GET['id_answer'],$_POST['response'],$_POST['IsGoodAnswer']);
   
    $id= $managerUpdate->getQuestion($_SESSION['id_question']);
    header("Location:index_answer.php?id_question=".$_SESSION['id_question']); die;
};


if (isset($_POST['submit'])) 
{
    
    if (!empty($_POST['response'])) 
    {
        // var_dump($_SESSION);
        // var_dump($_POST); exit;
        require '../app/Manager/AnswerManager.php';
        $manager = new AnswerManager();
       
        
        $answer_id = $manager->insert($_POST['response'], $_POST['IsGoodAnswer'] , intval($_SESSION['id_question']));

        
        if($answer_id)
        {
            
            header("location:index_answer?id_question=".$answer_id); die;
        }
        else
        {
            $message = "Une erreur s'est produite";
        }
    }
    else
    {
        $message = 'Vous n\'avez pas saisi de titre';
    }
}
if(empty($_GET['id_answer']))
{
    require '../app/Manager/AnswerManager.php';
    $manager = new AnswerManager();
     
    $head_answer= $manager->getQuestionName($_SESSION['id_question']);

    $action="Ajoutez votre nouvelle réponse";
}
else
{
    require '../app/Manager/AnswerManager.php';
    $manager = new AnswerManager();
     
    $head_answer= $manager->getQuestionName($_SESSION['id_question']);
    $title = $manager->getAnswerName($_GET['id_answer']);
    
    $action="Modifiez votre réponse";
}



require '../template/new_answer.tpl.php';