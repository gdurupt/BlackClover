<section class="container mt-5 mb-5 p-5">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Personnage</h2>
    <p class="d-flex justify-content-center text-center">Retrouver sur cette page un résumé des personnages de BlackClover</p>
    <hr>
    <!--===============================================================================================-->
    <?php foreach ($personnages as $personnage):?>
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
    <!--===============================================================================================-->
</section>
