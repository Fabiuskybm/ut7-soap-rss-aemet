

<section class="rss">
    <header class="rss__header">
        <div class="rss__header-left">
            <h1 class="rss__title">Noticias RSS</h1>
            <p class="rss__lead">Noticias de EuropaPress actualizadas en tiempo real</p>
        </div>

        <div class="rss__header-right">
            <span class="rss__updated" data-rss-updated></span>

            <button class="btn btn--primary rss__refresh" type="button" data-rss-refresh>
                <span class="rss__refresh-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill="currentColor"
                            d="M12 24c-4.1 0-7.8-2-10-5.4V24H0v-9h9v2H3.3c1.8 3.1 5 5 8.7 5 5.5 0 10-4.5 10-10h2c0 6.6-5.4 12-12 12ZM2 12H0C0 5.4 5.4 0 12 0c4.1 0 7.8 2 10 5.4V0h2v9h-9V7h5.7c-1.8-3.1-5-5-8.7-5C6.5 2 2 6.5 2 12Z"
                        />
                    </svg>
                </span>
                <span>Actualizar</span>
            </button>
        </div>
    </header>

    <p class="rss__status" data-rss-status>Listo para cargar noticias.</p>

    <section class="rss__source card">
        <div class="rss__source-icon" aria-hidden="true">RSS</div>

        <div class="rss__source-body">
            <h2 class="rss__source-title">Canal RSS EuropaPress</h2>
            <p class="rss__source-url">https://www.europapress.es/rss/rss.aspx?ch=00066</p>
        </div>

        <a
        class="btn btn--secondary rss__source-link"
        href="https://www.europapress.es/rss/rss.aspx?ch=00066"
        target="_blank"
        rel="noopener noreferrer"
        >
            <span>Ver RSS</span>
            
            <span class="rss__source-link-icon" aria-hidden="true">
                <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M36.026,20.058l-21.092,0c-1.65,0 -2.989,1.339 -2.989,2.989l0,25.964c0,1.65 1.339,2.989 2.989,2.989l26.024,0c1.65,0 2.989,-1.339 2.989,-2.989l0,-20.953l3.999,0l0,21.948c0,3.308 -2.686,5.994 -5.995,5.995l-28.01,0c-3.309,0 -5.995,-2.687 -5.995,-5.995l0,-27.954c0,-3.309 2.686,-5.995 5.995,-5.995l22.085,0l0,4.001Z"/>
                    <path fill="currentColor"
                        d="M55.925,25.32l-4.005,0l0,-10.481l-27.894,27.893l-2.832,-2.832l27.895,-27.895l-10.484,0l0,-4.005l17.318,0l0.002,0.001l0,17.319Z"/>
                </svg>
            </span>
            
        </a>
    </section>

    <section class="rss__panel card">
        <header class="rss__panel-header">
            <h2 class="rss__panel-title">
                Noticias del día
                <span class="rss__count" data-rss-count></span>
            </h2>
        </header>

        <div class="rss__panel-body">
            <div class="rss__content" data-rss-content></div>
        </div>
    </section>

    <aside class="ui-note" aria-label="Información sobre el canal RSS">

        <div class="ui-note__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none">
                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z"
                    stroke="currentColor" stroke-width="2" />
                <path d="M12 10v6"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                <path d="M12 7h.01"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" />
            </svg>
        </div>

        <div class="ui-note__body">
            <h3 class="ui-note__title">Información sobre el canal RSS</h3>
            <p class="ui-note__text">
                Los datos se obtienen del canal RSS de EuropaPress. La estructura XML incluye campos
                como título, descripción, enlace y fecha de publicación. El parseo se realiza en el
                servidor mediante PHP.
            </p>
        </div>

    </aside>
</section>