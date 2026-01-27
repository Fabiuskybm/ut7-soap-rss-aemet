
import { initModules } from "./modules/index.js";


// ==========
// |  Main  |
// ==========
// Punto de entrada de la aplicación.
// Inicializa los módulos JS según la vista actual.


(() => {

	const routes = [
		{ cls: "page--modules", run: () => initModules() },
		{ cls: "page--aemet", run: () => import("./aemet/index.js").then(m => m.initAemet()) },
		{ cls: "page--rss", run: () => import("./rss/index.js").then(m => m.initRss()) },
	];

	const body = document.body;

	for (const r of routes) {
		if (body.classList.contains(r.cls)) r.run();
	}

})();