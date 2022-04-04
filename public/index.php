<?php
session_start();
$TextNo= "";
require '../app/Manager/QcmManager.php';

$qcmManager = new QcmManager();
$qcms = $qcmManager->getAll();

if(isset($_GET['Noquestions']))
    {
        $TextNo = "Il n'y a pas de question à ce QCM actuellement. Cliquez sur 'ajouter une question'";
    
    }

require '../template/index.tpl.php';

