<?php

$title = '';
$message = "";
if(!empty($_POST['submit']) && !empty($_POST['title']) && !empty($_GET['id_question'])){
    require '../app/Manager/QuestionManager.php';
 
    $managerUpdate = new QuestionManager();
    $managerUpdate->update($_GET['id_question'],$_POST['title']);
    $id= $managerUpdate->getQcm($_GET['id_question']);
    header("Location:index_question.php?id=".$_GET['id_question']); die;
};
if (isset($_POST['submit'])) 
{
    if (!empty($_POST['title'])) 
    {
        require '../app/Manager/QuestionManager.php';
        $manager = new QuestionManager();
        $question_id = $manager->insert($_POST['title'], intval($_GET['id']));
        if($question_id)
        {
            header("location:index_question?id=".$question_id); die;
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

if (!empty($_GET['id_question'])) {
    
    require '../app/Manager/QuestionManager.php';
    $manager = new QuestionManager();
    $question = $manager->getOne(intval($_GET['id_question']));
    $title = $question['title'];
    
    // $manager->update($question['id_question'],$question['title']);
}

require '../template/new_question.tpl.php';