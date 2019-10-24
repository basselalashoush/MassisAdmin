<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MASSIS CLUB D'ECHECS</title>
        <link rel="icon" sizes="57x57" type="image/png" href="./assets/img/apple-icon-57x57.png">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" >
        <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

        <link rel="stylesheet" href="./assets/css/bootstrap-table.min.css" />
        <!-- <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css"> -->
        <link rel="stylesheet" href="./assets/css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="row" id="header">
                <?php include("view/v_header.php");
                ?>
            </div>
            <div class="row" id="content-wrap">
                <div class="col-md-3" id="sidebar">
                    <?php include("view/v_menu.php"); ?>
                </div>
                <div class="col-md-9">
                    <?php
                    if (!isset($_REQUEST['uc']))
                        $uc = 'accueil';
                    else
                        $uc = $_REQUEST['uc'];
                    switch ($uc) {
                        case 'accueil' :
                            include("view/v_accueil.php");
                            break;
                        case 'categorie' :
                            include 'controller/c_categorie.php';
                            break;
                        case 'joueur' :
                            include 'controller/c_Joueur.php';
                            break;
                        case 'competition' :
                            include 'controller/c_Competition.php';
                            break;
                        case 'groupe' :
                            include 'controller/c_groupes.php';
                            break;
                        case 'participants':
                            include 'controller/c_liste_attente.php';
                            break;
                        case 'joueurGroupe':
                            include 'controller/c_joueur_groupe.php';
                            break;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row" id="footer">
            <?php include("view/v_footer.php"); ?>
        </div>
    </body>
</html>

