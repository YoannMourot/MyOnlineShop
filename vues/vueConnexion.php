<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Connexion a mon compte";
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
          <h2>Connexion</h2>
          <form action="index.php?action=connection&from=<?php echo $from ?>" method="post">
            <div class="form-group">
              <label for="inputmail">Adresse email</label>
              <input type="email" name="mail" class="form-control" id="inputmail" aria-describedby="emailHelp" placeholder="Entrez mail">
              <small id="emailHelp" class="form-text text-muted">Votre adresse mail ne sera jamais partagée a un tier</small>
            </div>
            <div class="form-group">
              <label for="inputpassword">Password</label>
              <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
          </form>
          <?php
            if (isset($errormsg)) {
              echo "<p class='errormsg'>$errormsg</p>";
            }
          ?>
          <p id="forgotaccount"><a href="index.php?action=showforgotaccount&from=<?php echo $from ?>">Au secours j'ai oublié mon mot de passe !</a></p>
          <p id="createaccount"><a href="index.php?action=showcreateaccount&from=<?php echo $from ?>">Je n'ai pas de compte, le créer maintenant !</a></p>
        </div>
      </div>
    </div>
  </body>
</html>
