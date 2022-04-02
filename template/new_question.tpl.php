<?php
require '../template/partial/_top.tpl.php';
?>
<body>
  
<div class="container">
<form  class="p-5" action="#" method="POST">
    <div >
        <div>
            <h2>Nouvelle question</h2>
        </div>
        <div  class="form-group ">
            <label for="title">Nom</label>
            <input class="form-control" type="text" value="<?= $title ;?>" name="title" id="qcm">
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