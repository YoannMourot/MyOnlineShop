<!DOCTYPE html>
<html>
  <head>
    <?php include 'included_contents/head.php'; ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <div class="formcontainer">
          <h2>Connexion</h2>
          <form>
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
        </div>
      </div>
    </div>
  </body>
</html>
