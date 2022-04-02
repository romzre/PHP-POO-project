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
                <a class="text-white" href="new_question.php?id=<?= $qcm->getId() ?>"><button class="btn btn-secondary">Ajouter question</button></a>
                <a class="text-white" href="new-qcm.php?id=<?= $qcm->getId() ?>"><button class="btn btn-primary">Modifier</button></a>
                <a class="text-white" href=""><button class="btn btn-danger">Supprimer</button></a>
            </td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
</table>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
