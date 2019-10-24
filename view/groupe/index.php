<?php $page_title = 'list groupes'; ?>
<div class="table_title">
    <p>Liste Groupes</p>
</div>
<table id="myTable" class=" table table-striped snipe-table" 
       data-locale="fr-FR"
       data-toolbar="#toolbar"
       data-page-size="5"
       data-search="true"
       data-show-columns="true"
       data-show-toggle="true"   
       data-show-pagination-switch="true"
       data-pagination="true"
       data-page-list="[5,10, 25, ALL]">
    <thead>
        <tr>
            <th data-sortable="true" data-field="id_groupe">Groupe</th>
            <th data-sortable="true" data-field="id_competition">Competition</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($lesGroupes as $ungroupe) : ?>
            <tr> 
                <td><?= $ungroupe->nom_groupe; ?></td>
                <td><?= $ungroupe->nom_competition; ?></td>
            </tr> 
<?php endforeach;?>
    </tbody>
</table>