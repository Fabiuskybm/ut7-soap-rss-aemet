

<section class="aemet">

  <header class="aemet__header">
    <h2 class="aemet__title">AEMET</h2>
    <p class="aemet__subtitle">Consulta rápida de mapas y predicciones.</p>
  </header>

  <div class="aemet__actions" role="group" aria-label="Acciones AEMET">

    <button class="aemet__btn" type="button" data-aemet-action="isobaras">
      Mapa Isobaras de España
    </button>

    <button class="aemet__btn" type="button" data-aemet-action="canarias">
      Información Canarias
    </button>

    <button class="aemet__btn" type="button" data-aemet-action="grancanaria">
      Información Gran Canaria
    </button>

  </div>

  <section class="aemet__panel" aria-live="polite">
    <p class="aemet__status is-hidden" data-aemet-status></p>
    <div class="aemet__content" data-aemet-content></div>
  </section>

  <section class="ui-note" aria-label="Información sobre la API de AEMET">

    <div class="ui-note__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none">
        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Z"
            stroke="currentColor" stroke-width="2"/>
        <path d="M12 10v6"
            stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        <path d="M12 7h.01"
            stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
      </svg>
    </div>

    <div class="ui-note__body">
      <p class="ui-note__title">Información sobre la API de AEMET</p>
      <p class="ui-note__text">
        Los datos se obtienen de la API OpenData de AEMET. Al tratarse de información actualizada en tiempo real,
        puede darse el caso de que la información no esté disponible momentáneamente por actualización de la base de datos.
      </p>
      <p class="ui-note__text">
        Documentación:
        <a
          class="ui-note__link"
          href="https://opendata.aemet.es/dist/index.html"
          target="_blank"
          rel="noopener noreferrer"
        >
          https://opendata.aemet.es/dist/index.html
        </a>
      </p>
    </div>

  </section>
  
</section>