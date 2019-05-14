<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Mes boutiques";
      $pageDescription = "Voir mes boutiques";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">

      <?php include 'included_contents/header.php'; ?>
      <div class="container">
        <div class="containerboutique">
          <div class="headercontainerboutique">
            <img class="logoboutique" src="images/UIressources/logoshopsample.png" alt="iconboutique">
            <h4 class="titreboutique">Nom_boutique</h4>
            <div class="boutiquestatuscontainer">
              <h5 class="boutiquestatus">En ligne</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-sm">
              <li><a href="#">Commandes en attentes</a></li>
              <li><a href="#">Toutes les commandes</a></li>
              <li><a href="#">Stocks</a></li>
              <li><a href="#">coupons</a></li>
            </div>
            <div class="col-sm boutiquesactions">
              <li><a class="blue" href="#">Consulter/modifier</a></li>
              <li><a class="orange" href="#">Mettre hors ligne</a></li>
              <li><a class="red" href="#">Fermer la boutique</a></li>
            </div>
          </div>
        </div>

        <div class="containerboutique emptyboutique">
          <button data-toggle="modal" data-target="#exampleModal"><img class="addbutton" src="images/UIressources/AddButton.svg" alt="addbutton"></button>
        </div>
      </div>

      <div class="modal fade vuemyshops" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="index.php?action=createshop" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="shopname"><h5>Choisir le nom de la nouvelle boutique</h5></label>
                  <input type="text" class="form-control" id="shopname" name="shopname" placeholder="Ma Boutique de chaussure">
                </div>
                <?php
                  if (isset($errormsg)) {
                    echo "<p class='errormsg'>$errormsg</p>";
                  }
                ?>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Valider le nom</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <h1><?php echo $_SESSION['id'] ?></h1>
            <?php var_dump($boutiques); ?>


    </div>
  </body>
</html>
