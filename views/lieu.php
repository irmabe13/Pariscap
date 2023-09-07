<div class=monument-card>
    <?php
    $id_lieu = $_GET['idL'];
    $les_transports = getTransportsObject();
    $lesEvents = getEventsObjectsFromLieu($id_lieu);
    $les_lieux = getLieuxObject();
    foreach ($les_lieux as $lieu):
        if ($lieu->get_id() == $id_lieu): ?>
            <h2 class='nom-monument'>
                <?= $lieu->get_nom() ?>
            </h2>
            <img class='image-monument' src='public/images/<?= $lieu->get_image() ?> '></img>
            <p class='description'>
                <?= $lieu->get_description(); ?>
            </p>
            <?php $les_dessertes = getTransports($id_lieu) ?>
            <div class='box-transports'>
                <?php foreach ($les_transports as $transport): ?>
                    <?php if (in_array($transport->get_id(), $les_dessertes)): ?>
                        <div class='transports'>
                            <img class='logo-ratp' src='public/images/transports/<?= $transport->get_type() ?>.jpg'>
                            <img class='numero-ligne' src='public/images/transports/ligne_<?= $transport->get_ligne() ?>.jpg'>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php foreach ($lesEvents as $event): ?>
                <br>
                <p> <b> Evenements ici : </p>
                <?= $event->get_titre() ?>
                <a href="?s=event&idE=<?= $event->get_id() ?> "> <input type="submit" value="Detail de l'evenement" /> </a>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</div>