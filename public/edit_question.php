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

if (!empty($_GET['id_question'])) {
    
    require '../app/Manager/QuestionManager.php';
    $manager = new QuestionManager();
    $question = $manager->getOne(intval($_GET['id_question']));
    $title = $question['title'];
    
    // $manager->update($question['id_question'],$question['title']);
}

require '../template/new_question.tpl.php';