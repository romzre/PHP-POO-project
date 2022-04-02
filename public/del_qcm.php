<?php
session_start();
var_dump($_POST);

if(!isset($_POST['submit']))
{
    header("Location:index.php?error_del");
}
else
{
    require '../app/Manager/QcmManager.php';
    $manager = new QcmManager();
    $del = $manager->delete($_POST['id']);

    if($del)
    {
        header("Location:index.php");
    }
}
