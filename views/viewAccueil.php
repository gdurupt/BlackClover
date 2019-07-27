<section class="container my-4 pt-2">
    <div class="animationDiv d-flex flex-column justify-content-center align-items-center my-1 text-center w-100">
        <div class="d-sm-none">
            <h2 class="display-5 slide1Titre">Bienvenue sur <strong>BlackClover Wiki</strong></h2>     
        </div>
        <div class="d-none d-sm-flex">
            <h2 class="display-3 slide1Titre">Bienvenue sur <strong>BlackClover Wiki</strong></h2>
        </div>
        <p class="slidePara">Un site pour les fans !</p>
        <div class="d-lg-flex d-none">
            <img class="trefle animation_1" src="public/images/icon/trefleWhite.png" alt="trefle blanc">
            <img class="trefle animation_2" src="public/images/icon/trefleWhite.png" alt="trefle blanc">
            <img class="trefle animation_3" src="public/images/icon/trefleWhite.png" alt="trefle blanc">
            <img class="trefle animation_4" src="public/images/icon/trefleWhite.png" alt="trefle blanc">
        </div>
    </div>
    <hr>

    <div id="api" class="d-flex flex-column justify-content-center align-items-center w-100 my-4 text-center">
        <h2 class="mb-4" id="title"></h2>
        <div class="d-flex justify-content-around align-items-around w-100 my-3">
            <p><strong id="episode"></strong></p>
            <p id="date"></p>
        </div>
        <p class="text-center my-3" id="content"></p>
    </div>
    <hr>
    <?php foreach ($lastPersonnages as $personnage):?>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-12 p-5 img-fluid">
            <img src="public/images/personnage/<?= $personnage->image() ?>" alt="<?= $personnage->title() ?>">
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 p-5 text-center">
            <h2><?= $personnage->title() ?></h2>
            <p><?= $personnage->content() ?></p>
        </div>
    </div>
    <hr>
    <?php endforeach?>
    <?php foreach ($lastMangas as $manga):?>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-12 p-5 img-fluid">
            <img src="public/images/manga/<?= $manga->image() ?>" alt="<?= $manga->title() ?>">
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 p-5 text-center">
            <h2><?= $manga->title() ?></h2>
            <p><?= $manga->text() ?></p>
        </div>
    </div>
    <hr>
    <?php endforeach?>
</section>
<script src="public/Javascript/Ajax.js"></script>
<script src="public/Javascript/Api.js"></script>
