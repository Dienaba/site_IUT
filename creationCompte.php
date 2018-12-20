<?php include('header.php'); ?>

<main class="container">
    <div class="bandeau">
        <h1>Création de compte</h1>
    </div>

    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Adresse e-mail</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="123@abcd.com">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mot de passe</label>
      <input type="password" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresse</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="123 rue...">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Région</label>
      <select id="inputState" class="form-control">
        <option selected>Choisissez</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Code postal</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <button class="btn btn-lg btn-block" type="submit">S'inscrire</button>
</form>
</main>

<?php include('footer.php'); ?>