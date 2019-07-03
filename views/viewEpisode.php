<section class="container mt-5 mb-5 p-5">
    <?php foreach ($episodes as $episode):?>
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center display-4"><?= $episode->title() ?></h2>
    <hr>
    <div class="row d-flex justify-content-around align-item-center">
        <p>Date</p>
        <p>Notation</p>
    </div>
    <hr>

    <div class="row d-flex">
        <img class="col-lg-5 col-md-6 col-sm-12 divManga img-fluid" src="public/images/manga/black%20clover%20tome%20<?= $episode->arc_id() ?>.jpg">

        <div class="col-lg-7 col-md-6 col-sm-12 d-flex flex-column justify-content-center align-item-center">
            <h2 class="text-center">Synopsis</h2>
            <p class="text-center"><?= $episode->content() ?></p>
        </div>

    </div>
    <hr>
    <div class="w-100 p-2 d-flex justify-content-between align-items-center lienEpisode">
        <i class="fas fa-hand-point-right"></i>
        <h5 class="p-1"><a href="" class="text-center">Lien de la video</a></h5>
        <i class="fas fa-hand-point-left"></i>
    </div>

    <hr>
    <?php endforeach?>
    <h2 class="display-4">Commentaire</h2>
    <hr>
    <!--===============================================================================================-->
    <?php foreach ($comments as $comment):?>
    <div class="row d-flex card-body">
        <div class="col-12 d-flex m-auto align-item-center">
            <h5 class="mr-3 "><?= $comment->pseudo() ?></h5>
            <p><?= $comment->comment_date() ?></p>
        </div>
        <div class="col-11 card-body">
            <p><?= $comment->content() ?></p>
        </div>
        <?php if($comment->report() == 0){ ?>
        <div class="col-1 m-auto">
            <form action="Episode&id=<?= $_GET["id"] ?>" method="post">
                <input type="hidden" name="Post" value="ReportComment" />
                <div>
                    <input type="hidden" name="report" value="<?= $comment->id() ?>" />
                    <input type="submit" value="Signaler" class="btn-sm btn" onclick="return(confirm('Etes-vous sûr de vouloir signaler se commentaire?'));">
                </div>
            </form>
        </div>
        <?php }else if($comment->report() == 1){ ?>
        <div class="col-1 m-auto">
            <p class="text-danger">Signalé</p>
        </div>
        <?php } ?>
        <hr>
    </div>
    <?php endforeach?>
    <h2 class="display-4">Ecrire un commentaire</h2>
    <div class="p-1">
        <!--===============================================================================================-->
        <form action="Episode&id=<?= $_GET["id"] ?>" method="post">
            <input type="hidden" name="Post" value="NewCommentEpisode" />
            <div class="row">
                <div class="col-md-6 p-1">
                    <input placeholder="Votre Nom" name="pseudo" class="form-control" required>
                </div>
                <div class="col-md-12 p-1">
                    <textarea class="form-control" name="content" placeholder="Votre Message" required></textarea>
                </div>
                <div class="col-md-12 p-1 ">
                    <button class="btn btn-outline-success p-auto">Envoyer</button>
                </div>
            </div>
        </form>
        <!--===============================================================================================-->
    </div>
</section>
