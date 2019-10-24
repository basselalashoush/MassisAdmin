<?php


$page_title = 'list joueurs'; ?>

<div class="table_title">
    <p>Liste Joueurs</p>
</div>
<table id="myTable" class=" table table-striped snipe-table"
           data-locale="fr-FR"
           data-toolbar="#toolbar"
           data-page-size="5"
           data-search="true"
           data-show-columns="true"
           data-show-toggle="true"  
           data-detail-view="true"
           data-detail-formatter="detailFormatter" 
           data-show-pagination-switch="true"
           data-pagination="true"
           data-page-list="[5,10, 25]">
        <thead>   
            <tr>
                <th data-sortable="true" data-field="nr_ffe">NrFFE</th>
                <th data-sortable="true" data-field="nom">Nom</th>
                <th data-sortable="true" data-field="prenom">Prénom</th>
                <th data-sortable="true" data-field="id_categorie">Categorie</th>
                <th data-sortable="true" data-field="adherent" data-visible="false">Adherent</th>
                <th data-sortable="true" data-field="email" data-visible="false">Email</th>
                <th data-sortable="true" data-field="adresse" data-visible="false">Adresse</th>
                <th data-sortable="true" data-field="code_postal" data-visible="false">Code Postal</th>
                <th data-sortable="true" data-field="ville" data-visible="false">Ville</th>
                <th data-sortable="true" data-field="tel" data-visible="false">Téléphone</th>
                <th data-sortable="true" data-field="parent" data-visible="false">Parent</th>
                <th data-sortable="true" data-field="af" data-visible="false">AF</th>
                <th data-sortable="true" data-field="elo" data-visible="false">ELO</th>
                <th data-sortable="true" data-field="type" data-visible="false">Type</th>
                <th data-sortable="true" data-field="rapide" data-visible="false">Rapide</th>
                <th data-sortable="true" data-field="mute" data-visible="false">Muté</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lesJoueur as $unjoueur) : ?>
                <tr>
                    <td><?= $unjoueur->nr_ffe; ?></td>
                    <td><?= $unjoueur->nom;?></td>
                    <td><?= $unjoueur->prenom; ?></td>
                    <td><?= $unjoueur->nom_categorie; ?></td>
                    <td><?= $unjoueur->adherent; ?></td>
                    <td><?= $unjoueur->email; ?></td>
                    <td><?= $unjoueur->adresse; ?></td>
                    <td><?= $unjoueur->code_postal; ?></td>
                    <td><?= $unjoueur->ville; ?></td>
                    <td><?= $unjoueur->tel;?></td>
                    <td><?= $unjoueur->parent; ?></td>
                    <td><?= $unjoueur->af;?></td>
                    <td><?= $unjoueur->elo ?></td>
                    <td><?= $unjoueur->type ?></td>
                    <td><?= $unjoueur->rapide ?></td>
                    <td><?= $unjoueur->mute?></td>
                    <?php endforeach ; ?>
            </tr>
        </tbody>      
    </table>
