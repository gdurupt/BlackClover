<section class="container mt-5 mb-5 p-5 gestionManga">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Modération des commentaires</h2>
    <hr>
    <div class="row my-5">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <button type="button" class="btn w-75" onclick="">Mangas</button>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">
                <button type="button" class="btn w-75" onclick="">Anime</button>
            </div>
    </div>
    <hr>
    <div class="row my-5 d-flex flex-column justify-content-center align-items-center">
    <?php foreach ($arcs as $arc):?>
        <h5><?= $arc->title() ?></h5>
    <div class="my-5 d-flex justify-content-center align-items-center">
        
    </div>
    <hr>
    <?php endforeach?> 
    </div>
    <!--===============================================================================================-->
</section>
<!--<script src="public/Javascript/EventGestionManga.js"></script>-->