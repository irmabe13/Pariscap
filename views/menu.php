<div>
    <?php if (isset($_GET['s'])) {
        $current_page = $_GET['s'];
    } else {
        $current_page = "";

    }
    $menu_navigation = ['Accueil', 'Lieux', 'Evenement', 'Contact'];
    ?>


    <div class='navlinks-container'>
        <?php foreach ($menu_navigation as $nav_links):
            if ($current_page == strtolower($nav_links)): ?>
                <a href="?s=<?= strtolower($nav_links) ?>" aria-current='page'><strong>
                        <?= $nav_links ?>
                    </strong></a>
            <?php else: ?>
                <a href="?s=<?= strtolower($nav_links) ?>" aria-current='page'><?= $nav_links ?></a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<a href="?s=search"><img class="searchLogo" src="public/images/logo_recherche.png"></a>