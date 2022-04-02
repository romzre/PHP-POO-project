<?php
require '../template/partial/_top.tpl.php';
?>
<body>
  
<div class="container">
<form  class="p-5" action="#" method="POST">
    <div >
        <div>
            <h2>Nouvelle réponse</h2>
        </div>
        <div  class="form-group ">
            <label for="title">Nom</label>
            <input class="form-control" type="text" name="title">
        </div>
        <div class="form-check">
  <input class="form-check-input" type="radio" name="IsGoodAnswer" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Vrai
  </label>
</div>
<div class="form-check">
  <input checked class="form-check-input" type="radio" name="IsGoodAnswer" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Faux
  </label>
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