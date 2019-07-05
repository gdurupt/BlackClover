<section class="container mt-5">
            
    
    <img class="mt-3 banniereConnection" src="public/images/divers/blackCloverBanniere.jpg">
 <!--===============================================================================================-->    
            <div class="row d-flex justify-content-center align-items-center m-5 p-4 h-100">
<!--===============================================================================================-->  
                <form action="Connection" method="post" class="d-flex flex-column justify-content-center align-items-center text-center col-lg-4">
                    <input type="hidden" name="Post" value="ConnectUsers"/>
                    <div >
                        <h3 class="display-5 pb-5">Deja Membre ?</h3>
                    </div>
                    <div class="d-flex m-1 pb-2">
                        <input type="email" name="email" placeholder="E-mail" class="form-control" required>
                        <span class="ml-3">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <div class="d-flex m-1 pb-3">
                        <input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
                        <span class="ml-3">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div>
                        <input type="submit" class="m-1 btn btn-outline-success" value="Connexion">
                    </div>
                    <a class="nav-link m-1 text-center" href="">J'ai oublier mes identifiant ?</a>
                </form>
<!--===============================================================================================-->
                <img src="public/images/divers/barreV.png" alt="Barre verticale" class="col-lg-4 d-none d-lg-block d-xl-block">
                <img src="public/images/divers/barreH.png" alt="Barre verticale" class="col-lg-4 d-none d-lg-none d-xl-none d-md-block d-sm-block">
<!--=============================================================================================== -->
                <form action="Connection" method="post" class="d-flex flex-column justify-content-center align-items-center col-lg-4">
                    <input type="hidden" name="Post" value="addUsers"/>
                    <div class="d-flex flex-column p-1 text-center">
                        <h3 class="display-5 pb-5 text-center">Creer un Compte</h3>
                    </div>
                    <div class="d-flex m-1 pb-2">
                        <input type="email" name="email" placeholder="E-mail" class="form-control" required>
                        <span class="ml-3">
                            <i class="fa fa-envelope"></i>
                        </span> 
                    </div>
                    <div class="d-flex m-1 pb-2">
                        <input type="text" name="pseudo" placeholder="Pseudo" class="form-control" required>
                        <span class="ml-3">
                            <i class="fas fa-user-circle"></i>
                        </span>
                    </div>
                    <div class="d-flex m-1 pb-2">
                        <input type="password" name="password" placeholder="Mot de passe" class="form-control" required>
                        <span class="ml-3">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-outline-success" value="Creer un compte">
                    </div>
                </form>
                    <p class="d-flex justify-content-center align-items-center m-4 text-center">Créer un compte afin de pouvoir laisser une notation ou commentaire sur chaque épisode et manga</p>
            </div>
</section>