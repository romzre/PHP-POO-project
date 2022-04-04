<?php
require '../template/partial/_top.tpl.php'; ?>
<a href="index.php"><button type="button" class="btn btn-warning ">Retour</button></a>
<div class="container">
    
    <h1><?= $name_qcm ; ?></h1>
    <a href="new_question.php?id_question">Nouveau</a>
<table class="table table-bordered table-dark p-6">
    <thead>
        <tr >
            <th>Questions</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    
        <?php foreach ($questions as $question):?>
        <tr>
            <td><a href="index_answer.php?id_question=<?= $question->getId() ?>"><?= $question->getTitle() ?></a></td>
            <td>
            <a  class="text-white" href="new_answer.php"><button class="btn btn-secondary">Ajouter une réponse</button></a>
            <a  class="text-white" href="new_question.php?id_question=<?= $question->getId() ?>"><button class="btn btn-primary">Modifier</button></a>
            <form onsubmit="return confirm('La Sentence sera Irrévoquable... ')" action="del_question.php" method="POST"><input type="hidden" name='id' value="<?= $question->getId() ?>"><button class="btn btn-danger" type="submit" name='submit' > Supprimer</button></form>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php if($TextNo != ''): ?>
    <div class="alert alert-warning" role="alert"><?=  $TextNo;  ?></div>
<?php endif; ?>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
