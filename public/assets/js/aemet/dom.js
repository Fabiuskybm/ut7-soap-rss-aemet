
export const $ = (sel, root = document) => root.querySelector(sel);


export function getAemetDom() {

    const root = $(".aemet");
    const status = $("[data-aemet-status]");
    const content = $("[data-aemet-content]");
    const buttons = root ? root.querySelectorAll("[data-aemet-action]") : [];

    if (!root || !status || !content) {
        return { ok: false, error: "DOM AEMET incompleto (faltan data-aemet-*)" };
    }

    return { ok: true, dom: { root, status, content, buttons } };
}