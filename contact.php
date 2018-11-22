<?php include('header.php'); ?>

<main class="container">
    <div class="bandeau">
        <h1>Contact</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="formulaire-contact">
                <form>
                    <p>
                        <label>Votre nom</label>
                        <span>
                            <input type="text" name="votre-nom" size="40">
                        </span>
                    </p>
                    <p>
                        <label>Votre email</label>
                        <span>
                            <input type="email" name="votre-email" size="50">
                        </span>
                    </p>
                    <p>
                        <label>Objet</label>
                        <span>
                            <input type="text" name="votre-objet" size="100">
                        </span>
                    </p>
                    <p>
                        <label>Corps du message</label>
                        <span>
                            <textarea name="votre-message" cols="40" rows="10"></textarea>
                        </span>
                    </p>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>