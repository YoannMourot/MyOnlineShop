<?php
  $shop = getshop($_GET['shopid']);
  $categories = getshopcategories($_GET['shopid']);
  $items = getshopitems($_GET['shopid']);
  require('vues/vueShop.php');
?>
