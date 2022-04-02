<?php
require '../template/partial/_top.tpl.php';
?>
<body>
<a href="index.php"><button type="button" class="btn btn-warning">Retour</button></a>
<div class="container">
<form  class="p-5" action="#" method="POST">
    <div >
        <div>
            <h2><?= $head_qcm ;?></h2>
        </div>
        <div  class="form-group ">
            <label for="title"><?= $action ;?></label>
            <input class="form-control" type="text" value="<?= $title ; ?>" name="title" id="qcm">
        </div>
        <div><input class="my-3 btn btn-primary" type="submit" value="Enregistrer" name="submit" id=""></div>
    </div>
</form>
<?php if(!empty($message)):?>
<div class="alert"><?= $message ?></div>
<?php endif; ?>
</div>

<?php
require '../template/partial/_bottom.tpl.php';
?>