<div class="slider-accueil-container">
    <div class='slider-accueil' id="slider-accueil">
        <?php

        $lesEvents = getEventsObjects(); ?>
        <div class='<?= $class ?>' id='<?= $lesEvents[0]->get_id() ?>'>
            <h2 class='nom-event'>
                <?= $lesEvents[0]->get_titre() ?>
            </h2> <img class='lieu-image' src='public/images/events/<?= $lesEvents[0]->get_image() ?>'>
            <p class='courte-description'>
                <?= $lesEvents[0]->get_courte_description() ?>
            </p>
            <a class='plus' href='?s=event&idE= <?= $lesEvents[0]->get_id() ?>' aria-current='page'>+</a>
        </div>

    </div>
    <div class='radio-btn-container'>
        <?php
        for ($radio_button_index = 0; $radio_button_index < count($lesEvents); $radio_button_index++) {
            if ($radio_button_index == 0) {
                ?>
                <div class="radio-btn clicked" id="radio-btn-<?php echo ($radio_button_index) ?>"></div>
                <?php
            } else {
                ?>
                <div class="radio-btn unclicked" id="radio-btn-<?php echo ($radio_button_index) ?>"></div>
                <?php
            }
        }
        ?>





    </div>
</div>