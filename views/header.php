<header class="header">
    <nav>
        <a href="?s=accueil"><img class="logo" src="public/images/logo_tour_eiffel.png" alt="Logo de la tour eiffel qui redirige vers la page d'accueil lorsque l'on clique dessus"></a>
        <div class="main-navlinks">
            <button type="button" class="hamburger open" aria-label="Toggle Navigation" aria-expanded="true">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
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
    </nav>
</header>