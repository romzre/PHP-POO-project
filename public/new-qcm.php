<?php

$message = "";
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