<?php include('header.php'); 
require_once('connexion.php');
?>

<main class="container">
    <div class="bandeau">
        <h1>Création de compte</h1>
    </div>

    <form action="ajouterEtudiant.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Adresse e-mail</label>
      <input type="email" name="login" class="form-control" id="inputEmail4" placeholder="123@abcd.com">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Mot de passe</label>
      <input type="password" name="mdp" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresse</label>
    <input type="text" name="adresse" class="form-control" id="inputAddress" placeholder="123 rue...">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" name="ville" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Région</label>
      <select name="region" id="inputState" class="form-control">
        <option selected>Choisissez</option>
        <?php
            $sql = mysqli_query($conn, 'Select * from departement');
          while($donnees = mysqli_fetch_assoc($sql)) {
              echo '<option value="'.$donnees['nom'].'">'.$donnees['numero'].' - '.$donnees['nom'].'</option>';
          } ?>
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