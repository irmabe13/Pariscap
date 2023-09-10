<script type="text/javascript">
    <?php
    $php_array_lieux = getLieuxObject();
    $php_array_events = getEventsObjects();
    $js_array_lieux = json_encode($php_array_lieux);
    $js_array_events = json_encode($php_array_events);
    echo "let lieuArray = " . $js_array_lieux . ";\n";
    echo "let eventsArray = " . $js_array_events . ";\n";
    ?>
</script>
<div class="search-container">
    <input class='search' type='search' id='search-bar' placeholder="Rechercher un lieu">
    <select class="search select-search" id="searchChoice">
        <option value="lieu">Lieu</option>
        <option value="event">Evenement</option>
        <option value="all">Tous</option>

    </select>
</div>
<div class="cards-container" id="cards-container"></div>