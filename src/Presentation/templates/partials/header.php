

<header class="header">

    <div class="header__inner container">
        
        <div class="header__brand">
            <a class="header__brand-link" href="index.php?view=home">
                <span class="header__brand-mark" aria-hidden="true">UT7</span>

                <span class="header__brand-text">
                    <span class="header__brand-title">Proyecto UT7</span>
                    <span class="header__brand-subtitle">SOAP · RSS · AEMET</span>
                </span>
            </a>
        </div>

        <nav class="header__nav" aria-label="Navegación principal">
            <a
                class="header__nav-link <?= $view === 'home' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=home"
                <?= $view === 'home' ? 'aria-current="page"' : '' ?>
            >
                Inicio
            </a>

            <a
                class="header__nav-link <?= $view === 'modules' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=modules"
                <?= $view === 'modules' ? 'aria-current="page"' : '' ?>
            >
                Módulos FP
            </a>

            <a
                class="header__nav-link <?= $view === 'rss' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=rss"
                <?= $view === 'rss' ? 'aria-current="page"' : '' ?>
            >
                RSS
            </a>

            <a
                class="header__nav-link <?= $view === 'aemet' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=aemet"
                <?= $view === 'aemet' ? 'aria-current="page"' : '' ?>
            >
                AEMET
            </a>
        </nav>

        <div class="header__meta" aria-label="Información del proyecto">
            <span class="header__chip">2º DAW</span>
        </div>
    </div>
</header>