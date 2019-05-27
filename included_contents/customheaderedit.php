<header style="text-align: center; background-color : <?php echo $shop['headercolor']; ?>;">
  <form id="changecolorform" action="index.php?action=changeshopheader&shopid=<?php echo $shop['shopid'] ?>" method="post">
    <label for="chooseheadercolor">Changer la couleur</label>
    <input id="chooseheadercolor" type="color" name="color" value="<?php echo $shop['headercolor']; ?>" onchange="this.form.submit();">
  </form>
  <div class="removesection">
    <a href="index.php?action=removesection&shopid=<?php echo $shop['shopid'] ?>&section=headerpresent"><img class="removesectionimg" src="images/UIressources/removesection.svg" alt=""></a>
  </div>
  <a style="margin-left: -70px;" href="index.php?action=editshop&shopid=<?php echo $shop['shopid']; ?>"><img id="custom_header_logo" src="<?php if ($shop['shoplogo']!="shoplogo.png") { echo 'images/shopscontent/'.$shop['shoplogo']; }else { echo "images/UIressources/Mabel_logo.svg";} ?>" alt=""></a>
</header>
