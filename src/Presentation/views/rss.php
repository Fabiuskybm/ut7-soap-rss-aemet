

<section class="rss">
    <header class="rss__header">
        <div class="rss__header-left">
            <h1 class="rss__title">Noticias RSS</h1>
            <p class="rss__lead">Noticias de EuropaPress actualizadas en tiempo real</p>
        </div>

        <div class="rss__header-right">
            <span class="rss__updated" data-rss-updated></span>
            <button class="btn btn--primary" type="button" data-rss-refresh>Actualizar</button>
        </div>
    </header>

    <p class="rss__status" data-rss-status>Listo para cargar noticias.</p>

    <section class="rss__source card">
        <div class="rss__source-icon" aria-hidden="true">RSS</div>
        <div class="rss__source-body">
            <h2 class="rss__source-title">Canal RSS EuropaPress</h2>
            <p class="rss__source-url">https://www.europapress.es/rss/rss.aspx?ch=00066</p>
        </div>
        <a class="btn btn--secondary" href="https://www.europapress.es/rss/rss.aspx?ch=00066" target="_blank" rel="noopener noreferrer">Ver RSS</a>
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