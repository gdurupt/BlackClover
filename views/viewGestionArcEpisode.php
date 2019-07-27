<section class="container mt-5 mb-5 p-5 gestionArcEpisode">
    <!--===============================================================================================-->
    <h2 class="d-flex justify-content-center">Gestion des Arcs et Episodes</h2>
    <hr>
    <!--===============================================================================================-->
    <div class="row my-5 flex-column justify-content-center align-items-center">
        <h2 class="text-center">Information</h2>
        <hr>
        <p class="text-center">Tout les Arcs Blackclover se retrouve ici, ils sont triés par ordre croissant avec leur episodes attitré,</p>
        <p class="text-center">Pour ajouté un episode vous devez le faire via l'arc aucune il correspondra.</p>
        <p class="text-center">Tout episode supprimer entraineras la suppressions de tous les commentaires de celui-ci, cela vos aussi pour tout arc supprimer correspondra a la suppression de tout les épisodes de celiui-ci.</p>
        <hr>
    </div>
        <!--===============================================================================================-->
    <div class="row my-5 flex-column justify-content-center align-items-center">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary" onclick="EventGestionArcEpisode.EventChooseArc('newArc')">Nouvelle Arc</button>
                <?php $numberArc = 0; ?>
                <?php foreach ($arcs as $arc):?>
                <?php $numberArc = $numberArc + 1; ?>
                <button type="button" class="btn btn-secondary" onclick="EventGestionArcEpisode.EventChooseArc(<?= $arc->id() ?>)">Arc <?= $numberArc ?></button>
                <?php endforeach?>
            </div>
        </div>
    </div>
        <!--===============================================================================================-->
    <div class="row my-5 justify-content-center align-items-center w-100" id="newArc">
        <form action="GestionArcEpisode" method="post" class="w-100">
            <input type="hidden" name="Post" value="addArc" />
            <div class="col-12 d-flex justify-content-center align-items-center w-100 m-3">
                <input type="text" name="arc" placeholder="Nouvel Arc" required class="ml-2" />
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center w-100 m-3">
                <textarea class="form-control" name="content" placeholder="Veuillez écrire le synopsis" required></textarea>
            </div>
            <div class="col-12 w-100 d-flex justify-content-center align-items-center m-3">
                <input type="submit" value="Nouvel Arc" class="btn btn-success btn mx-4 px-3 ">
            </div>
        </form>
    </div>
    <?php foreach ($arcs as $arc):?>
    <?php $numberArc = $arc->id(); ?>
        <!--===============================================================================================-->
    <div class="gestionAll col-12 row my-5 w-100" id="arc_<?= $arc->id() ?>">
        <div class="btn-toolbar col-3" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group-vertical mr-2" role="group" aria-label="First group">
                <button type="button" class="btn" onclick="EventGestionArcEpisode.EventChooseEpisode('gestionArc',<?= $numberArc ?>)">Gestion Arc</button>
                <?php foreach ($episodesStrings as $episode):?>
                <?php if($numberArc == $episode->arc_id()){ ?>
                <button type="button" class="btn" onclick="EventGestionArcEpisode.EventChooseEpisode(<?= $episode->id() ?>,<?= $numberArc ?>)"><?= $episode->title() ?></button>
                <?php  } ?>
                <?php endforeach?>
                <button type="button" class="btn" onclick="EventGestionArcEpisode.EventChooseEpisode('addEpisode',<?= $numberArc ?>)">Nouvelle épisode</button>

            </div>
        </div>
        <div class="gestionArc col-9 flex-column justify-content-center align-items-center" id="gestionArc<?= $numberArc ?>">
            <form action="GestionArcEpisode" method="post" class="w-100">
                <input type="hidden" name="Post" value="UpdateArc" />
                <div class="w-100 my-4">
                    <input type="text" name="arc" value="<?= $arc->title() ?>" required class="form-control text-center" />
                </div>
                <div class="w-100 my-4">
                    <textarea class="form-control" name="content" required><?= $arc->content() ?></textarea>
                </div>
                <div class="col-12 w-100 d-flex justify-content-center align-items-center my-3">
                    <input type="submit" value="Modifier" class="btn btn-success btn px-3 ">
                </div>
            </form>
            <form action="GestionArcEpisode" method="post" class="col-12 w-100">
                <input type="hidden" name="Post" value="DeleteArc" />
                <input type="hidden" name="id" value="<?= $arc->id() ?>" />
                <div class="col-12 w-100 d-flex justify-content-center align-items-center my-5">
                    <input type="submit" value="Supprimer" class="btn btn-danger btn px-3 ">
                </div>
            </form>
        </div>

        <?php foreach ($episodes as $episode):?>
        <?php if($numberArc == $episode->arc_id()){ ?>
        <div class="episodeliste col-9 flex-column justify-content-center align-items-center" id="episode_<?= $episode->id() ?>">
            <form action="GestionArcEpisode" method="post" class="w-100">
                <input type="hidden" name="Post" value="UpdateEpisode" />
                <input type="hidden" name="id" value="<?= $episode->id() ?>" />
                <div class="w-100 my-4">
                    <input type="text" name="title" value="<?= $episode->title() ?>" required class="form-control text-center" />
                </div>
                <div class=" w-100 my-4">
                    <textarea class="form-control" name="content" required><?= $episode->content() ?></textarea>
                </div>
                <div class="form-group">
                    <select name="manga_id" class="form-control">
                        <option value="0">Image d'exemple</option>
                        <?php foreach ($mangas as $manga):?>
                        <option value="<?= $manga->id() ?>"><?= $manga->title() ?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="w-100 my-4">
                    <input type="text" name="url" value="<?= $episode->url_video() ?>" required class="form-control text-center" />
                </div>
                <div class="col-12 w-100 d-flex justify-content-center align-items-center my-2">
                    <input type="submit" value="Modifier" class="btn btn-success btn px-3 ">
                </div>
            </form>
            <form action="GestionArcEpisode" method="post" class="col-12 w-100">
                <input type="hidden" name="Post" value="DeleteEpisode" />
                <input type="hidden" name="id" value="<?= $episode->id() ?>" />
                <div class="col-12 w-100 d-flex justify-content-center align-items-center mb-3">
                    <input type="submit" value="Supprimer" class="btn btn-danger btn px-3 ">
                </div>
            </form>
        </div>
        <?php  } ?>
        <?php endforeach?>
        <div class="ajoutepisode col-9 justify-content-center align-items-center" id="addEpisode<?= $numberArc ?>">
            <form action="GestionArcEpisode" method="post" class="w-100">
                <input type="hidden" name="Post" value="AddEpisode" />
                <input type="hidden" name="arc_id" value="<?= $arc->id() ?>" />
                <div class="w-100 my-4">
                    <input type="text" name="title" value="Titre" required class="form-control text-center" />
                </div>
                <div class=" w-100 my-4">
                    <textarea class="form-control" name="content" value="" required></textarea>
                </div>
                <div class="form-group">
                    <select name="manga_id" class="form-control">
                        <option value="0">Image d'exemple</option>
                        <?php foreach ($mangas as $manga):?>
                        <option value="<?= $manga->id() ?>"><?= $manga->title() ?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="w-100 my-4">
                    <input type="text" name="url" value="Url" required class="form-control text-center" />
                </div>
                <div class="col-12 w-100 d-flex justify-content-center align-items-center my-2">
                    <input type="submit" value="Ajouter" class="btn btn-success btn px-3 ">
                </div>
            </form>
        </div>
    </div>
    <?php endforeach?>
    <!--===============================================================================================-->
</section>
<script src="public/Javascript/EventGestionArcEpisode.js"></script>
