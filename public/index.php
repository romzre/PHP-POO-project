<?php

require '../app/Manager/QcmManager.php';

$qcmManager = new QcmManager();
$qcms = $qcmManager->getAll();
var_dump($qcms); exit; 
require '../template/index.tpl.php';

