

<section class="modules">
    <header class="modules__header">
        <h1 class="modules__title">Módulos FP (SOAP)</h1>
        <p class="modules__lead">
            Consulta los departamentos y módulos disponibles mediante servicios SOAP.
        </p>
    </header>

    <p class="modules__status" data-modules-status></p>

    <div class="modules__layout">
        <!-- Columna izquierda -->
        <section class="modules__list card">
            <header class="modules__list-header">
                <h2 class="modules__list-title">Departamentos y módulos</h2>
            </header>

            <div class="modules__list-content" data-departments>
                <!-- JS renderiza aquí departamentos y módulos -->
            </div>
        </section>

        <!-- Columna derecha -->
        <section class="modules__detail card">
            <!-- Empty (se muestra por defecto) -->
            <div class="modules__empty" data-module-empty>
                <h3 class="modules__empty-title">Selecciona un módulo</h3>
                <p class="modules__empty-text">
                    Haz clic en cualquier módulo de la lista para ver su información completa.
                </p>
            </div>

            <!-- Detail card (JS la muestra/oculta con state.js) -->
            <div class="modules__card is-hidden" data-module-card>
                <header class="modules__card-header">
                    <h2 class="modules__card-title" data-module-name>Detalle del módulo</h2>

                    <button class="modules__card-close" type="button" data-module-close aria-label="Cerrar">
                        <!-- icon (JS) -->
                    </button>
                </header>

                <div class="modules__meta" data-module-meta>
                    <!-- JS renderiza aquí las filas meta -->
                </div>
            </div>
        </section>
    </div>

    <!-- ===================== -->
    <!-- Templates requeridos -->
    <!-- ===================== -->

    <template id="tpl-department">
		<section class="modules__department">
			<button class="modules__department-trigger" type="button" data-department-trigger>
			<span class="modules__department-name" data-department-name></span>
			<span class="modules__department-count" data-department-count></span>
			<span class="modules__chevron" aria-hidden="true"></span>
			</button>

			<ul class="modules__department-list" data-department-list></ul>
		</section>
	</template>

    <template id="tpl-module-item">
        <li class="modules__module">
            <button class="modules__module-btn" type="button" data-module-btn>
                <span class="modules__module-icon" aria-hidden="true"></span>

                <span class="modules__module-main">
                    <span class="modules__module-code" data-module-code></span>
                    <span class="modules__module-course" data-module-course></span>
                </span>

                <span class="modules__module-arrow" aria-hidden="true"></span>
            </button>
        </li>
    </template>

    <template id="tpl-meta-row">
        <div class="modules__meta-row">
            <span class="modules__meta-icon" aria-hidden="true"></span>
            <div class="modules__meta-body">
                <dt class="modules__meta-label" data-meta-label></dt>
                <dd class="modules__meta-value" data-meta-value></dd>
            </div>
        </div>
    </template>
</section>