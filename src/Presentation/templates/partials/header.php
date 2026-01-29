

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
                <span class="header__nav-icon" aria-hidden="true">
                    <svg
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M3 10.5L12 3l9 7.5" />
                            <path d="M5 9.5V21h14V9.5" />
                            <path d="M10 21v-6h4v6" />
                        </g>
                    </svg>
                </span>

                <span class="header__nav-text">Inicio</span>
            </a>

            <a
                class="header__nav-link <?= $view === 'modules' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=modules"
                <?= $view === 'modules' ? 'aria-current="page"' : '' ?>
            >
                <span class="header__nav-icon" aria-hidden="true">
                    <svg viewBox="0 0 392.594 392.594" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path fill="currentColor" d="M392.529,125.113c-0.776-4.202-3.103-7.111-6.982-8.857L200.206,43.594 c-2.521-1.034-5.43-1.034-7.952,0L6.913,116.256c-9.632,3.943-8.792,16.937,0,20.299l62.966,24.63v132.073 c0,4.461,2.78,8.469,6.982,10.15l115.459,45.253c2.651,1.487,5.301,1.487,7.952,0l115.459-45.253 c4.202-1.616,6.982-5.624,6.982-10.15V161.315l48.032-18.877v127.935c0,6.012,4.848,10.925,10.925,10.925 c6.012,0,10.925-4.848,10.925-10.925C392.529,270.309,392.594,125.501,392.529,125.113z M300.796,285.824L196.262,326.81 L91.729,285.824v-116.04l100.59,39.499c2.392,1.099,5.107,0.905,7.952,0l100.525-39.434V285.824z M196.262,187.432L40.787,126.406 l155.475-60.962l155.475,60.962L196.262,187.432z"></path>
                    </svg>
                </span>
                
                <span class="header__nav-text">Módulos FP</span>
            </a>

            <a
                class="header__nav-link <?= $view === 'rss' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=rss"
                <?= $view === 'rss' ? 'aria-current="page"' : '' ?>
            >
                <span class="header__nav-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="6" cy="18" r="2" fill="currentColor" />
                        <path
                            fill="currentColor"
                            d="M4 4v3a13 13 0 0 1 13 13h3A16 16 0 0 0 4 4z"
                        />
                        <path
                            fill="currentColor"
                            d="M4 10v3a7 7 0 0 1 7 7h3A10 10 0 0 0 4 10z"
                        />
                    </svg>
                </span>
                
                <span class="header__nav-text">RSS</span>
            </a>

            <a
                class="header__nav-link <?= $view === 'aemet' ? 'header__nav-link--active' : '' ?>"
                href="index.php?view=aemet"
                <?= $view === 'aemet' ? 'aria-current="page"' : '' ?>
            >
                <span class="header__nav-icon" aria-hidden="true">
                    <svg
                        viewBox="0 -8.5 64 64"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        >
                        <g fill="none" fill-rule="evenodd">
                            <g
                            transform="translate(1 0)"
                            stroke="currentColor"
                            stroke-width="4"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            >
                                <g transform="translate(0 10)">
                                    <path d="M13.7,8.9 C16.6,3.6 22.3,0 28.8,0 C38.3,0 46,7.6 46,17.1 C46,18.4 45.8,19.7 45.6,20.9" />
                                    <path d="M46.4,14.5 C47.5,14.1 48.7,14 49.9,14 C56,14 61,18.9 61,25 C61,31.1 56,36 49.9,36 L12.6,36 C5.1,36 0,29.9 0,22.5 C0,15 5.1,9 12.6,9 C16.1,9 19.3,10.3 21.7,12.4" />
                                </g>

                                <path d="M36.2,11 C38.2,8.6 41.3,7 44.7,7 C50.8,7 55.7,11.9 55.7,18 C55.7,20.2 55,22.3 53.9,24" />
                                <path d="M45,0 L45,4" />
                                <path d="M32,5.3 L34.8,8.1" />
                                <path d="M63,18 L58.2,18" />
                                <path d="M57.5,5.3 L54.6,8.1" />
                            </g>
                        </g>
                    </svg>
                </span>
                
                <span class="header__nav-text">AEMET</span>
            </a>
        </nav>

        <div class="header__meta" aria-label="Información del proyecto">
            <span class="header__chip">2º DAW</span>
        </div>
    </div>
</header>