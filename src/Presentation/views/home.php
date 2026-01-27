

<section class="home">
    <!-- Hero -->
    <header class="home__hero">
        <div class="home__badge">
            <span class="home__badge-icon" aria-hidden="true">◆</span>
            <span class="home__badge-text">Servicios y uso de APIs</span>
        </div>

        <h1 class="home__title">Proyecto UT7</h1>

        <p class="home__lead">
            Implementación de servicios SOAP, consumo de feeds RSS y conexión con la API de AEMET
            para obtener datos meteorológicos en tiempo real.
        </p>
    </header>

    <!-- Grid cards -->
    <section class="home__section">
        <h2 class="home__section-title">Selecciona un apartado del proyecto</h2>

        <div class="home__grid">
            <a class="home__card card" href="index.php?view=modules">
                <div class="home__card-icon home__card-icon--soap" aria-hidden="true">
                    <!-- Placeholder (luego lo cambias por el icono definitivo) -->
                    <span class="home__icon">
                        <!-- tu SVG actual -->
                        <svg viewBox="0 0 392.594 392.594" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill="currentColor" d="M392.529,125.113c-0.776-4.202-3.103-7.111-6.982-8.857L200.206,43.594 c-2.521-1.034-5.43-1.034-7.952,0L6.913,116.256c-9.632,3.943-8.792,16.937,0,20.299l62.966,24.63v132.073 c0,4.461,2.78,8.469,6.982,10.15l115.459,45.253c2.651,1.487,5.301,1.487,7.952,0l115.459-45.253 c4.202-1.616,6.982-5.624,6.982-10.15V161.315l48.032-18.877v127.935c0,6.012,4.848,10.925,10.925,10.925 c6.012,0,10.925-4.848,10.925-10.925C392.529,270.309,392.594,125.501,392.529,125.113z M300.796,285.824L196.262,326.81 L91.729,285.824v-116.04l100.59,39.499c2.392,1.099,5.107,0.905,7.952,0l100.525-39.434V285.824z M196.262,187.432L40.787,126.406 l155.475-60.962l155.475,60.962L196.262,187.432z"></path>
                        </svg>
                    </span>
                </div>

                <div class="home__card-head">
                    <h3 class="home__card-title">Módulos FP (SOAP)</h3>
                    <span class="home__card-arrow" aria-hidden="true">→</span>
                </div>

                <p class="home__card-desc">
                    Consulta información de módulos de Formación Profesional mediante servicios SOAP.
                    Incluye departamentos, nomenclaturas y detalles completos.
                </p>

                <div class="home__tags">
                    <span class="home__tag">infoModulo</span>
                    <span class="home__tag">infoDepartamentos</span>
                    <span class="home__tag">infoNomenclaturas</span>
                </div>
            </a>

            <a class="home__card card" href="index.php?view=rss">
                <div class="home__card-icon home__card-icon--rss" aria-hidden="true">
                    <span class="home__icon">
                        <!-- tu SVG actual -->
                        <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill="currentColor" d="M6.286 44A6.286 6.286 0 1 0 6.286 31.428 6.286 6.286 0 0 0 6.286 44ZM44 44h-8.38C35.62 24.358 19.642 8.38.001 8.38V0C24.261 0 44 19.739 44 44Zm-14.666 0h-8.38C20.954 32.447 11.553 23.048 0 23.048v-8.382C16.175 14.666 29.334 27.825 29.334 44Z"></path>
                        </svg>
                    </span>
                </div>

                <div class="home__card-head">
                    <h3 class="home__card-title">Noticias RSS</h3>
                    <span class="home__card-arrow" aria-hidden="true">→</span>
                </div>

                <p class="home__card-desc">
                    Recuperación de noticias diarias de EuropaPress mediante canal RSS.
                    Visualiza titulares, descripciones y enlaces directos.
                </p>

                <div class="home__tags">
                    <span class="home__tag">Feed EuropaPress</span>
                    <span class="home__tag">Noticias diarias</span>
                    <span class="home__tag">Enlaces directos</span>
                </div>
            </a>

            <a class="home__card card" href="index.php?view=aemet">
                <div class="home__card-icon home__card-icon--aemet" aria-hidden="true">
                    <span class="home__icon">
                        <!-- tu SVG actual -->
                        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill="currentColor" d="M621.7 607.4c-85.9 0-155.8-69.9-155.8-155.8s69.9-155.8 155.8-155.8 155.8 69.9 155.8 155.8S707.6 607.4 621.7 607.4z"></path>
                        </svg>
                    </span>
                </div>

                <div class="home__card-head">
                    <h3 class="home__card-title">AEMET - Meteorología</h3>
                    <span class="home__card-arrow" aria-hidden="true">→</span>
                </div>

                <p class="home__card-desc">
                    Accede a datos meteorológicos en tiempo real de la API de AEMET.
                    Mapas de isobaras y predicciones para Canarias.
                </p>

                <div class="home__tags">
                    <span class="home__tag">Mapa Isobaras</span>
                    <span class="home__tag">Predicción Canarias</span>
                    <span class="home__tag">Predicción Gran Canaria</span>
                </div>
            </a>
        </div>
    </section>

    <!-- Info cards -->
    <section class="home__info">
        <div class="home__info-card card">
            <h3 class="home__info-title">Servicios SOAP</h3>
            <p class="home__info-text">
                Comunicación mediante protocolo SOAP para consultar datos de módulos FP desde una base de datos MySQL.
            </p>
        </div>

        <div class="home__info-card card">
            <h3 class="home__info-title">Canal RSS</h3>
            <p class="home__info-text">
                Parseo y visualización de feeds RSS de EuropaPress con noticias actualizadas en tiempo real.
            </p>
        </div>

        <div class="home__info-card card">
            <h3 class="home__info-title">API REST AEMET</h3>
            <p class="home__info-text">
                Conexión con la API OpenData de AEMET para obtener mapas y predicciones meteorológicas.
            </p>
        </div>
    </section>
</section>