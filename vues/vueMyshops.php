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
        <?php
          if (isset($changeshoppictureerror)) {
            echo "<p class='errormsg'>$changeshoppictureerror</p>";
          }
        ?>
        <?php foreach ($shops as $shop) { ?>
        <div class="containerboutique">
          <div class="headercontainerboutique">
            <div class="containerimgboutique">
              <form id="changeshopimage" action="index.php?action=changeshoppicture&shopid=<?php echo $shop['shopid']; ?>"  enctype="multipart/form-data" method="post">
                <label for="<?php echo htmlspecialchars($shop['name']); ?>"><img src="images/UIressources/modify.png" alt="modifier" height="15" width="15"></label>
                <input id="<?php echo htmlspecialchars($shop['name']); ?>" type="file" name="shoppicture" onchange="this.form.submit();">
              </form>
              <img class="logoboutique" src="images/shopscontent/<?php echo $shop['shoplogo']; ?>" alt="iconboutique">
            </div>
            <h4 class="titreboutique"><?php echo htmlspecialchars($shop['name']); ?></h4>
            <div class="boutiquestatuscontainer <?php echo ($shop['status'] == "offline" ? "bgorange" : "bggreen")?>">
              <h5 class="boutiquestatus"><?php echo $shop['status']; ?></h5>
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
              <li><a class="blue" href="index.php?action=editshop&shopid=<?php echo $shop['shopid']; ?>">Consulter/modifier</a></li>
              <li><a class="orange" href="index.php?action=changeshopstatus&shopid=<?php echo $shop['shopid'] ?>&newstatus=<?php echo ($shop['status'] == "offline" ? "online" : "offline")?>"><?php echo ($shop['status'] == "offline" ? "Mettre en ligne" : "Mettre hors ligne")?></a></li>
              <li><a class="red" data-toggle="modal" data-target="#confirm-delete" href="#" data-href="index.php?action=closeshop&shopid=<?php echo $shop['shopid']; ?>">Fermer la boutique</a></li>
            </div>
          </div>
        </div>
        <?php } ?>
        <div id="emptyboutique" class="containerboutique">
          <button data-toggle="modal" data-target="#exampleModal"><img class="addbutton" src="images/UIressources/AddButton.svg" alt="addbutton"></button>
        </div>
      </div>

      <div class="modal fade vuemyshops" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="index.php?action=createshop#emptyboutique" method="POST">
              <div class="modal-body">
                <div class="form-group">
                  <label for="shopname"><h5>Choisir le nom de la nouvelle boutique</h5></label>
                  <input type="text" class="form-control" id="shopname" name="shopname" placeholder="Ma Boutique de chaussure">
                </div>
                <?php
                  if (isset($_GET['feedbackmsg'])) {
                    echo "<p class='errormsg createshoperror'>".displayfeedbackmessage($_GET['feedbackmsg'])."</p>";
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

      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <h3>confirmer la suppression de la boutique ?</h1>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
              <a class="btn btn-danger btn-ok">Confirmer</a>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        reshowmodal();
      </script>

    </div>
  </body>
</html>
