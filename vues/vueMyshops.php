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
          <a href="#"><img class="addbutton" src="images/UIressources/AddButton.svg" alt="addbutton"></a>
        </div>

      </div>
    </div>
  </body>
</html>
