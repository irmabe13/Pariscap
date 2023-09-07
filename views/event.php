<div class='event-card'>
<?php
$eventId = $_GET['idE'];
$lesEvents = getEventsObjects(); ?>
<?php foreach ($lesEvents as $event): ?>
    <?php if ($event->get_id() == $eventId): ?>

        <h2 class='nom-event'>
                <?= $event->get_titre() ?>
            </h2>
        <img class='image-event' src='public/images/events/<?= $event->get_image() ?> '></img>
        <p class='description'>
                <?= $event->get_description(); ?>
        </p>
        <div class='debut-event'>
            <?= $event->get_date_debut() ?>
        </div>
        
        <div class='box-prix'>
            <?= $event->get_prix() ?>
        </div>


    <?php endif; ?>
<?php endforeach; ?>