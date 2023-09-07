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

    <?php
            function eng_dat_to_fr_date(string $date): string 
            {
                $array_date = explode("-", $date);

                return $array_date[2] . "-" . $array_date[1] . "-" . $array_date[0];
            }

            assert(eng_dat_to_fr_date('yyyy-mm-jj')) == "jj-mm-yyyy";

        $date_debut = eng_dat_to_fr_date($event->get_date_debut());
        $date_fin = eng_dat_to_fr_date($event->get_date_fin());
        ?>
    <div class='date-event'>
        <strong> DU <?= $date_debut ?> AU <?= $date_fin ?> </strong>
    </div>

    <div class='box-prix'>
        <p>
            <strong> <?= $event->get_prix() ?> € </strong>
        </p>
    </div>



    <?php endif; ?>
    <?php endforeach; ?>