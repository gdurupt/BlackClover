<section class="container mt-5 mb-5 p-5">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Manga</h2>
    <p class="d-flex justify-content-center text-center">Black Clover est un shōnen manga écrit et dessiné par Yūki Tabata. Il est prépublié depuis le 16 février 2015 dans le magazine Weekly Shōnen Jump1, puis publié en volumes reliés par l'éditeur japonais Shūeisha. La version française est éditée par Kazé depuis septembre 2016</p>
    <hr>

    <?php foreach ($personnages as $personnage):?>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-4 col-md-6 col-sm-12 p-5 img-fluid">
                <img src="public/images/personnage/<?= $personnage->image() ?>">
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 p-5 text-center">
            <h2><?= $personnage->title() ?></h2>
            <p><?= $personnage->content() ?></p>
        </div>
    </div>
    <hr>
<?php endforeach?>
    <!--===============================================================================================-->
</section>
