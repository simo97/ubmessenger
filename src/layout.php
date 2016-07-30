<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo CSS; ?>materialize.css" />
       <link type="text/css" rel="stylesheet" href="<?php echo CSS; ?>font-awesome.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body class="">
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4>Retour</h4>
              <p id="val_ret"></p>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
            </div>
        </div>
        <?php 
            if($header == true):
                require_once 'header.php';
            endif;
        //echo $data['content'];
        ?>
        <section class="container">
            <?php echo $data['content'] ?>
        </section>
        <script src="<?php echo JS; ?>jquery.min.js"></script>
        <script src="<?php echo JS; ?>materialize.js"></script>
        <script src="<?php echo JS; ?>script.js"></script>
    </body>
</html>
