<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Mabel - Succés création de compte";
      $pageDescription = "page de succés de la création de compte";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Votre compte a bien été créé</h2>
          <a href="index.php?action=showconnexion&from=<?php echo $from ?>" class="btn btn-success" role="button">retourner sur la page de connexion</a>
        </div>
      </div>
    </div>
  </body>
</html>
