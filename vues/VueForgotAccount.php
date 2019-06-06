<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Mot de passe oublié";
    	$pageDescription = "Connection au compte Mabel";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Mot de passe oublié</h2>
          <form action="index.php?action=sendpasswordtoken&from=<?php echo $from ?>" method="post">
            <div class="form-group">
              <label for="inputmail">Adresse email</label>
              <input type="email" name="mail" class="form-control" id="inputmail" aria-describedby="emailHelp" placeholder="Entrez mail">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer le lien de reinitialisation par mail</button>
          </form>
          <?php
            if (isset($_GET['feedbackerror'])) {
              echo "<p class='errormsg'>".$_GET['feedbackerror']."</p>";
            }else {
               echo "<p class='errormsg'>erreur</p>";
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
