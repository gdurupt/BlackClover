<!DOCTYPE html>
<html lang="fr">
<!--===============================================================================================-->
<!--================================         HEAD          ========================================-->
<!--===============================================================================================-->

<head>
    <meta charset="UTF-8">
    <!--===============================================================================================-->
    <title><?= "Black Clover " .$_GET["url"] ?></title>
    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--===============================================================================================-->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
    <!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="public/images/icon/blackclover.jpg" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="public/CSS/MainCss">
    <!--===============================================================================================-->
    <script src="https://kit.fontawesome.com/f6cdfcda13.js"></script>
    <!--===============================================================================================-->

</head>

<body>
    <!--===============================================================================================-->
    <!--================================         HEADER          ======================================-->
    <!--===============================================================================================-->
    <header class="d-flex flex-column align-items-center sticky-top">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <!--===============================================================================================-->
                <a href="Accueil" class="navbar-brand col-lg-3 col-sm-11 d-flex justify-content-center">
                    <img id="logo" src="public/images/divers/logo.png" alt="Logo Black Clover Wiki">
                </a>
                <!--===============================================================================================-->
                <nav class="navbar navbar-expand-lg col-lg-7 col-sm-12 justify-content-center text-center" id="menuNav">
                    <div class="main-navbar">
                        <ul class="navbar-nav mr-auto">
                            <!--===============================================================================================-->
                            <li class="nav-item">
                                <a class="nav-link" href="Manga">Manga</a>
                            </li>
                            <!--===============================================================================================-->
                            <li class="nav-item">
                                <a class="nav-link" href="Personnage">
                                    Personnage
                                </a>
                            </li>
                            <!--===============================================================================================-->
                            <li class="nav-item">
                                <a class="nav-link" href="Episodes">Episodes</a>
                            </li>
                            <!--===============================================================================================-->
                            <li class="nav-item active">
                                <?php   
                            if(isset($_SESSION['pseudo'])){ ?>
                                <a class="nav-link" href="Compte">Compte</a><?php       
                            }else{ ?>
                                <a class="nav-link" href="Connection">Se connecter</a><?php
                            }?>
                            </li>
                            <!--===============================================================================================-->

                            <?php   
                            if(isset($_SESSION['admin']) AND $_SESSION['admin'] == 'true'){ ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="Admin">Accueil Admin</a>
                                    <a class="dropdown-item" href="GestionManga">Gestion Mangas</a>
                                    <a class="dropdown-item" href="GestionArcEpisode">Gestion Arcs/Episodes</a>
                                    <a class="dropdown-item" href="GestionPersonnage">Gestion Personnages</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="GestionCommentaire">Moderation Commentaires</a>
                                </div>
                            </li>
                            <?php       
                            }else{
                            }
?>

                            <!--===============================================================================================-->
                            <li class="nav-item active">
                                <?php   
                            if(isset($_SESSION['pseudo'])){ ?>
                                <a class="nav-link" href="deconnection">Deconnexion</a><?php       
                            }else{
                            }
?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--===============================================================================================-->
                <button type="button" id="navButton" class="col-lg-1 col-sm-12">
                    <span>
                        <i class="fas iconeNav"></i>
                    </span>
                </button>
                <!--===============================================================================================-->
            </div>
        </div>
    </header>


    <!--===============================================================================================-->
    <!--================================         Data         ======================================-->
    <!--===============================================================================================-->
    <?php echo $content ?>
    <!--===============================================================================================-->
    <!--================================         FOOTER          ======================================-->
    <!--===============================================================================================-->
    <footer>
        <div class="container">
            <div class="row d-flex flex-column flex-md-row align-items-center justify-content-center mt-1">
                <p class="p-1"><a href="Accueil">Politique de confidentialité</a></p>
                <p class="p-1 d-none d-lg-flex">|</p>
                <p class="p-1"><a href="QuiSommesNous">Qui sommes nous ?</a></p>
                <p class="p-1 d-none d-lg-flex">|</p>
                <p class="p-1"><a href="Contact">Nous Contacter</a></p>
            </div>
            <div class="row d-flex align-items-center justify-content-center mt-0">
                <h1>BlackClover Wiki 2019. Projet étudiant</h1>
            </div>
        </div>
    </footer>
    <!--===============================================================================================-->
    <!--================================         SCRIPT          ======================================-->
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/Javascript/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="public/Javascript/EventNav.js"></script>
    <!--===============================================================================================-->
</body>

</html>
