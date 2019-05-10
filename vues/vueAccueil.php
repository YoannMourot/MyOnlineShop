<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Acceuil";
      $pageDescription = "Explorez des milliers de boutiques en ligne et créez la votres en quelques clics.";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <h1 class="maintitle">Explorez des milliers de boutiques en ligne<br>et créez la votre en quelques clics.</h1>
        <div class="row">
          <div class="col-sm">
            <a href="index.php?action=showcreateshop">
            <img class="logoaccueil" src="images/building_shop.svg" alt="">
            <h5 class="titlecreate">Créez votre boutique</h5>
          </div>
          <div class="col-sm">
            <a href="index.php?action=showexploreshops">
              <img class="logoaccueil" src="images/explorer_shop.svg" alt="">
              <h5 class="titlesearch">Explorez les boutiques</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
