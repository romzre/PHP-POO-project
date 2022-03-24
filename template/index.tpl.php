<?php
require '../template/partial/_top.tpl.php'; ?>

<div class="container">
    <h1>Mes Qcms</h1>
<table>
    <thead>
        <tr >
            <th>id</th>
            <th>QCM</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($qcms as $qcm):?>
        <tr>
            <td><?= $qcm->getId() ?></td>
            <td><?= $qcm->getTitle() ?></td>
            <td>
                <a href="">Modifier</a>
                <a href="">Supprimer</a>
            </td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
</table>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
