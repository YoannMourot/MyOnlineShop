<!DOCTYPE html>
<html>
  <head>
    <?php include 'included_contents/head.php'; ?>
  </head>

  <body>
    <?php include 'included_contents/navbar.php'; ?>
    <div id="pagecontent">
      <?php include 'included_contents/header.php'; ?>
      <div class="container-fluid">
        <h1 style="text-align : center;">Et là, c'est le drame !</h1>
        <h5>Une erreur est survenue : <?= $msgErreur ?></h2>
      </div>
    </div>
  </body>
</html>