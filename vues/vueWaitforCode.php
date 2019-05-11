<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "En attente du code";
    	$pageDescription = "changement d'adresse mail mabel";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h3>Un code vous a été envoyé à votre nouvelle adresse mail</h3>
          <form action="index.php?action=setnewmail" method="post">
            <div class="form-group">
              <label for="inputcode">Entrez votre code:</label>
              <input type="text" name="token" class="form-control" id="inputcode" required>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
          </form>
          <a href="index.php?action=showmyaccount">annuler et revenir sur la page de mon compte</a>
          <?php
            if (isset($errormsg)) {
              echo "<p class='errormsg'>$errormsg</p>";
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
