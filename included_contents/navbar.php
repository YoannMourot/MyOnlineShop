<?php if (!isset($_SESSION['id'])) { ?>
  <div class="mySidenav">
    <div id="togglecontainer">
      <a href="javascript:void(0)" id="togglebtn">&#9776;</a>
    </div>
    <div class="ppcontainer">
      <img src="images/jane doe.jpg" alt="">
    </div>
    <h5 class="Username">non connecté</h5>
    <a class="Navitems" href="#">Mon compte</a>
    <a class="Navitems" href="#">Mes boutiques</a>
    <a class="Navitems" href="#">Mes commandes</a>
    <a class="disconnect" href="#">Me déconnecter</a>
  </div>
<?php }else { ?>
  <div class="mySidenav">
    <div id="togglecontainer">
      <a href="javascript:void(0)" id="togglebtn">&#9776;</a>
    </div>
    <div class="ppcontainer">
      <img src="images/jane doe.jpg" alt="">
    </div>
    <h5 class="Username">jean michel</h5>
    <a class="Navitems" href="#">Mon compte</a>
    <a class="Navitems" href="#">Mes boutiques</a>
    <a class="Navitems" href="#">Mes commandes</a>
    <a class="disconnect" href="#">Me déconnecter</a>
  </div>
<?php } ?>
