<header style="text-align: center; background-color : <?php echo $shop['headercolor']; ?>;">
  <a style="margin-left: -70px;" href="index.php?action=editshop&shopid=<?php echo $shop['shopid']; ?>"><img id="custom_header_logo" src="<?php if ($shop['shoplogo']!="shoplogo.png") { echo 'images/shopscontent/'.$shop['shoplogo']; }else { echo "images/UIressources/Mabel_logo.svg";} ?>" alt=""></a>
</header>
