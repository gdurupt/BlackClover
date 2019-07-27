<section class="container mt-5 mb-5 p-5 contact">

    <div>
<!--===============================================================================================-->
        <h2 class="d-flex justify-content-center">Contactez nous</h2>
        <p class="d-flex justify-content-center">Pour nous contacter veuillez renseigner tout les renseignements demander afin de faciliter l'equipe pour traiter votre demande</p>
<!--===============================================================================================-->
        <hr>
<!--===============================================================================================-->
        <form action="Contact" method="post" class="d-flex">
<!--===============================================================================================-->
            <input type="hidden" name="Post" value="Contact" />
<!--===============================================================================================-->
            <div class="row">
                <!--===============================================================================================-->
                <div class="d-flex col-md-12 mt-0 mb-0">
                    <div class="p-2">
                        <input class="" type="radio" required name="sexe" id="madame" value="Madame">
                        <label class="" for="madame">Mme</label>
                    </div>
                    <div class="p-2">
                        <input class="" type="radio" name="sexe" id="monsieur" value="Monsieur">
                        <label class="" for="monsieur">Mr</label>
                    </div>
                </div>
               <!--===============================================================================================-->
                <div class="col-md-12 mt-3 mb-3">
                    <input placeholder="Votre Nom" name="nom" class="form-control" required>
                </div>
                <!--===============================================================================================-->
                <div class="col-md-12 mt-3 mb-3">
                    <input type="email" required name="email" placeholder="Votre E-mail" class="form-control">
                </div>
                <!--===============================================================================================-->
                <div class="col-md-12 mt-3 mb-3">
                    <input placeholder="Veuillez indiqué l'objet de votre requete" name="objet" class="form-control" required>
                </div>
                <!--===============================================================================================-->
                <div class="col-md-12 mt-3 mb-3">
                    <textarea class="form-control" placeholder="Votre Message" name="message" rows="5" cols="33" required></textarea>
                </div>
                <!--===============================================================================================-->
                <div class="col-md-12">
                    <p>Etes vous membres notre site ?</p>
                    <div class="d-flex">
                        <div class="p-1">
                            <input class="" type="radio" required name="membre" id="oui" value="oui">
                            <label class="" for="oui">oui</label>
                        </div>
                        <div class="p-1">
                            <input class="" type="radio" name="membre" id="non" value="non">
                            <label class="" for="non">non</label>
                        </div>
                    </div>
                </div>
                <!--===============================================================================================-->
                <div class="col-md-12 mt-3 mb-3">
                    <input type="checkbox" required id="cgu">
                    <label for="cgu">J’accepte la politique de confidentialité de BlackCloverWiki.</label>
                </div>
                <!--===============================================================================================-->
                <div class="col-md-12 mt-3 mb-3 d-flex justify-content-center">
                    <button class="btn btn-outline-success ">Envoyer</button>
                </div>
            </div>
        </form>
        <!--===============================================================================================-->
        <hr>
        <!--===============================================================================================-->
        <p class="d-flex justify-content-center">L'equipe se charge de vous repondre dans les plus breves delaie</p>
    </div>

</section>
