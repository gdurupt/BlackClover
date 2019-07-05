<section class="container mt-5 mb-5 p-5">
    <?php foreach ($mangas as $manga):?>
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center display-4"><?= $manga->title() ?></h2>
    <hr>
    <div class="row d-flex justify-content-around align-item-center">
        <p>Paru le 09/01/2016</p>
        <p>Notation</p>
    </div>
    <hr>

    <div class="row d-flex">
        <img class="col-lg-5 col-md-6 col-sm-12 divManga img-fluid" src="public/images/manga/<?= $manga->image() ?>">

        <div class="col-lg-7 col-md-6 col-sm-12 d-flex flex-column justify-content-center align-item-center">
            <h2 class="text-center">Synopsis</h2>
            <p class="text-center"><?= $manga->text() ?></p>
        </div>

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
        <div class="col-1 m-auto">
            <form action="Tome&id=<?= $_GET["id"] ?>" method="post">
                <input type="hidden" name="Post" value="ReportComment"/>
                <div>
                    <input type="hidden" name="report" value="<?= $comment->id() ?>"/>
                    <input type="submit" value="Signaler" class="btn-sm btn" onclick="return(confirm('Etes-vous sûr de vouloir signaler se commentaire?'));">
                </div>
            </form>
        </div>
        <hr>
        </div>
    <?php endforeach?>
        <h2 class="display-4">Ecrire un commentaire</h2>
        <div class="p-1">
            <!--===============================================================================================-->
            <form action="Tome&id=<?= $_GET["id"] ?>" method="post">
                <input type="hidden" name="Post" value="NewCommentManga" />
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
