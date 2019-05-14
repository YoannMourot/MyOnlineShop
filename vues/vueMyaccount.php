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
          <div id="changeppcontainer">
            <div class="ppcontainermyaccount">
              <img src="images/userspp/<?php if (!empty($_SESSION['profilepic'])) {echo $_SESSION['profilepic'];} else { echo "jane_doe.jpg";} ?>" alt="">
            </div>
            <button id="btnchangepp" data-toggle="collapse" data-target="#formchangepp"><img src="images/UIressources/modify.png" alt="modifier" height="15" width="15"></button>
            <form id="formchangepp" class="collapse" action="index.php?action=changeprofilepic" enctype="multipart/form-data" method="post">
              <input type="file" name="profilepic"><br>
              <input type="submit" value="Envoyer l'image">
            </form>
          </div>
          <h6>Numéro de compte : #<?php echo $_SESSION['id'] ?></h6><br>
          <h5>Nom : <?php echo $_SESSION['name'] ?> <button data-toggle="collapse" data-target="#changename"><img src="images/UIressources/modify.png" alt="modifier" height="15" width="15"></button></h5>
            <form id="changename" class="collapse" action="index.php?action=changename" method="post">
              <input type="text" name="name" placeholder="Nouveau nom">
              <input type="submit" value="submit">
            </form>
          <h5>Prénom : <?php echo $_SESSION['firstname'] ?> <button data-toggle="collapse" data-target="#changefirstname"><img src="images/UIressources/modify.png" alt="modifier" height="15" width="15"></button></h5>
            <form id="changefirstname" class="collapse" action="index.php?action=changefirstname" method="post">
              <input type="text" name="firstname" placeholder="Nouveau prénom">
              <input type="submit" value="submit">
            </form>
          <h5>Mail : <?php echo $_SESSION['mail'] ?> <button data-toggle="collapse" data-target="#changemail"><img src="images/UIressources/modify.png" alt="modifier" height="15" width="15"></button></h5>
            <form id="changemail" class="collapse" action="index.php?action=sendmailtoken" method="post">
              <input type="Mail" name="mail" placeholder="nouveaumail@orange.fr">
              <input type="submit" value="submit">
            </form>
          <h5>Mot de passe : ******** <button data-toggle="collapse" data-target="#changepw"><img src="images/UIressources/modify.png" alt="modifier" height="15" width="15"></button></h5>
            <form id="changepw" class="collapse" action="index.php?action=changepw" method="post">
              <input type="password" name="password" placeholder="mot de passe">
              <input type="password" name="password2" placeholder="confirmer mot de passe">
              <input type="submit" value="submit">
            </form>
        </section>
        <?php
          if (isset($errormsg)) {
            echo "<p class='errormsg'>$errormsg</p>";
          }elseif (isset(	$successmsg)) {
            echo "<p class='successmsg'>$successmsg</p>";
          }
        ?>
      </div>
    </div>
  </body>
</html>
