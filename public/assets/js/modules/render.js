
import { ICONS } from "./icons.js";


// ==================
// |  Render (DOM)  |
// ==================
// Funciones de renderizado de la vista de Módulos.
// Pinta la lista, el detalle y los iconos SVG.



/**
 * Agrupa items por departamento.
 * Devuelve un objeto: { "Dept A": [...], "Dept B": [...] }
 */
export function groupByDepartment(items) {
	const map = {};

	for (const it of items) {
		const dept = it?.departamento ?? "Sin departamento";
		(map[dept] ??= []).push(it);
	}

	return map;
}


/**
* Pinta iconos "fijos" de la vista (no dependen de datos).
* Llama a esto 1 vez al iniciar la vista.
*/
export function renderStaticIcons(dom) {

    const panelIcon = document.querySelector(".modules__panel--list .modules__panel-icon");
    if (panelIcon) panelIcon.innerHTML = ICONS.mortarBoard;

    if (dom?.close) dom.close.innerHTML = ICONS.close;
}



/**
 * Renderiza la lista de departamentos + módulos (columna izquierda).
 */
export function renderDepartments(grouped, dom, tpl) {

	const { departments } = dom;
	const { department: tplDepartment, item: tplItem } = tpl;

	departments.innerHTML = "";

	for (const [deptName, items] of Object.entries(grouped)) {

		// Orden opcional: curso asc, nomenclatura asc
		items.sort((a, b) => {
			const ca = Number(a?.curso ?? 0);
			const cb = Number(b?.curso ?? 0);

			if (ca !== cb) {
				return ca - cb;
			}

			return String(a?.nomenclatura_modulo ?? "")
				.localeCompare(String(b?.nomenclatura_modulo ?? ""));
		});

		const deptNode = tplDepartment.content.cloneNode(true);

		const $deptLabel = deptNode.querySelector("[data-department-name]");
		const $deptCount = deptNode.querySelector("[data-department-count]");
		const $list = deptNode.querySelector("[data-department-list]");

        const $chevron = deptNode.querySelector(".modules__chevron");
        if ($chevron) $chevron.innerHTML = ICONS.arrowRight;

		$deptLabel.textContent = deptName;

		$deptCount.textContent =
			`${items.length} módulo${items.length === 1 ? "" : "s"}`;

		for (const it of items) {
			const itemNode = tplItem.content.cloneNode(true);

			const $btn = itemNode.querySelector("[data-module-btn]");
			const $code = itemNode.querySelector("[data-module-code]");
			const $course = itemNode.querySelector("[data-module-course]");

            const $modIcon = itemNode.querySelector(".modules__module-icon");
            if ($modIcon) $modIcon.innerHTML = ICONS.book;

            const $arrow = itemNode.querySelector(".modules__module-arrow");
            if ($arrow) $arrow.innerHTML = ICONS.arrowRight;

			$code.textContent = String(it?.nomenclatura_modulo ?? "—");
			$course.textContent = `- Curso ${it?.curso ?? "—"}º`;

			$btn.dataset.moduleId = String(it?.id ?? "");

			$list.appendChild(itemNode);
		}

		departments.appendChild(deptNode);
	}
}


/**
 * Renderiza la tarjeta de detalle (columna derecha).
 * Nota: NO decide visibilidad (eso es state.js).
 */
export function renderModuleDetail(mod, dom, tpl) {

	const { name, meta } = dom;
	const { metaRow: tplMetaRow } = tpl;

	name.textContent =
		mod?.nomenclatura_modulo ?? "Detalle del módulo";

	meta.innerHTML = "";

	addMetaRow("Curso escolar", mod?.curso_escolar, meta, tplMetaRow);
	addMetaRow("Departamento", mod?.departamento, meta, tplMetaRow);
	addMetaRow("Nivel", mod?.nivel, meta, tplMetaRow);
	addMetaRow("Especialidad", mod?.especialidad, meta, tplMetaRow);
	addMetaRowTwoCol(
		[
		{ label: "Curso", value: mod?.curso ? `${mod.curso}º` : "—" },
		{ label: "Nº Alumnos", value: mod?.numalumnos ?? "—" },
		],
		meta,
		tplMetaRow
	);
}


// ========================
// |  HELPERS (internos)  |
// ========================

const META_ICON_BY_LABEL = {
    "Curso escolar": ICONS.calendar,
    "Departamento": ICONS.department,
    "Nivel": ICONS.layer,
    "Especialidad": ICONS.specialty,
    "Curso": ICONS.book,
    "Nº Alumnos": ICONS.students,
};

function addMetaRow(label, value, metaEl, tplMetaRow) {
	const node = tplMetaRow.content.cloneNode(true);

	node.querySelector("[data-meta-label]").textContent = label;
	node.querySelector("[data-meta-value]").textContent = value ?? "—";

	const iconEl = node.querySelector(".modules__meta-icon");
	if (iconEl) {
		iconEl.innerHTML = META_ICON_BY_LABEL[label] ?? "";
		if (label === "Nivel") iconEl.classList.add("modules__meta-icon--level");
	}

	metaEl.appendChild(node);
}


function addMetaRowTwoCol(items, metaEl, tplMetaRow) {
	const wrap = document.createElement("div");
	wrap.className = "modules__meta-row--two-col";

	for (const { label, value } of items) {
		const row = tplMetaRow.content.cloneNode(true);

		row.querySelector("[data-meta-label]").textContent = label;
		row.querySelector("[data-meta-value]").textContent = value ?? "—";

		const iconEl = row.querySelector(".modules__meta-icon");
		if (iconEl) {
			iconEl.innerHTML = META_ICON_BY_LABEL[label] ?? "";
			if (label === "Nivel") iconEl.classList.add("modules__meta-icon--level");
		}

		wrap.appendChild(row);
	}

	metaEl.appendChild(wrap);
}