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
                    <label for="<?php echo $item["name"]; ?>"><img class="changepictureicon" src="images/UIressources/addpictureimg.svg" alt=""></label>
                    <input id="<?php echo $item["name"]; ?>" type="file" name="itempicture" onchange="this.form.submit();">
                  </form>
                  <img id="mainimg" src="images/shopscontent/<?php echo $item["picture1"]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="articleinfos">
              <h1 id="displaytitleitem"><?php echo $item["name"]; ?><button type=button class="btntoggletitlechange"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button></h1>
              <form style="display : none" id="changeitemtitle" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=name" method="post">
                <input type="text" name="data" placeholder="<?php echo $item["name"]; ?>"<br>
                <input type="submit" name="submitbtn" value="Valider le nouveau titre">
                <button type="button" class="btntoggletitlechange">annuler</button>
              </form>
              <p id="description"><?php if (!empty($item["description"])){ echo $item["description"];} else{ echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."; } ?>
                <button type=button class="btntoggledescriptionchange"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button></p>
              <form style="display : none" id="descriptionchange" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=description" method="post">
                <textarea name="data" rows="8"><?php echo $item['description']; ?></textarea><br>
                <input type="submit" name="submitbtn" value="Changer le texte">
                <button type="button" class="btntoggledescriptionchange">annuler</button>
              </form>
              <h4>Prix : <span id="pricedisplay"><?php if (!empty($item["price"])){ echo $item["price"];} else{ echo "xxxx"; } ?></span>€<button type=button class="btntogglepricechange"><img src="images/UIressources/modifytext.svg" alt="modifier" height="25" width="25"></button>
                <form style="display : none" id="changeitemprice" action="index.php?action=changeitemdata&shopid=<?php echo $shop['shopid']; ?>&itemid=<?php echo $item['id'];?>&datatoedit=price" method="post">
                  <input type="text" name="data" placeholder="<?php if (!empty($item["price"])){ echo $item["price"];} else{ echo "xxxx"; } ?>"><br>
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

        <h1><span class="glyphicon glyphicon-heart"></span></h1>

        <?php if (empty($item['morefinfo'])) {?>
          <button type="button" id="addcategory"><h4>Plus d'infos +</h4></button>
        <?php } ?>

        <div class="moreinfo">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  </body>
