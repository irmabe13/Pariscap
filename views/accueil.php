<div class="slider-accueil-container">
    <div class='slider-accueil' id="slider-accueil"> 
        <?php 
        echo(eventsHTML("card-event-accueil")[0]);
        ?>
    </div>
    <div class='radio-btn-container'>
        <?php
        for ($radio_button_index = 0; $radio_button_index < count(eventsHTML("card-event-accueil")); $radio_button_index++) {
            if ($radio_button_index == 0) {
                ?><div class="radio-btn clicked" id="radio-btn-<?php echo($radio_button_index)?>"></div><?php
            }
            else {
                ?><div class="radio-btn unclicked" id="radio-btn-<?php echo($radio_button_index)?>"></div><?php
            }
        }
    ?>
    </div>
</div>