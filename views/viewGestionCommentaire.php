<section class="container mt-5 mb-5 p-5 gestionManga">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Modération des commentaires</h2>
    <hr>
    <div class="row my-5">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <button type="button" class="btn w-75" onclick="EventGestionCommentaire.EventChoose('manga')">Mangas</button>
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <button type="button" class="btn w-75" onclick="EventGestionCommentaire.EventChoose('anime')">Anime</button>
        </div>
    </div>
    <hr>
    <div class="row my-5 flex-column justify-content-center align-items-center">
    <h2 class="text-center">Notice</h2>
    <hr>
    <p class="text-center">Tout les commentaires du site Blackclover se retrouve ici, ils sont triés par Manga ou Anime, puis il sont retriés selon le Tome ou l'épisode a laquelle il correspond.</p>
    <p class="text-center">les commentaires signalés apparaisse en rouge au dessus des commentaires non signalés.</p>
    <p class="text-center">Vous avez deux choix soit "Valider" le commentaires pour autoriser a etre sur le site ou sinon le supprimer de la base de données se qui supprimera le commentaire de la base de données et ne pourras pas etre retrouvé.</p>
    <hr>
    
    </div>
    <div class="anime row my-5 flex-column justify-content-center align-items-center">
        <?php foreach ($arcs as $arc):?>
        <div class="d-flex justify-content-between align-items-center w-100">
            <i class="fas fa-hand-point-right"></i>
            <h5 onclick="EventGestionCommentaire.EventFirstClickArc(<?= $arc->id() ?>)" id="arc_<?= $arc->id() ?>"><?= $arc->title() ?></h5>
            <i class="fas fa-hand-point-left"></i>
        </div>
        <!--===============================================================================================-->
        <div class="DivGestionComs row my-5 w-100" id="DivGestionComsEp<?= $arc->id() ?>">


            <?php $numberArc = $arc->id(); ?>
            <?php foreach ($episodes as $episode):?>
            <?php if($episode->arc_id() == $numberArc){ ?>
            
            <div class="col-2 d-flex justify-content-center align-items-center my-2">
                <button class="btn" onclick="EventGestionCommentaire.EventFirstClickEpisode(<?= $episode->id() ?>)"><?= $episode->title() ?></button>
            </div>
            <?php }?>
            <?php endforeach?>
        </div>
        <hr>
        <!--===============================================================================================-->

        <?php foreach ($episodes as $episode):?>
        <div class="CommentaireBloc row my-5 w-100 card shadow mb-4 w-100" id="DivGestionComs<?= $episode->id() ?>">
            <?php $numberEpisode = $episode->id(); ?>

            <?php foreach ($comments as $comment):?>
            <?php if($comment->episode_id() == $numberEpisode AND $episode->arc_id() == $numberArc){
                    if($comment->report() == 1){ ?>
            <!--===============================================================================================-->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger"> Mr/Mme <?= htmlspecialchars($comment->pseudo()) ?> Le <?= $comment->comment_date() ?></h6>
            </div>
            <!--===============================================================================================-->
            <div class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                <p class="m-0"><?= htmlspecialchars($comment->content()) ?> </p>

                <div class=" d-flex flex-row-reverse">
                    <!--===============================================================================================-->
                    <form action="GestionCommentaire" method="post">
                        <div class="card-body d-flex flex-row justify-content-center">
                            <input type="hidden" name="Post" value="DeleteComment" />
                            <input type="hidden" name="id" value="<?= $comment->id() ?>" />
                            <input type="submit" value="Supprimer" class="btn btn-danger btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer se commentaire?'));">
                        </div>
                    </form>
                    <!--===============================================================================================-->
                    <form action="GestionCommentaire" method="post">
                        <div class="card-body d-flex flex-row justify-content-center">
                            <input type="hidden" name="Post" value="ManageComment" />
                            <input type="hidden" name="id" value="<?= $comment->id() ?>" />
                            <input type="submit" value="Valider" class="btn btn-success btn-sm">
                        </div>
                    </form>
                    <!--===============================================================================================-->
                </div>
                <!--===============================================================================================-->
            </div>

            <?php }  } ?>

            <?php endforeach?>
            <?php foreach ($comments as $comment):?>
            <?php if($comment->episode_id() == $numberEpisode AND $episode->arc_id() == $numberArc){ 
                if($comment->report() == 0){ ?>

            <!--===============================================================================================-->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-sucess"> Mr/Mme <?= htmlspecialchars($comment->pseudo()) ?> Le <?= $comment->comment_date() ?></h6>
            </div>
            <!--===============================================================================================-->
            <div class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                <p class="m-0"><?= htmlspecialchars($comment->content()) ?> </p>

                <div class=" d-flex flex-row-reverse">
                    <!--===============================================================================================-->
                    <form action="GestionCommentaire" method="post">
                        <div class="card-body d-flex flex-row justify-content-center">
                            <input type="hidden" name="Post" value="DeleteComment" />
                            <input type="hidden" name="id" value="<?= $comment->id() ?>" />
                            <input type="submit" value="Supprimer" class="btn btn-danger btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer se commentaire?'));">
                        </div>
                    </form>
                    <!--===============================================================================================-->
                </div>
                <!--===============================================================================================-->
            </div>



            <?php } } ?>
            <?php endforeach?>
        </div>
        <?php endforeach?>
        <hr>
        <?php endforeach?>
    </div>
    <div class="manga row my-5 flex-column justify-content-center align-items-center">
        <?php foreach ($mangas as $manga):?>
        <div class="d-flex justify-content-between align-items-center w-100">
            <i class="fas fa-hand-point-right"></i>
            <h5 onclick="EventGestionCommentaire.EventFirstClickManga(<?= $manga->id() ?>)" id="manga_<?= $manga->id() ?>"><?= $manga->title() ?></h5>
            <i class="fas fa-hand-point-left"></i>
        </div>
        <!--===============================================================================================-->
        <hr>
        <!--===============================================================================================-->
        <div class="CommentaireBloc row my-5 w-100 card shadow mb-4 w-100" id="DivGestionComsManga<?= $manga->id() ?>">
            <?php $numberManga = $manga->id(); ?>

            <?php foreach ($comments as $comment):?>
            <?php if($comment->manga_id() == $numberManga){
                    if($comment->report() == 1){ ?>
            <!--===============================================================================================-->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-danger"> Mr/Mme <?= htmlspecialchars($comment->pseudo()) ?> Le <?= $comment->comment_date() ?></h6>
            </div>
            <!--===============================================================================================-->
            <div class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                <p class="m-0"><?= htmlspecialchars($comment->content()) ?> </p>

                <div class=" d-flex flex-row-reverse">
                    <!--===============================================================================================-->
                    <form action="GestionCommentaire" method="post">
                        <div class="card-body d-flex flex-row justify-content-center">
                            <input type="hidden" name="Post" value="DeleteComment" />
                            <input type="hidden" name="id" value="<?= $comment->id() ?>" />
                            <input type="submit" value="Supprimer" class="btn btn-danger btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer se commentaire?'));">
                        </div>
                    </form>
                    <!--===============================================================================================-->
                    <form action="GestionCommentaire" method="post">
                        <div class="card-body d-flex flex-row justify-content-center">
                            <input type="hidden" name="Post" value="ManageComment" />
                            <input type="hidden" name="id" value="<?= $comment->id() ?>" />
                            <input type="submit" value="Validé" class="btn btn-success btn-sm">
                        </div>
                    </form>
                    <!--===============================================================================================-->
                </div>
                <!--===============================================================================================-->
            </div>

            <?php }  } ?>

            <?php endforeach?>
            <?php foreach ($comments as $comment):?>
            <?php if($comment->Manga_id() == $numberManga){ 
                if($comment->report() == 0){ ?>

            <!--===============================================================================================-->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-sucess"> Mr/Mme <?= htmlspecialchars($comment->pseudo()) ?> Le <?= $comment->comment_date() ?></h6>
            </div>
            <!--===============================================================================================-->
            <div class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                <p class="m-0"><?= htmlspecialchars($comment->content()) ?> </p>

                <div class=" d-flex flex-row-reverse">
                    <!--===============================================================================================-->
                    <form action="GestionCommentaire" method="post">
                        <div class="card-body d-flex flex-row justify-content-center">
                            <input type="hidden" name="Post" value="DeleteComment" />
                            <input type="hidden" name="id" value="<?= $comment->id() ?>" />
                            <input type="submit" value="Supprimer" class="btn btn-danger btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer se commentaire?'));">
                        </div>
                    </form>
                    <!--===============================================================================================-->
                </div>
                <!--===============================================================================================-->
            </div>



            <?php } } ?>
            <?php endforeach?>
        </div>
        <hr>
        <?php endforeach?>

    </div>

    <!--===============================================================================================-->
</section>
<script src="public/Javascript/EventGestionCommentaire.js"></script>
