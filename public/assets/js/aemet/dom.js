
export const $ = (sel, root = document) => root.querySelector(sel);


export function getAemetDom() {
    const root = $(".aemet");
    if (!root) return { ok: false, error: "No se encontró .aemet" };

    const status = $("[data-aemet-status]", root);
    const content = $("[data-aemet-content]", root);
    const buttons = root.querySelectorAll("[data-aemet-action]");

    if (!status || !content) {
    return { ok: false, error: "DOM AEMET incompleto (faltan data-aemet-*)" };
    }

    return { ok: true, dom: { root, status, content, buttons } };
}