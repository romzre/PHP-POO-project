<?php
require '../template/partial/_top.tpl.php'; ?>

<div class="container">
    <h1>Mes Questions</h1>
    <a href="new-qcm.php">Nouveau</a>
<table>
    <thead>
        <tr >
           
            <th>Questions</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    
        <?php  foreach ($answers as $answer):?>
        <tr>
         
            <td><?= $answer->getTitle() ?></td>
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
