<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "page produit php ";
      $pageDescription = "Contruction rapide et facile de votre boutique Mabel.";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php if ($shop['headerpresent']){
        include 'included_contents/customheader.php';
      }else {  ?>
        <div class="addsection">
          <a href="index.php?action=addsection&shopid=<?php echo $shop['shopid'] ?>&section=headerpresent"><img src="images/UIressources/addsection.svg" alt=""></a>
        </div>
      <?php }  ?>

      <div class="container">
        <a id="backtoshopindexlink" href="index.php?action=editshop&shopid=<?php echo $shop['shopid'] ?>">
          <img id="backtoshopindexicon" src="images/UIressources/navbararrow.svg" alt=""> Accueil
        </a>

        <div class="row">
          <div class="col-lg-7 containerallitemimg">
            <div class="row">
              <div class="col-2">
                <?php for ($i=0; $i < 3 ; $i++) { $selector = $i+1;?>
                  <div id="containersmallimg<?php echo $selector; ?> containeritemsmallimg" class="containeritemsmallimg">
                    <form class="changepicturelink" action="index.php?action=changepictureitem&itemid=<?php echo $item["id"]; ?>&shopid=<?php echo $item["shopid"]; ?>&imgnumber=<?php echo $i+1; ?>"  enctype="multipart/form-data" method="post">
                      <label for="<?php echo "photo$i" ?>"><img class="changepictureicon" src="images/UIressources/addpictureimg.svg" alt=""></label>
                      <input id="<?php echo "photo$i" ?>" type="file" name="itempicture" onchange="this.form.submit();">
                    </form>
                    <?php if (!empty($item["picture$selector"])) {?>
                      <img id="smallimg<?php echo $selector; ?>" src="images/shopscontent/<?php echo $item["picture$selector"]; ?>" alt="">
                  <?php } ?>
                  </div>
                <?php } ?>
              </div>
              <div class="col-10">
                <div id="containermainimg">
                  <form class="changepicturelink" action="index.php?action=changepictureproduct&itemid=<?php echo $item["id"]; ?>&shopid=<?php echo $item["shopid"]; ?>&imgnumber=1"  enctype="multipart/form-data" method="post">
                    <label for="<?php echo htmlspecialchars($item["name"]); ?>"><img class="changepictureicon" src="images/UIressources/addpictureimg.svg" alt=""></label>
                    <input id="<?php echo htmlspecialchars($item["name"]); ?>" type="file" name="itempicture" onchange="this.form.submit();">
                  </form>
                  <img id="mainimg" src="images/shopscontent/<?php echo $item["picture1"]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="articleinfos">
              <h1 id="displaytitleitem"><?php echo htmlspecialchars($item["name"]); ?><button type=button class="btntoggletitlechange"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button></h1>
              <form style="display : none" id="changeitemtitle" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=name" method="post">
                <input type="text" name="data" placeholder="<?php echo htmlspecialchars($item["name"]); ?>"<br>
                <input type="submit" name="submitbtn" value="Valider le nouveau titre">
                <button type="button" class="btntoggletitlechange">annuler</button>
              </form>
              <p id="description"><?php if (!empty($item["description"])){ echo htmlspecialchars($item["description"]);} else{ echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."; } ?>
                <button type=button class="btntoggledescriptionchange"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button></p>
              <form style="display : none" id="descriptionchange" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=description" method="post">
                <textarea name="data" rows="8"><?php echo htmlspecialchars($item['description']); ?></textarea><br>
                <input type="submit" name="submitbtn" value="Changer le texte">
                <button type="button" class="btntoggledescriptionchange">annuler</button>
              </form>
              <h4>Prix : <span id="pricedisplay"><?php if (!empty($item["price"])){ echo htmlspecialchars($item["price"]);} else{ echo "xxxx"; } ?></span>€<button type=button class="btntogglepricechange"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button>
                <form style="display : none" id="changeitemprice" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=price" method="post">
                  <input type="text" name="data" placeholder="<?php if (!empty($item["price"])){ echo htmlspecialchars($item["price"]);} else{ echo "xxxx"; } ?>"><br>
                  <input type="submit" name="submitbtn" value="Valider le prix">
                </form>
              </h4>
              <div class="row">
                <div class="col-md-8 col-xs-12">
                  <button type="button" class="btn btn-success addpanierbtn" style="font-size : 20px;">Ajouter au panier <i class="fas fa-cart-arrow-down"></i></button>
                </div>
                <div class="col-md-4 col-xs-12">
                  <button type="button" class="btn btn-warning addfavbtn"><i class="far fa-heart fa-2x"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section id="moreinfossection">
          <?php if (empty($item['moreinfo'])) {?>
            <button type="button" class="addmoreinfos"><h4>Plus d'infos +</h4></button>
          <?php }else {?>
            <h4>Plus d'infos:</h4>
            <p id="moreinfos"><?php echo htmlspecialchars($item['moreinfo']); ?><button type=button class="editinfos"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button></p>
          <?php } ?>
          <form style="display : none" id="editaddmoreinfos" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=moreinfo" method="post">
            <textarea name="data" rows="8"><?php echo htmlspecialchars($item['moreinfo']); ?></textarea>
            <input type="submit" name="submitbtn" value="Changer le texte">
            <button type="button" class="editinfos">annuler</button>
          </form>
        </section>

      </div>
    </div>
  </body>
