<?php foreach ($commentsReport as $nbreport):?>
    <?php $reportComment = $nbreport->nbreport();?>
<?php endforeach?>

<?php foreach ($Allcomments as $nbcomment):?>
    <?php $Allcoment = $nbcomment->nbcomments();?>
<?php endforeach?>

<?php foreach ($mangaCounts as $mangaCount):?>
    <?php $mangaCount = $mangaCount->nbmangas();?>
<?php endforeach?>

<?php foreach ($lastMangas as $lastManga):?>
    <?php $lastManga = $lastManga->title();?>
<?php endforeach?>

<?php foreach ($episodeCounts as $episodeCount):?>
    <?php $episodeCount = $episodeCount->nbEpisodes();?>
<?php endforeach?>

<?php foreach ($lastEpisodes as $lastEpisode):?>
    <?php $lastEpisode = $lastEpisode->title();?>
<?php endforeach?>

<?php foreach ($arcCounts as $arcCount):?>
    <?php $arcCount = $arcCount->nbArcs();?>
<?php endforeach?>

<?php foreach ($lastArcs as $lastArc):?>
    <?php $lastArc = $lastArc->title();?>
<?php endforeach?>

<?php foreach ($UsersCounts as $UsersCount):?>
    <?php $UsersCount = $UsersCount->nbUsers();?>
<?php endforeach?>


<section class="container adminAccueil">
    <div class="row d-flex flex-column justify-content-center align-items-center m-5 p-4 h-100">

        <div class="d-flex align-items-center justify-content-between w-100 mb-5 mt-2">
            <span>
                <i class="fas fa-users-cog"></i>
            </span>
            <h2 class="font-weight-bold display-4">Tableau de bord</h2>
            <span>
                <i class="fas fa-users-cog"></i>
            </span>
        </div>


        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">Nombre de personne inscrites</th>
                    <td><span class="font-weight-bold text-success"><?= $UsersCount ?></span> membres inscrits</td>
                </tr>
                <tr>
                    <th scope="row">Nombre de visite</th>
                    <td>Depuis la creation de BlackClover Wiki il y a eu XXX visite sur votre site web</td>
                </tr>
                <tr>
                    <th scope="row">Nombre de commentaire</th>
                    <td>Il y a <span class="font-weight-bold text-success"><?= $Allcoment ?></span> commentaires sur tous les mangas et animes reunis</td>
                </tr>
                <tr>
                    <th scope="row">Nombre de commentaire signalé</th>
                    <td>Il y a <span class="font-weight-bold text-danger"><?= $reportComment ?></span> commentaires signalés sur tous les mangas et animes reunis</td>
                </tr>
                <tr>
                    <th scope="row">Le dernier manga ajouté</th>
                    <td><span class="font-weight-bold text-success"><?= $lastManga ?></span> est le dernier ajouts fait se qui fait un totale de <span class="font-weight-bold text-success"><?= $mangaCount ?></span> mangas</td>
                </tr>
                <tr>
                    <th scope="row">Le dernier Arc ajouté</th>
                    <td><span class="font-weight-bold text-success"><?= $lastArc ?></span> est le dernier ajout fait se qui fait un totale de <span class="font-weight-bold text-success"><?= $arcCount ?></span> arcs</td>
                </tr>
                <tr>
                    <th scope="row">Le dernier épisode ajouté</th>
                    <td><span class="font-weight-bold text-success"><?= $lastEpisode ?></span> est le dernier ajout fait se qui fait un totale de <span class="font-weight-bold text-success"><?= $episodeCount ?></span> d'épisodes</td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex align-items-center justify-content-between w-100 mt-5 mb-5">
            <span>
                <i class="fas fa-users-cog"></i>
            </span>
            <span>
                <i class="fas fa-users-cog"></i>
            </span>
        </div>
    </div>
</section>
