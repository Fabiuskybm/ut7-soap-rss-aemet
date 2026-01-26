

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
  
</section>