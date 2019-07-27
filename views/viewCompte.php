<section class="container mt-5 mb-5 p-5">
    <h2 class="d-flex justify-content-center">Compte</h2>
    <hr>
    <p class="d-flex justify-content-center text-center">Bonjour <?= $_SESSION['pseudo'] ?>, sur cette page vous allez pouvoir changer vos données de compte, votre e'mail, votre pseudo ou bien alors votre mot de passe.</p>
    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->

    <div class="d-flex flex-column justify-content-center align-items-center w-100">
        <form action="Compte" method="post" class="formCompte row w-100 my-5 py-3 d-flex justify-content-around align-items-center">
            <input type="hidden" name="Post" value="ChangePseudo" />
            <div class="col-12 d-flex col-lg-8">
                <input type="text" placeholder="Changer votre pseudo" name="pseudo" class="form-control" required>
            </div>
            <div class="col-12 col-lg-2 d-flex justify-content-around align-items-center my-1">
                <input type="submit" value="Modifier" class="btn btn-success btn px-3 ">
            </div>
        </form>
        <form action="Compte" method="post" class="formCompte row w-100 my-5 py-3 d-flex justify-content-around align-items-center">
            <input type="hidden" name="Post" value="ChangeEmail" />
            <div class="col-12 d-flex col-lg-8">
                <input type="email" placeholder="Changer votre e-mail" name="email" class="form-control" required>
            </div>
            <div class="col-2 col-lg-2 d-flex justify-content-around align-items-center my-1">
                <input type="submit" value="Modifier" class="btn btn-success btn px-3 ">
            </div>
        </form>
        <form action="Compte" method="post" class="formCompte row w-100 my-5 py-3 d-flex justify-content-around align-items-center">
            <input type="hidden" name="Post" value="ChangePass" />
            <div class="col-12 d-flex col-lg-8">
                <input type="password" placeholder="Changer votre password" name="password" class="form-control" required>
            </div>
            <div class="col-lg-2 d-flex justify-content-around align-items-center my-1">
                <input type="submit" value="Modifier" class="btn btn-success btn px-3 ">
            </div>
        </form>
    </div>


</section>
