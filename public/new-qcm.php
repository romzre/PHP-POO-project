<?php

$message = "";
$action = "Tapez le nom du QCM";
$head_qcm = "Nouveau QCM";
$title = "";

if(!empty($_POST['submit']) && !empty($_POST['title']) && !empty($_GET['id'])){
    require '../app/Manager/QcmManager.php';
 
    $managerUpdate = new QcmManager();
    $managerUpdate->update($_GET['id'],$_POST['title']);
    
    header("Location:index.php"); die;
};

if(!empty($_GET['id']))
{
    $action = 'Modifiez le nom du QCM ';
    require '../app/Manager/QcmManager.php';
    $manager = new QcmManager();
    $head_qcm = $manager->getQcmName($_GET['id']);
    $title = $head_qcm;

}

if (isset($_POST['submit'])) 
{
    if (!empty($_POST['title'])) 
    {
        require '../app/Manager/QcmManager.php';
        $manager = new QcmManager();
        $qcm_id = $manager->insert($_POST['title']);
        if($qcm_id)
        {
            header("location:/"); die;
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


require '../template/new-qcm.tpl.php';