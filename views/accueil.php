<div class="slider_acceuil">
        <?php $lesEvents = getEventsObjects(); ?>
        <div class='events-container'>
                <?php foreach ($lesEvents as $event): ?>
                        <div class='card-event'>
                                <h2 class='nom-event'>
                                        <?= $event->get_titre() ?>
                                </h2>
                                <img class='lieu-image' src="public/images/events/<?= $event->get_image() ?>">
                                <p class="courte-description">
                                        <?= $event->get_courte_description() ?>
                                        <a class='plus' href='?s=event&idE=<?= $event->get_id() ?>' aria-current='page'>+</a>
                                </p>
                        <?php endforeach; ?>

                </div>

        </div>
</div>