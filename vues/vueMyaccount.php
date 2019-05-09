<!DOCTYPE html>
<html>
  <head>
    <?php
      $pageTitle = "Mon compte";
      $pageDescription = "Consulter ou modifier mes informations de compte";
      include 'included_contents/head.php';
    ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container">
        <section class="infoscompte">
          <div class="ppcontainer">
            <img src="images/userspp/<?php if (!empty($_SESSION['profilepic'])) {echo $_SESSION['profilepic'];} else { echo "jane_doe.jpg";} ?>" alt="">
          </div>
          <h5>Nom : <?php echo $_SESSION['name'] ?></h5>
          <h5>Prénom : <?php echo $_SESSION['firstname'] ?></h5>
          <h5>Mail : <?php echo $_SESSION['mail'] ?></h5>
          <h5>Mot de passe : ********</h5>  
        </section>
      </div>
    </div>
  </body>
</html>
