
// =====================
// |  DOM + Templates  |
// =====================
// Captura y valida nodos del DOM y templates de la vista Módulos.


export function getModulesDom() {

  const dom = {
    departments: document.querySelector("[data-departments]"),
    status: document.querySelector("[data-modules-status]"),
    empty: document.querySelector("[data-module-empty]"),
    card: document.querySelector("[data-module-card]"),
    name: document.querySelector("[data-module-name]"),
    meta: document.querySelector("[data-module-meta]"),
    close: document.querySelector("[data-module-close]"),
  };

  // Templates
  const tpl = {
    department: document.querySelector("#tpl-department"),
    item: document.querySelector("#tpl-module-item"),
    metaRow: document.querySelector("#tpl-meta-row"),
  };

  const missingDom = Object.entries(dom)
    .filter(([, el]) => !el)
    .map(([k]) => k);

  const missingTpl = Object.entries(tpl)
    .filter(([, el]) => !el)
    .map(([k]) => k);

  if (missingDom.length || missingTpl.length) {
    
    const isProbablyModulesView = 
        !!document.querySelector("[data-departments]") || 
        !!document.getElementById("tpl-department");

    return {
      ok: false,
      error: isProbablyModulesView
        ? `Faltan elementos en la vista. DOM: [${missingDom.join(", ")}] TPL: [${missingTpl.join(", ")}]`
        : null,
      dom: null,
      tpl: null,
    };
  }

  return { ok: true, error: null, dom, tpl };
}