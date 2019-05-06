<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Mabel - Créer mon compte";
      $pageDescription = "Créez votre compte Mabel en 30s";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Créer mon compte</h2>

          <form action="index.php?action=createaccount&from=<?php echo $from ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputname">Nom</label>
                <input type="text" name="name" class="form-control" id="inputname" placeholder="Didier" pattern=".{2,50}" title="2 caractères minimum" required>
              </div>
              <div class="form-group col-md">
                <label for="inputfirstname">Prénom</label>
                <input type="text" name="firstname" class="form-control" id="inputfirstname" placeholder="Deschamps" pattern=".{2,50}" title="2 caractères minimum" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputmail">Adresse Email</label>
              <input type="email" name="mail" class="form-control" id="inputmail" aria-describedby="emailHelp" placeholder="didierdeschamps@gmail.com" pattern=".{3,500}" title="2 caractères minimum" required>
              <small id="emailHelp" class="form-text text-muted">Votre adresse mail ne sera jamais partagée a un tier</small>
            </div>
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputpassword1">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="inputpassword1" pattern=".{4,250}" title="4 caractères minimum" required>
              </div>
              <div class="form-group col-md">
                <label for="inputpassword2">Confirmer mot de passe</label>
                <input type="password" name="password2" class="form-control" id="inputpassword2" pattern=".{4,250}" title="4 caractères minimum" required>
              </div>
            </div>
            <button type="submit" class="btn">Valider</button>
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
