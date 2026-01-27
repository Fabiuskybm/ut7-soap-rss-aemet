
import { getModulesDom } from "./dom.js";
import { createModulesState } from "./state.js";

import { 
	getDepartamentos, 
	getNomenclaturas, 
	getModulo 
} from "./api.js";

import { 
	groupByDepartment, 
	renderDepartments, 
	renderModuleDetail, 
	renderStaticIcons 
} from "./render.js";



// ================================
// |  Init + lógica (Módulos FP)  |
// ================================
// Orquestador de la vista de Módulos.
// Coordina DOM, estado, render y API.


export async function initModules() {

	const ui = getModulesDom();

	if (!ui.ok) {
		if (ui.error) {
			const status = document.querySelector("[data-modules-status]");
			if (status) status.textContent = ui.error;
		}
		return;
	}

	const { dom, tpl } = ui;
    renderStaticIcons(dom);
	const { setView } = createModulesState(dom);


	// Guardamos departamentos aunque no los usemos aún (para cumplir enunciado)
	let departamentosCache = [];


	// =============
	// |  Eventos  |
	// =============

	dom.departments.addEventListener("click", async (e) => {

		// Toggle accordion (departamentos)
		const deptTrigger = e.target.closest("[data-department-trigger]");

		if (deptTrigger) {
			const dept = deptTrigger.closest(".modules__department");
			if (!dept) return;

			dept.classList.toggle("is-open");
			return;
		}


		const btn = e.target.closest("[data-module-btn]");
		if (!btn) return;

		const id = Number(btn.dataset.moduleId || 0);
		if (!id) return;

		dom.departments
			.querySelectorAll(".modules__module-btn.is-active")
			.forEach(el => el.classList.remove("is-active"));

		btn.classList.add("is-active");

		try {
			let loadingTimer = setTimeout(() => {
				setView("loadingDetail", { message: "Cargando detalle..." });
			}, 200);

			const data = await getModulo(id);
			clearTimeout(loadingTimer);

			if (!data.ok) {
				btn.classList.remove("is-active");

				setView("error", {
					message: data.error || "Error al cargar el módulo",
					errorFallback: "empty",
				});
				return;
			}

			renderModuleDetail(data.data, dom, tpl);
			setView("detail");
			
		} catch (err) {
			btn.classList.remove("is-active");

			setView("error", {
				message: "Error de conexión",
				errorFallback: "empty",
			});
		}
	});

	dom.close.addEventListener("click", () => {
		const activeBtn = dom.departments.querySelector(".modules__module-btn.is-active");
		if (activeBtn) activeBtn.classList.remove("is-active");
		setView("empty");
	});


	// ==========
	// |  Init  |
	// ==========

	try {
		setView("loadingList", { message: "Cargando módulos..." });

		const [deps, nom] = await Promise.all([
			getDepartamentos(),
			getNomenclaturas(),
		]);

		if (deps?.ok) {
			departamentosCache = deps.data || [];
		}

		if (!nom?.ok) {
			setView("error", {
				message: nom?.error || "Error al cargar nomenclaturas",
				errorFallback: "empty",
			});
			return;
		}

		const grouped = groupByDepartment(nom.data || []);
		renderDepartments(grouped, dom, tpl);

		setView("empty");

	} catch (err) {
		setView("error", {
			message: "Error de conexión",
			errorFallback: "empty",
		});
	}
}