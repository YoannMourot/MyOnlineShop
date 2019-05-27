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
        include 'included_contents/customheader.php';
      }?>

      <?php if ($shop['navbarpresent']){?>
        <nav class="shopnav">
          <div class="containernavelements">
            <div class="containerbtnnav">
              <button id="navopen"><img src="images/UIressources/navbararrow.svg" alt="modifier" height="35" width="35"></button>
            </div>
            <?php foreach ($categories as $category): ?>
              <a class="elements" href="#<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>
            <?php endforeach; ?>
          </div>
        </nav>

      <?php }?>

      <?php if ($shop['aboutuspresent']){?>
        <section class="aboutus">
          <div class="container">
            <h1>A propos de nous</h1>
            <div class="row">
              <div class="col-md vertical-align">
                <div class="aboutusimgcontainer vertical-align">
                  <img class="aboutusimg" src="images/shopscontent/<?php echo $shop['aboutuspicture'] ?>" alt="fffz">
                </div>
              </div>
              <div class="col-md">
                <div class="aboutustextcontainer vertical-align">
                  <p id="aboutustext"><?php echo $shop['aboutustext']; ?></p>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php }?>

      <?php foreach ($categories as $category): ?>
      <div class="categorie">
        <div class="container">
          <h4 id="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></h4>
          <div class="articles">
            <div class="row">

              <?php foreach ($items as $item): ?>
                <?php if ($item["category"] == $category['id']): ?>
                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <div class="imgcontainer vertical-align">
                      <img class="itemimg" src="images/shopscontent/<?php echo $item["picture1"]; ?>" alt="">
                    </div>
                    <h6><?php echo $item["name"]; ?></h6>
                  </div>
                </div>
                <?php endif; ?>
              <?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </body>
</html>
