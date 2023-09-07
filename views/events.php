<div class='cards-container'>
    <?php
    $lesEvents = getEventsObjects();
    foreach ($lesEvents as $event): ?>
    <div class='card-lieu'>
        <div class="card-lieu-inner">
            <div class="card-lieu-front">
                <h2 class='nom-event'>
                    <?= $event->get_titre(); ?>
                </h2>
                <img class='lieu-image' src="public/images/events/<?= $event->get_image(); ?>">
                <a class='plus' href='?s=event&idE=<?= $event->get_id() ?>' aria-current='page'>+</a>
            </div>
            <div class="card-lieu-back">
                <p class='courte-description'>
                    <?= $event->get_courte_description(); ?>
                </p>
                <a class='plus' href='?s=event&idE=<?= $event->get_id() ?>' aria-current='page'>+</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>