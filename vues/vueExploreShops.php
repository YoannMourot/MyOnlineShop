<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Explorer les boutiques";
      $pageDescription = "Explorez les boutiques ou rechercher un produit";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container">
        <h1 style="text-align : center;"> explorer les boutiques en lignes </h1>

        <?php foreach ($shops as $shop): ?>
          <a href="index.php?action=showshop&shopid=<?php echo $shop['shopid']; ?>">
          <div class="containerboutique">
            <div class="headercontainerboutique">
              <div class="containerimgboutique">
                <img class="logoboutique" src="images/shopscontent/<?php echo $shop['shoplogo']; ?>" alt="iconboutique">
              </div>
              <h4 class="titreboutique"><?php echo htmlspecialchars($shop['name']); ?></h4>
              <div class="boutiquestatuscontainer <?php echo ($shop['status'] == "offline" ? "bgorange" : "bggreen")?>">
                <h5 class="boutiquestatus"><?php echo $shop['status']; ?></h5>
              </div>
            </div>
          </div>
        </a>
      <?php endforeach; ?>

      </div>
    </div>
  </body>
</html>
