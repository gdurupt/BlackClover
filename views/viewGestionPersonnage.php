<section class="container mt-5 mb-5 p-5 gestionManga">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Gestion des Personnages</h2>
    <hr>
    <div class="row d-flex mb-5">
        <div class="btn-toolbar col-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group-vertical mr-2" role="group" aria-label="First group" id="buttonDivManga">
                <button type="button" class="btn" onclick="EventGestionPersonnage.EventClick(0)">Ajouter</button>
                <?php foreach ($personnages as $personnage):?>
                <button type="button" class="btn" onclick="EventGestionPersonnage.EventClick(<?= $personnage->id() ?>)"><?= $personnage->title() ?></button>
                <?php endforeach?>
            </div>
        </div>
        <div class="flex-column justify-content-center text-center col-9 mt-3" id="personnageNew">
            <form action="GestionManga" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Post" value="NewPersonnage" />
                <input class="my-4 text-center form-control" type="text" name="title" value="" require />

                <figure class="img-fluid">
                    <img src="public/images/personnage/imageexemple.jpg" alt="image">
                    <figcaption>Image d'exemple oublier pas d'en ajouter une !</figcaption>
                </figure>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="my-1">
                        <div class="input-group input-file">
                            <span class="input-group-btn">
                                <input class="btn btn-default btn-choose browe" type="file" name="file" require />
                            </span>
                        </div>
                    </div>

                    <textarea class="form-control my-3" name="content" rows="6" require></textarea>
                </div>
                <div class="d-flex justify-content-around mt-3">
                    <input class="btn btn-success validation" type="submit" value="Ajouter comme nouveau personnage">
                </div>
            </form>

        </div>
        <?php foreach ($personnages as $personnage):?>
        <div class="buttonPersonnage flex-column justify-content-center text-center col-8 mt-3" id="personnage<?= $personnage->id() ?>" style="display:none;">
            <form action="GestionManga" method="post" enctype="multipart/form-data">
                <input type="hidden" name="Post" value="UpdatePersonnage" />
                <input type="hidden" name="id" value="<?= $personnage->id() ?>" />
                <input type="hidden" name="lastFileName" value="<?= $personnage->image() ?>" />
                <input class="my-4 text-center form-control" type="text" name="title" value="<?= $personnage->title() ?>" />

                <figure class="img-fluid">
                    <img src="public/images/personnage/<?= $personnage->image() ?>" alt="">
                    <figcaption>Image du tome selectionné</figcaption>
                </figure>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="my-1">
                        <div class="input-group input-file">
                            <span class="input-group-btn">
                                <input class="btn btn-default btn-choose browe" type="file" name="file">
                            </span>
                        </div>
                    </div>

                    <textarea class="form-control my-3" name="content" rows="6"><?= $personnage->content() ?></textarea>
                </div>
                <div class="d-flex justify-content-around">
                    <input class="btn btn-success validation m-3" type="submit" value="Modifier">
                </div>
            </form>
            <div class="d-flex justify-content-around m-3">
                <form action="GestionManga" method="post">
                    <input type="hidden" name="Post" value="DeletePersonnage" />
                    <input type="hidden" name="id" value="<?= $personnage->id() ?>" />
                    <input type="hidden" name="lastFileName" value="<?= $personnage->image() ?>" />
                    <input class="btn btn-danger delete" type="submit" value="Supprimer">
                </form>
            </div>

        </div>
        <?php endforeach?>
    </div>
    <!--===============================================================================================-->
</section>
<script src="public/Javascript/EventGestionPersonnage.js"></script>