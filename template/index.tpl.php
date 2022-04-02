<?php
require '../template/partial/_top.tpl.php'; ?>

<div class="container">
    <h1>Mes Qcms</h1>
    <a href="new-qcm.php">Nouveau</a>
<table class="table table-bordered table-dark p-6">
    <thead>
        <tr>
            <th>id</th>
            <th>QCM</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($qcms as $qcm):?>
        <tr>
            <td><?= $qcm->getId() ?></td>
            <td><a href="index_question.php?id=<?= $qcm->getId() ?>"><?= $qcm->getTitle() ?></a></td>
            <td>
                <button class="btn btn-secondary"><a class="text-white" href="new_question.php?id=<?= $qcm->getId() ?>">Ajouter question</a></button>
                <button class="btn btn-primary"><a class="text-white" href="index_question.php?id=<?= $qcm->getId() ?>">Modifier</a></button>
                <button class="btn btn-danger"><a class="text-white" href="">Supprimer</a></button>
            </td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
</table>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
