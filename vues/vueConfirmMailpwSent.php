<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "envoi du mail de reinitialisation ok";
      $pageDescription = "page de succés d'envoi du lien de reinitialisation de mot de passe";
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
          <a href="index.php" class="btn btn-success" role="button">retourner a l'acceuil</a>
        </div>
      </div>
    </div>
  </body>
</html>
