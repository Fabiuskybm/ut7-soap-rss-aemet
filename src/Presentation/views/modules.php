

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
            <div class="modules__empty" data-module-empty>
                <span class="modules__empty-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <path d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>

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