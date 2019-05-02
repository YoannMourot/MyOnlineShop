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
        <div class="formcontainer">
          <h2>Créer mon compte</h2>

          <form action="index.php">
            <div class="form-row">
              <div class="form-group col-md">
                <label for="inputname">Nom</label>
                <input type="text" maxlength="30" name="prenom" class="form-control" id="inputname" placeholder="Nom">
              </div>
              <div class="form-group col-md">
                <label for="inputprenom">Prénom</label>
                <input type="text" maxlength="30" name="prenom" class="form-control" id="inputprenom" placeholder="prénom">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
          </form>

        </div>
      </div>
    </div>
  </body>
</html>
