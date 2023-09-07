<?php
$eventId = $_GET['idE'];
$lesEvents = getEventsObjects(); ?>
<?php print_r($lesEvents); ?>
<?php foreach ($lesEvents as $event): ?>
    <?php if ($event->get_id() == $eventId): ?>

        <p> Titre de l'evenement :
            <?= $event->get_titre() ?> Description de l'evenement :
            <?= $event->get_description() ?> Prix
            de l'evenement :
            <?= $event->get_prix() ?> Date de début :
            <?= $event->get_date_debut() ?> Date de fin :
            <?= $event->get_date_fin() ?>
        </p>
        <a href="?s=lieu&idL= <?= $event->get_lieu()->get_id() ?>"> <input type="submit" value="Detail du lieu" /> </a>
    <?php endif; ?>
<?php endforeach; ?>