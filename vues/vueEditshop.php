<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Create my shop";
      $pageDescription = "Contruction rapide et facile de votre boutique Mabel.";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php if ($shop['headerpresent']){
        include 'included_contents/customheaderedit.php';
      }else {  ?>
        <div class="addsection">
          <a href="index.php?action=addsection&shopid=<?php echo $shop['shopid'] ?>&section=headerpresent"><img src="images/UIressources/addsection.svg" alt=""></a>
        </div>
      <?php }  ?>

      <?php if ($shop['navbarpresent']){?>
        <nav class="shopnav">
          <div class="removesection">
            <a href="index.php?action=removesection&shopid=<?php echo $shop['shopid'] ?>&section=navbarpresent"><img class="removesectionimg" src="images/UIressources/removesection.svg" alt=""></a>
          </div>
          <div class="containernavelements">
            <div class="containerbtnnav">
              <button id="navopen" class=""><img src="images/UIressources/navbararrow.svg" alt="modifier" height="35" width="35"></button>
            </div>
            <?php foreach ($categories as $category): ?>
              <a class="elements" href="#"><?php echo $category['name']; ?></a>
            <?php endforeach; ?>
          </div>
        </nav>

      <?php }else {  ?>
        <div class="addsection">
          <a href="index.php?action=addsection&shopid=<?php echo $shop['shopid'] ?>&section=navbarpresent"><img src="images/UIressources/addsection.svg" alt=""></a>
        </div>
      <?php }  ?>

      <?php if ($shop['aboutuspresent']){?>
        <section class="aboutus">
          <div class="removesection">
            <a href="index.php?action=removesection&shopid=<?php echo $shop['shopid'] ?>&section=aboutuspresent"><img class="removesectionimg" src="images/UIressources/removesection.svg" alt=""></a>
          </div>
          <div class="container">
            <h1>A propos de nous</h1>
            <div class="row">
              <div class="col-md vertical-align">
                <img class="aboutusimg" src="images/UIressources/bee.png" alt="fffz">
              </div>
              <div class="col-md">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, se elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </section>
      <?php }else {  ?>
        <div class="addsection">
          <a href="index.php?action=addsection&shopid=<?php echo $shop['shopid'] ?>&section=aboutuspresent"><img src="images/UIressources/addsection.svg" alt=""></a>
        </div>
      <?php }  ?>

      <?php foreach ($categories as $category): ?>
      <div class="categorie">
        <div class="container">
          <h4><?php echo $category['name']; ?><a class="linkdeletecategory" href="index.php?action=deletecategory&categoryid=<?php echo $category["id"]; ?>&shopid=<?php echo $shop['shopid'] ?>"><img class="deletecategoryicon" src="images/UIressources/removecategory.svg" alt=""></a></h4>
          <div class="articles">
            <div class="row">

              <?php foreach ($items as $item): ?>
                <?php if ($item["category"] == $category['id']): ?>
                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <a class="linkdeleteitem" href="index.php?action=deleteitem&itemid=<?php echo $item["id"]; ?>&shopid=<?php echo $item["shopid"]; ?>"><img class="deleteitemicon" src="images/UIressources/removeitems.svg" alt=""></a>
                        <img class="itemimg" src="images/shopscontent/<?php echo $item["picture1"]; ?>" alt="">
                        <form class="changepicturelink" action="index.php?action=changepictureproduct&itemid=<?php echo $item["id"]; ?>&shopid=<?php echo $item["shopid"]; ?>&imgnumber=1"  enctype="multipart/form-data" method="post">
                          <label for="<?php echo $item["name"]; ?>"><img class="changepictureicon" src="images/UIressources/addpictureimg.svg" alt=""></label>
                          <input id="<?php echo $item["name"]; ?>" type="file" name="itempicture" onchange="this.form.submit();">
                        </form>
                      </div>
                      <h6><?php echo $item["name"]; ?></h6>
                    </a>
                  </div>
                </div>
                <?php endif; ?>
              <?php endforeach; ?>

              <div class="col-lg-3 col-md-4 col-sm-6" >
                <div id="emptycontainerarticle" class="unarticle">
                  <button data-toggle="modal" data-target="#newitem" data-book-id="<?php echo $category['id']; ?>"><img class="addbutton" src="images/UIressources/AddButton.svg" alt="addbutton"></button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>


    <div class="container">
      <button type="button" id="addcategory" data-toggle="modal" data-target="#newcat"><h4>Ajouter une categorie +</h4></button>
    </div>


    <div class="modal fade" id="newitem" tabindex="-1" role="dialog" aria-labelledby="Modaladditem" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="index.php?action=additem&shopid=<?php echo $shop['shopid'] ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="itemname"><h5>Nom du nouvel article</h5></label>
                <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Chaise en bois d'olivier">
                <input type="hidden" id="itemcategory" name="categoryid" value="<?php if (isset($itemadding)){ echo $itemadding;} ?>">
              </div>
              <?php
                if (isset($additemerror)) {
                  echo "<p class='errormsg additemerror'>$additemerror</p>";
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

    <div class="modal fade" id="newcat" tabindex="-1" role="dialog" aria-labelledby="Modaladditem" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="index.php?action=addcategory&shopid=<?php echo $shop['shopid'] ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label for="categoryname"><h5>Nom de la nouvelle catégorie</h5></label>
                <input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="Meubles en bois">
              </div>
              <?php
                if (isset($addcategoryerror)) {
                  echo "<p class='errormsg addcategoryerror'>$addcategoryerror</p>";
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
