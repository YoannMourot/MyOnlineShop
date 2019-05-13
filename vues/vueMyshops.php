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
            <img class="logoboutique" src="images/logoshopsample.png" alt="iconboutique">
            <h4 class="titreboutique">Nom_boutique</h4>
            <div class="boutiquestatuscontainer">
              <h5 class="boutiquestatus">En ligne</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
