<div class='cards-container' id='cards-container'>
    <?php
    $lesLieux = getLieuxObject();
    foreach ($lesLieux as $lieu): ?>
        <div class='card-lieu'>
            <div class='card-lieu-inner'>
                <div class='card-lieu-front'>
                    <h2 class='nom-lieu'>
                        <?= $lieu->get_nom() ?>
                    </h2>
                    <img class='lieu-image' src='public/images/petit_<?= $lieu->get_image() ?>'>
                    <a class='plus' href='?s=lieu&idL=<?= $lieu->get_id() ?>' aria-current='page'>+</a>
                </div>
                <div class='card-lieu-back'>
                    <p class='courte-description'>
                        <?= $lieu->get_courtedescription() ?>
                    </p>
                    <a class='plus' href='?s=lieu&idL=<?= $lieu->get_id() ?>' aria-current='page'>+</a>
                </div>
            </div>
        </div>
        <br>


    <?php endforeach; ?>
</div>