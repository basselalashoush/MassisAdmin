<?php $page_title = 'list categories'; ?>
<div class="table_title">
    <p>Liste Categories</p>
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
       data-page-list="[5,10, 25]">
    <thead>
        <tr>
            <th data-sortable="true" data-field="id_categorie">Categorie</th>
        </tr>
    </thead>
    <tbody >
        <?php
        foreach ($lesCategories as $unecategorie) :?>
            <tr> 
                <td><?= $unecategorie->nom_categorie; ?></td>
            </tr> 
        <?php endforeach; ?>
    </tbody>
</table>