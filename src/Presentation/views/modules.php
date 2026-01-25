
<section class="modules">

	<header class="modules__header">
		<h2 class="modules__title">Módulos FP (SOAP)</h2>

		<p class="modules__subtitle">
			Consulta los departamentos y módulos disponibles
		</p>
	</header>

	<div class="modules__grid">

		<!-- ======================= -->
		<!-- |  Columna izquierda  | -->
		<!-- ======================= -->

		<section
			class="modules__panel modules__panel--list"
			aria-labelledby="modules-list-title">
			
			<h3
				class="modules__panel-title"
				id="modules-list-title">
				<span
					class="modules__panel-icon"
					aria-hidden="true">
				</span>

				Departamentos y Módulos
			</h3>

			<p
				class="modules__status"
				data-modules-status>
				Cargando...
			</p>

			<div
				class="modules__accordion"
				data-departments>
				<!-- JS inyecta aquí los departamentos -->
			</div>
		</section>


		<!-- ===================== -->
		<!-- |  Columna derecha  | -->
		<!-- ===================== -->

		<aside
			class="modules__panel modules__panel--detail"
			aria-labelledby="modules-detail-title">

			<div
				class="modules__detail"
				data-module-detail>


				<!-- Estado vacío -->
				<div
					class="modules__empty"
					data-module-empty>

					<div
						class="modules__empty-icon"
						aria-hidden="true">
					</div>

					<p class="modules__empty-title">
						Selecciona un módulo
					</p>

					<p class="modules__empty-text">
						Haz clic en cualquier módulo de la lista para ver su información completa
					</p>
				</div>

				<!-- Tarjeta detalle -->
				<div
					class="modules__card is-hidden"
					data-module-card>

					<div class="modules__card-header">
						<h3
							class="modules__card-title"
							data-module-name>
							—
						</h3>

						<button
							class="modules__card-close"
							type="button"
							data-module-close
							aria-label="Cerrar">
						</button>
					</div>

					<dl
						class="modules__meta"
						data-module-meta>
						<!-- JS inyecta aquí los campos del módulo -->
					</dl>
				</div>
			</div>
		</aside>
	</div>


	<!-- ============================= -->
	<!-- |  Templates reutilizables  | -->
	<!-- ============================= -->

	<!-- Departamento (acordeón) -->
	<template id="tpl-department">
		<details
			class="modules__department"
			data-department
		>
			<summary class="modules__department-summary">
				<span
					class="modules__chevron"
					aria-hidden="true">
				</span>

				<span
					class="modules__department-name"
					data-department-name>
				</span>

				<span
					class="modules__badge"
					data-department-count>
				</span>
			</summary>

			<ul
				class="modules__module-list"
				data-department-list
			>
				<!-- Items de módulos -->
			</ul>
		</details>
	</template>

	<!-- Item módulo -->
	<template id="tpl-module-item">
		<li class="modules__module-item">
			<button
				class="modules__module-btn"
				type="button"
				data-module-btn>

				<span
					class="modules__module-icon"
					aria-hidden="true">
				</span>

				<span
					class="modules__module-code"
					data-module-code>
        		</span>

				<span
					class="modules__module-course"
					data-module-course>
        		</span>

				<span
					class="modules__module-arrow"
					aria-hidden="true">
				</span>
			</button>
		</li>
	</template>

	<!-- Fila de metadato -->
	<template id="tpl-meta-row">
		<div class="modules__meta-row">
			<dt class="modules__meta-label">
				<span
					class="modules__meta-icon"
					aria-hidden="true">
				</span>

				<span data-meta-label></span>
			</dt>

			<dd
				class="modules__meta-value"
				data-meta-value>
      </dd>
		</div>
	</template>
</section>