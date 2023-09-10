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
            <img class='image-monument' src='public/images/<?= $lieu->get_image() ?>'></img>
            <div class="description-container">
                <p class='description'>
                    <?= $lieu->get_description(); ?>
                </p>
            </div>
            <?php $les_dessertes = getTransports($id_lieu) ?>
            <div class='box-transports'>
                <table>
                <?php foreach ($les_transports as $transport):
                    if (in_array($transport->get_id(), $les_dessertes)): 
                        $logo_type = ["metro" => "round", "rer" => "round", "bus" => "rectangle"][$transport->get_type()]; ?>
                        <div class='transports'>
                            <img class='logo-ratp' src='public/images/transports/<?= $transport->get_type() ?>.jpg'>
                            <img class='numero-ligne-<?php echo($logo_type)?>' src='public/images/transports/ligne_<?= $transport->get_ligne() ?>.html'>
                            <p><?php echo($transport->get_arret()) ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                </table>
            </div>
            <?php foreach ($lesEvents as $event): ?>
                <br>
                <p> Evenements ici : </p>
                <?= $event->get_titre() ?>
                <a href="?s=event&idE=<?= $event->get_id() ?> "> <input type="submit" value="Detail de l'evenement" /> </a>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</div>