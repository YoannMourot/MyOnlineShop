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
    <?php var_dump($shop); ?>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
        <nav class="shopnav">
          <div class="containernavelements">
            <div class="containerbtnnav">
              <button id="navopen"><img src="images/UIressources/navbararrow.svg" alt="modifier" height="35" width="35"></button>
            </div>
            <a href="#">Categorie1</a>
            <a href="#">Categorie1</a>
            <a href="#">Categorie1</a>
            <a href="#">Categorie1</a>
            <a href="#">Categorie1</a>
            <a href="#">Categorie1</a>
          </div>
        </nav>

        <section class="aboutus">
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

        <div class="categorie">
          <div class="container">
            <h4>Catégorie : chaussure</h4>
            <div class="articles">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure<br>49€</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/baguette.jpg" alt="">
                      </div>
                      <h6>Belle chaussure version limitée<br>60€</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="unarticle">
                    <a href="#">
                      <div class="imgcontainer vertical-align">
                        <img src="images/UIressources/shoe.jpg" alt="">
                      </div>
                      <h6>Belle chaussure</h6>
                    </a>
                  </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6" >
                  <div class="addarticlecontainer">
                    <a href="#">
                      <div id="emptycontainerarticle" class="unarticle emptycontainerarticle">
                        <button data-toggle="modal" data-target="#exampleModal"><img class="addbutton" src="images/UIressources/AddButton.svg" alt="addbutton"></button>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
  </body>
</html>
