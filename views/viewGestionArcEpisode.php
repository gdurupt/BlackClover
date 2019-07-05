<section class="container mt-5 mb-5 p-5 gestionManga">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Gestion des Arcs et Episodes</h2>
    <hr>
    <div class="row d-flex mb-5">
        <div class="btn-toolbar col-12" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group-vertical mr-2 col-12" role="group" aria-label="First group" id="buttonDivManga">
                <button type="button" class="btn col-6" onclick="EventGestionManga.EventClick(0)">Nouveau Tome</button>
                <?php foreach ($arcs as $arc):?>
                <button type="button" class="btn col-6" onclick="EventGestionManga.EventClick(<?= $arc->id() ?>)"><?= $arc->title() ?></button>
                <?php endforeach?>
            </div>
        </div>
    </div>
        <!--===============================================================================================-->
</section>
<script src="public/Javascript/EventGestionManga.js"></script>
