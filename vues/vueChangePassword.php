<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "changement de mot de passe";
    	$pageDescription = "changement de mot de passe du compte mabel";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Choisir un nouveau mot de passe</h2>
          <form action="index.php?action=changepassword" method="post">
            <div class="form-group">
              <label for="readonlymail">Adresse mail</label>
              <input class="form-control" type="text" id="readonlymail" name="mail" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; }else { echo $_GET['mail']; }?>" readonly>
              <input type="hidden" name="token" value="<?php if(isset($_POST['token'])){ echo $_POST['token']; }else { echo $_GET['token']; }?>">
            </div>
            <div class="form-group">
              <label for="inputpassword1">Mot de passe</label>
              <input type="password" name="password" class="form-control" id="inputpassword1" pattern=".{4,250}" title="4 caractères minimum" required>
            </div>
            <div class="form-group">
              <label for="inputpassword2">Confirmer mot de passe</label>
              <input type="password" name="password2" class="form-control" id="inputpassword2" pattern=".{4,250}" title="4 caractères minimum" required>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
          </form>
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
