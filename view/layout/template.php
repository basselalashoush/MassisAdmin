<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= isset($page_title)? $page_title : 'MASSIS';?></title>
        <link rel="icon" sizes="57x57" type="image/png" href="<?= BASE_URL.DS.'img'.DS.'apple-icon-57x57.png'?>">
        <link rel="stylesheet" href="<?= BASE_URL.DS.'css'.DS.'bootstrap.min.css'; ?> "/>
        <link rel="stylesheet" href="<?= BASE_URL.DS.'css'.DS.'fontawesome-all.min.css'; ?>" >
        <link rel="stylesheet" href="<?= BASE_URL.DS.'css'.DS.'bootstrap-table.min.css'; ?>" />
        <link rel="stylesheet" href="<?= BASE_URL.DS.'css'.DS.'style.css'; ?>" />
    </head>
    <body>
        <div class="container">
            <div class="row" id="header">
                <?php include("v_header.php");
                ?>
            </div>
            <div class="row" id="content-wrap">
                <div class="col-md-3" id="sidebar">
                    <?php include("v_menu.php"); ?>
                </div>
                <div class="col-md-9">
                <?php echo $this->Session->flash() ; ?>
                <?php echo $template ; ?>
                </div>
            </div>
        </div>
        <div class="row" id="footer">
            <?php include("v_footer.php"); ?>
        </div>
    </body>
</html>