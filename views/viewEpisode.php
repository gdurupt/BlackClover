<!--===============================================================================================-->
<?php foreach ($notations as $notation):?>
<?php $note = $notation->notation();?>
<?php endforeach?>
<!--===============================================================================================-->
<?php foreach ($nbratings as $nbrating):?>
<?php $nbVote = $nbrating->nbRatings();?>
<?php endforeach?>
<!--===============================================================================================-->
<section class="container mt-5 mb-5 p-5">
    <?php foreach ($episodes as $episode):?>
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center display-4"><?= $episode->title() ?></h2>
    <hr>
    <!--===============================================================================================-->
    <div class="row d-flex justify-content-around align-item-center">
        <p><?= $episode->date_episode() ?></p>
        <p><?php if($nbVote > 0){
        echo $note."/10 De ".$nbVote." membres";
                }else{
        echo "Aucune note pour le moment"; }?>    
        </p>
    </div>
    <hr>
    <!--===============================================================================================-->
    <div class="row d-flex">
        <?php foreach ($mangas as $manga):?>
            <?php if($episode->manga_id() == $manga->id()){ ?>
                <img class="col-lg-5 col-md-6 col-sm-12 divManga img-fluid" src="public/images/manga/<?= $manga->image() ?>" alt="<?= $manga->title() ?>">
            <?php } endforeach; 
                  if($episode->manga_id() == 0){ ?>
                <img class="col-lg-5 col-md-6 col-sm-12 divManga img-fluid" src="public/images/manga/imageexemple.jpg">
                    <?php } ?>
        <!--===============================================================================================-->
        <div class="col-lg-7 col-md-6 col-sm-12 d-flex flex-column justify-content-around">
            <h2 class="text-center">Synopsis</h2>
            <p class="text-center"><?= $episode->content() ?></p>
            <hr>
            <div class="d-flex justify-content-around align-items-center">
                <h5>Noter :</h5>
                <!--===============================================================================================-->
                <div><?php if(isset($_SESSION['id'])){ ?>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=1&update=<?= $_SESSION['rating'] ?>" id="star_1" class="text-decoration-none">
                        <span><i class="far fa-star note_1" onmouseenter="NotationEvent.enter(0)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=2&update=<?= $_SESSION['rating'] ?>" id="star_2" class="text-decoration-none">
                        <span><i class="far fa-star note_2" onmouseenter="NotationEvent.enter(1)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=3&update=<?= $_SESSION['rating'] ?>" id="star_3" class="text-decoration-none">
                        <span><i class="far fa-star note_3" onmouseenter="NotationEvent.enter(2)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=4&update=<?= $_SESSION['rating'] ?>" id="star_4" class="text-decoration-none">
                        <span><i class="far fa-star note_4" onmouseenter="NotationEvent.enter(3)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=5&update=<?= $_SESSION['rating'] ?>" id="star_5" class="text-decoration-none">
                        <span><i class="far fa-star note_5" onmouseenter="NotationEvent.enter(4)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=6&update=<?= $_SESSION['rating'] ?>" id="star_6" class="text-decoration-none">
                        <span><i class="far fa-star note_6" onmouseenter="NotationEvent.enter(5)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=7&update=<?= $_SESSION['rating'] ?>" id="star_7" class="text-decoration-none">
                        <span><i class="far fa-star note_7" onmouseenter="NotationEvent.enter(6)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=8&update=<?= $_SESSION['rating'] ?>" id="star_8" class="text-decoration-none">
                        <span><i class="far fa-star note_8" onmouseenter="NotationEvent.enter(7)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=9&update=<?= $_SESSION['rating'] ?>" id="star_9" class="text-decoration-none">
                        <span><i class="far fa-star note_9" onmouseenter="NotationEvent.enter(8)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <a href="Episode&id=<?= $_GET["id"] ?>&note=10&update=<?= $_SESSION['rating'] ?>" id="star_10" class="text-decoration-none">
                        <span><i class="far fa-star note_10" onmouseenter="NotationEvent.enter(9)" onmouseleave="NotationEvent.leave()"></i></span>
                    </a>
                    <?php }else{ echo "Veuillez vous connecter pour noter ce tome"; }?>
                </div>
                <!--===============================================================================================-->
            </div>
        </div>

    </div>
    <hr>
    <!--===============================================================================================-->
    <div class="w-100 p-2 d-flex justify-content-between align-items-center lienEpisode">
        <i class="fas fa-hand-point-right"></i>
        <h5 class="p-1"><a href="<?= $episode->url_video() ?>" class="text-center">Lien de la video</a></h5>
        <i class="fas fa-hand-point-left"></i>
    </div>
<!--===============================================================================================-->
    <hr>
    <?php endforeach?>
    <h2 class="display-4">Commentaire</h2>
    <hr>
    <!--===============================================================================================-->
    <?php foreach ($comments as $comment):?>
    <div class="row d-flex card-body">
        <div class="col-12 d-flex m-auto align-item-center">
            <h5 class="mr-3 "><?= htmlspecialchars($comment->pseudo()) ?></h5>
            <p><?= $comment->comment_date() ?></p>
        </div>
        <div class="col-11 card-body">
            <p><?= htmlspecialchars($comment->content()) ?></p>
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
<script src="public/Javascript/Notation.js"></script>