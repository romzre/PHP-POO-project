<?php

$message = "";
if (isset($_POST['submit'])) 
{
    if (!empty($_POST['title'])) 
    {
        require '../app/Manager/AnswerManager.php';
        $manager = new AnswerManager();
        $answer_id = $manager->insert($_POST['title'], $_POST['response'] ,intval($_GET['id']));
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


require '../template/new_answer.tpl.php';