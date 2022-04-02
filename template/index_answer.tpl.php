<?php
require '../template/partial/_top.tpl.php'; ?>
<a href="index_question.php"><button type="button" class="btn btn-warning ">Retour</button></a>
<div class="container">
    <h1><?= $question ; ?></h1>
    <a href="new_answer.php">Nouveau</a>
<table class="table table-bordered table-dark p-6">
    <thead>
        <tr >
           
            <th>Réponse</th>
            <th>Vrai ou Faux</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    
        <?php  foreach ($answers as $answer):?>
        <tr>
         
            <td><?= $answer->getText() ?></td>
            <td><?= $ans =  ($answer->getIsGoodAnswer() == 1) ? 'Vrai' : 'Faux' ;?></td>
            <td>
                
            <a  class="text-white" href="new_answer.php?id_answer=<?= $answer->getId() ?>"><button class="btn btn-primary">Modifier</button></a>
            <a  class="text-white" href=""><button class="btn btn-danger">Supprimer</button></a>
            </td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
</table>
</div>





<?php require '../template/partial/_bottom.tpl.php'; ?>
