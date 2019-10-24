/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function afficheMenu(obj) {

    var idMenu = obj.id;
    var idSousMenu = 'sous' + idMenu;
    var sousMenu = document.getElementById(idSousMenu);

    /*****************************************************/
    /**	si le sous-menu correspondant au menu cliqué    **/
    /** est caché alors on l'affiche, sinon on le cache **/
    /*****************************************************/
    if (sousMenu.style.display == "none") {
        sousMenu.style.display = "block";
    } else {
        sousMenu.style.display = "none";
    }
}

function chambreVide() {
    var ok = true;

    if (document.forms['groupe'].elements['id_competition'].value == "Sélectionner la compétition")
    {
        ok = false;
        alert('Merci De Sélectionner Une Competition !');
    }
    return ok;
}

function joueurvide() {
    var ok = true;

    if (document.forms['joueur'].elements['categorie'].value == "Sélectionner la categorie")
    {
        ok = false;
        alert('merci de choisissez une categorie !');
    }
    return ok;
}
function competitionvide() {
    var ok = true;

    if (document.forms['liste'].elements['id_competition'].value == "Sélectionner competition")
    {
        ok = false;
        alert('merci de choisissez une competition !');
    }
    if(document.forms['liste'].elements['id_joueur'].value == "Sélectionner joueur"){
        ok = false;
        alert('merci de choisissez un joueur !');
    }
    return ok;
}
function joueur_groupevide() {
    var ok = true;

    if (document.forms['joueur_groupe'].elements['id_groupe'].value == "Sélectionner groupe")
    {
        ok = false;
        alert('merci de choisissez un groupe !');
    }
    if(document.forms['joueur_groupe'].elements['id_joueur'].value == "Sélectionner joueur"){
        ok = false;
        alert('merci de choisissez un joueur !');
    }
    return ok;
}

var mail = /^[a-zA-Z0-9]+[a-zA-Z0-9\.-_]+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9])+$/;
function verifieMail(champmail) {
    var textmail = champmail.value;
    var reponse = mail.test(textmail);
    if (reponse)
        alert("Adresse e-mail valide");
    else
        alert("Adresse e-mail invalide !");
}
function ouvrirfenetre() {
    var liste = window.open("", "liste", "width=450,height=650");
}

function detailFormatter(index, row) {
    var html = []; 
    html.push('<p><b>' + row.nom.toUpperCase() + ' ' +  row.prenom.charAt(0).toUpperCase() + row.prenom.slice(1)+ ' </b><br> NrFFE : '+ row.nr_ffe 
            +' </b><br> Categorie : '+ row.id_categorie +'</b><br> Adherent : '+row.adherent + 
             ' </b><br> Adresse : '+ row.adresse +' </b><br> Email : '+ row.email + 
            ' </b><br> Ville : '+ row.ville 
            +' </b><br> Code postal : '+ row.code_postal + ' </b><br> Téléphone : '+ row.tel +
            ' </b><br> Parent : '+ row.parent +' </b><br> AF : '+ row.af +
            ' </b><br> ELO : '+ row.elo +' </b><br> Type : '+ row.type +
            ' </b><br> Rapide : '+ row.rapide +' </b><br> Muté : '+ row.mute +'</p>');
    return html.join('');
}


$('#myTable').bootstrapTable({
    showExport: true
});
$('#myTable').bootstrapTable( 'refreshOptions', {            
            exportDataType: 'all',                                                                                                               
            exportOptions: {                                                                                                                                                                                                                             
                 fileName: 'export_massis'                                                                                                                  
            }                                                                                                                                            
});  


var $table = $('#maTable');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

		var trBoldBlue = $("maTable");

	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
    });
    
    $(window).on('resize', function() {
        var win = $(this);
        if ((win.width() > 600)&&(win.width() < 1200)) {
            $('#sidebar').removeClass('col-md-3');
          $('#sidebar').addClass('col-md-6');
        } else{
            $('#sidebar').removeClass('col-md-6');
            $('#sidebar').addClass('col-md-3');
        }
      });

   

    