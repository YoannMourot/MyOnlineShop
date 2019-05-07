<?php if (!isset($_SESSION['id'])) { ?>
  <div class="mySidenav">
    <div id="togglecontainer">
      <a href="javascript:void(0)" id="togglebtn">&#9776;</a>
    </div>
    <div class="ppcontainer">
      <img src="images/userspp/jane_doe.jpg" alt="">
    </div>
    <h5 class="Username">non connecté</h5>
    <a class="Navitems" href="index.php?action=showconnexion&from=<?php echo $pageTitle ?>">Me connecter</a>
    <a class="Navitems" href="index.php?action=showcreateaccount&from=<?php echo $pageTitle ?>">Me créer un compte</a>
  </div>
<?php }else { ?>
  <div class="mySidenav">
    <div id="togglecontainer">
      <a href="javascript:void(0)" id="togglebtn">&#9776;</a>
    </div>
    <div class="ppcontainer">
      <img src="images/userspp/<?php if (!empty($_SESSION['profilepic'])) {echo $_SESSION['profilepic'];} else { echo "jane_doe.jpg";} ?>" alt="">
    </div>
    <h5 class="Username"><?php echo $_SESSION['firstname'].' '.$_SESSION['name']; ?></h5>
    <a class="Navitems" href="index.php?action=showmyaccount">Mon compte</a>
    <a class="Navitems" href="index.php?action=showmyshops">Mes boutiques</a>
    <a class="Navitems" href="index.php?action=showmyorders">Mes commandes</a>
    <a class="disconnect" href="index.php?action=disconnect&from=<?php echo $pageTitle ?>">Me déconnecter</a>
  </div>
<?php } ?>
