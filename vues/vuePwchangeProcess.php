<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Confirmation mot de passe oublié";
      $pageDescription = "page de succés du changement de mdp";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Un lien pour reinitialiser votre mot de passe a été envoyé sur votre adresse mail</h2>
          <a href="index.php?action=showconnexion&from=<?php echo $from ?>" class="btn btn-success" role="button">retourner sur la page de connexion</a>
        </div>
      </div>
    </div>
  </body>
</html>
