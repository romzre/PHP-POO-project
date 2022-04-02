<?php
require '../template/partial/_top.tpl.php'; ?>

<div class="container">
    <h1>Mes Questions</h1>
    <a href="new_question.php">Nouveau</a>
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
            <button class="btn btn-secondary"><a  class="text-white" href="new_answer.php?id=<?= $question->getId() ?>">Ajouter réponse</a></button>
            <button class="btn btn-primary"><a  class="text-white" href="new_question.php?id_question=<?= $question->getId() ?>">Modifier</a></button>
            <button class="btn btn-danger"><a  class="text-white" href="">Supprimer</a></button>
            </td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
</table>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
