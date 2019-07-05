<section class="container mt-5 mb-5 p-5">
    <h2 class="d-flex justify-content-center">Listes des épisodes</h2>
    <hr>
    <p class="d-flex justify-content-center text-center">Dans un monde régi par la magie, Yuno et Asta ont grandi ensemble avec un seul but en tête : devenir le prochain Empereur-Mage du royaume de Clover. Mais si le premier est naturellement doué, le deuxième, quant à lui, ne sait pas manipuler la magie. C'est ainsi que lors de la cérémonie d'attribution de leur grimoire, Yuno reçoit le légendaire grimoire au trèfle à quatre feuilles tandis qu'Asta, lui, repart bredouille. Or, plus tard, un ancien et mystérieux ouvrage noir décoré d'un trèfle à cinq feuilles surgit devant lui ! Un grimoire d’anti-magie…</p>
    <hr>
    <!-- ---------------------------------------------------------------------------------------- -->


    <?php foreach ($arcs as $arc):?>
    <div class="mt-1 row episode">
        <div class="w-100 p-2 d-flex justify-content-between align-items-center">
            <i class="fas fa-hand-point-right"></i>
            <h5 id="arc_<?= $arc->id() ?>" class="p-1" onclick="EventEpisode.EventFirstClick(<?= $arc->id() ?>)"><?= $arc->title() ?></h5>
            <i class="fas fa-hand-point-left"></i>
        </div>
        <!-- ---------------------------------------------------------------------------------------- -->
        <div class="row divEpisode w-100 p-1" id="arc_<?= $arc->id() ?>_episodes">
            <div class="col-md-12">
                <hr>
                <p class="text-center"><?= $arc->content() ?></p>
                <hr>
            </div>
            <!-- ---------------------------------------------------------------------------------------- -->

            <?php $numberArc = $arc->id(); ?>
            <?php foreach ($episodes as $episode):?>
            
            <?php if($episode->arc_id() == $numberArc){ ?>

            <div class="col-12 mt-1">
                <div class="w-100 p-2 d-flex flex-column align-items-center selectEpisode">
                    <div class="w-100 p-2 d-flex justify-content-between align-items-center">
                        <h5><a href="Episode&id=<?= $episode->id() ?>"><?= $episode->title() ?></a></h5>
                        <p>Notation</p>
                    </div>
                </div>
            </div>
            
            <?php } ?>
            <?php endforeach?>
            <!-- ---------------------------------------------------------------------------------------- -->
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------- -->
    <?php endforeach?>


    <p class="d-flex justify-content-center text-center mt-5">Les liens afin de visualisée les episodes de l'anime vous envois vers un "Site" auquelle il suffit juste de s'incrire afin de voir l'episode sans payement sauf si l'épisode est sortis il y a moins d'une semaine</p>


</section>
<script src="public/Javascript/EventEpisode.js"></script>
