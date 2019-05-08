<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Confirmation du changement de mot de passe";
      $pageDescription = "Confirmation du changement de mot de passe du compte mabel";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Votre mot de passe a bien été changé</h2>
          <a href="index.php?action=showconnexion" class="btn btn-success" role="button">Aller sur la page de connexion</a>
        </div>
      </div>
    </div>
  </body>
</html>
