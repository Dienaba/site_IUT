<?php include('header.php'); ?>

<main class="container">
<?php
    if (isset($_POST['login']) && isset($_POST['mdp']) && isset($_POST['ville']) && isset($_POST['adresse'])) {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
    
        require_once('connexion.php');
        mysqli_query($conn, "INSERT INTO adresses (ville,nom_adresse) VALUES ('$ville', '$adresse')") or die(mysqli_error($conn));
        mysqli_query($conn, "INSERT INTO etudiants (email, motdepasse) VALUES ('$login', '$mdp')") or die(mysqli_error($conn)); //
    ?>
        <p>INSCRIPTION REUSSIE !</p>
   <?php }else{
    echo "CA NE MARCHE PAS";
    } ?>
</main>

<?php include('footer.php'); ?>
 
