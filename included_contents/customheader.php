<header style="text-align: center;">
  <div class="removesection">
    <a href="index.php?action=removesection&shopid=<?php echo $shop['shopid'] ?>&section=headerpresent"><img class="removesectionimg" src="images/UIressources/removesection.svg" alt=""></a>
  </div>
  <a style="margin-left: -70px;" href="index.php"><img id="custom_header_logo" src="<?php if ($shop['shoplogo']!="shoplogo.png") { echo 'images/shopscontent/'.$shop['shoplogo']; }else { echo "images/UIressources/Mabel_logo.svg";} ?>" alt=""></a>
</header>
