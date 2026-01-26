
import { initModules } from "./modules/index.js";


// ==========
// |  Main  |
// ==========
// Punto de entrada de la aplicación.
// Inicializa los módulos JS según la vista actual.


(() => {
	const body = document.body;

	if (body.classList.contains("page--modules")) { initModules(); }

	if (body.classList.contains("page--aemet")) {
		import("./aemet/index.js").then(m => m.initAemet());
	}
	
})();