

<section class="home">
    <!-- Hero -->
    <header class="home__hero">
        <div class="home__badge">
            <span class="home__badge-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path fill="currentColor"
                        d="M12 2C7.58 2 4 3.79 4 6v12c0 2.21 3.58 4 8 4s8-1.79 8-4V6c0-2.21-3.58-4-8-4Zm0 2c3.87 0 6 .98 6 2s-2.13 2-6 2-6-.98-6-2 2.13-2 6-2Zm0 16c-3.87 0-6-.98-6-2v-2.2c1.5 1.02 3.86 1.6 6 1.6s4.5-.58 6-1.6V18c0 1.02-2.13 2-6 2Zm0-6c-3.87 0-6-.98-6-2V9.8c1.5 1.02 3.86 1.6 6 1.6s4.5-.58 6-1.6V12c0 1.02-2.13 2-6 2Z" />
                </svg>
            </span>
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
                    <span class="home__icon">
                        <svg viewBox="0 0 392.594 392.594" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill="currentColor" d="M392.529,125.113c-0.776-4.202-3.103-7.111-6.982-8.857L200.206,43.594 c-2.521-1.034-5.43-1.034-7.952,0L6.913,116.256c-9.632,3.943-8.792,16.937,0,20.299l62.966,24.63v132.073 c0,4.461,2.78,8.469,6.982,10.15l115.459,45.253c2.651,1.487,5.301,1.487,7.952,0l115.459-45.253 c4.202-1.616,6.982-5.624,6.982-10.15V161.315l48.032-18.877v127.935c0,6.012,4.848,10.925,10.925,10.925 c6.012,0,10.925-4.848,10.925-10.925C392.529,270.309,392.594,125.501,392.529,125.113z M300.796,285.824L196.262,326.81 L91.729,285.824v-116.04l100.59,39.499c2.392,1.099,5.107,0.905,7.952,0l100.525-39.434V285.824z M196.262,187.432L40.787,126.406 l155.475-60.962l155.475,60.962L196.262,187.432z"></path>
                        </svg>
                    </span>
                </div>

                <div class="home__card-head">
                    <h3 class="home__card-title">Módulos FP (SOAP)</h3>
                    <span class="home__card-arrow" aria-hidden="true">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>
                    </span>
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
                        <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill="currentColor" d="M6.286 44A6.286 6.286 0 1 0 6.286 31.428 6.286 6.286 0 0 0 6.286 44ZM44 44h-8.38C35.62 24.358 19.642 8.38.001 8.38V0C24.261 0 44 19.739 44 44Zm-14.666 0h-8.38C20.954 32.447 11.553 23.048 0 23.048v-8.382C16.175 14.666 29.334 27.825 29.334 44Z"></path>
                        </svg>
                    </span>
                </div>

                <div class="home__card-head">
                    <h3 class="home__card-title">Noticias RSS</h3>
                    <span class="home__card-arrow" aria-hidden="true">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>
                    </span>
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
                </div>

                <div class="home__card-head">
                    <h3 class="home__card-title">AEMET - Meteorología</h3>
                    <span class="home__card-arrow" aria-hidden="true">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>
                    </span>
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