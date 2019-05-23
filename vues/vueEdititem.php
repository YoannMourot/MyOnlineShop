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
          <div class="col-md-7 containerallitemimg">
            <div class="row">
              <div class="col-3">
                  <div class="containeritemsmallimg">
                    fff
                  </div>
                <div class="containeritemsmallimg">
                  fff
                </div>
                <div class="containeritemsmallimg">
                  ggg
                </div>
              </div>
              <div class="col-9">
                <div class="containermainimg">
                  <img src="images/shopscontent/<?php echo $item["picture1"]; ?>" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="articleinfos">
              <h1><?php echo $item["name"]; ?></h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <h4>Prix : xxx€</h4>
              <button type="button" name="button">acheter</button> <button type="button" name="button" value="">ajouter au favoris</button>
            </div>
          </div>
        </div>

        <div class="moreinfo">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>
  </body>
