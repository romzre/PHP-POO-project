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
            <td><?= $question->getTitle() ?></td>
            <td>
            <a  class="text-white" href="index_answer.php?id_question=<?= $question->getId() ?>"><button class="btn btn-secondary">Voir réponses</button></a>
            <a  class="text-white" href="new_question.php?id_question=<?= $question->getId() ?>"><button class="btn btn-primary">Modifier</button></a>
            <a  class="text-white" href=""><button class="btn btn-danger">Supprimer</button></a>
            </td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
</table>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
