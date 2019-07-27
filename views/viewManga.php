<section class="container mt-5 mb-5 p-5">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Manga</h2>
    <p class="d-flex justify-content-center text-center">Black Clover est un shōnen manga écrit et dessiné par Yūki Tabata. Il est prépublié depuis le 16 février 2015 dans le magazine Weekly Shōnen Jump1, puis publié en volumes reliés par l'éditeur japonais Shūeisha. La version française est éditée par Kazé depuis septembre 2016</p>
    <hr>
    <!--===============================================================================================-->
    <div class="row">
        <?php foreach ($Mangas as $Manga):?>
        <figure class="divManga col-lg-4 col-md-6 col-sm-12 p-5 img-fluid">
            <a href="Tome&id=<?= $Manga->id() ?>">
            <img src="public/images/manga/<?= $Manga->image() ?>" alt="<?= $Manga->title() ?>">
            </a>
        </figure>
        <?php endforeach?>
    </div>   
    <!--===============================================================================================-->
</section>
