<?php $page_title = 'list competitions'; ?>
<div class="table_title">
    <p>Liste Competitions</p>
</div>
<table id="myTable" class=" table table-striped snipe-table" 
       data-locale="fr-FR"
       data-toolbar="#toolbar"
       data-search="true"
       data-show-columns="true"
       data-show-toggle="true"   
       data-show-pagination-switch="true"
       data-pagination="true"
       data-page-size="5"
       data-page-list="[5,10, 25, ALL]">
    <thead>
        <tr>
            <th data-sortable="true" data-field="nom_competition">Nom</th>
            <th data-sortable="true" data-field="lieu_competition">Lieu</th>
            <th data-sortable="true" data-field="commentaire" data-visible="false">Commentaire</th>
            <th data-sortable="true" data-field="date_competition">Date debut</th>
            <th data-sortable="true" data-field="date_fin_competition">Date Fin</th>
            <th data-sortable="true" data-field="cout">Coût</th>
            <th data-sortable="true" data-field="img">image</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($lesCompetitions as $unecompetition) : ?>
            <tr> 
                <td><?= $unecompetition->nom_competition; ?></td>
                <td><?= $unecompetition->lieu_competition; ?></td>
                <td><?= $unecompetition->commentaire; ?></td> 
                <td><?= $unecompetition->date_competition; ?></td> 
                <td><?= $unecompetition->date_fin_competition; ?></td> 
                <td><?= $unecompetition->cout; ?></td> 
                <td><img src="<?= !empty($unecompetition->img ) ?  BASE_URL.DS. $unecompetition->img : null ?>" id="imageReduite" ></td>
                
            </tr> 
        <?php endforeach; ?>
    </tbody>
</table>