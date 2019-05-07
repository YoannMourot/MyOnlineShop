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
      <div class="container-fluid">
        <h1><?php echo $pageTitle; ?></h1>
      </div>
    </div>
  </body>
</html>
