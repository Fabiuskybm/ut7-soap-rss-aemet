
import { getAemetDom } from "./dom.js";
import { fetchAemet } from "./api.js";
import { setStatus, clearContent } from "./state.js";
import { renderAemet } from "./render.js";



export function initAemet() {
    const res = getAemetDom();
    if (!res.ok) return;

    const { dom } = res;

    dom.root.addEventListener("click", async (e) => {
        const btn = e.target.closest("[data-aemet-action]");
        if (!btn) return;

        const action = btn.dataset.aemetAction;
        if (!action) return;

        dom.buttons.forEach((b) => (b.disabled = true));

        clearContent(dom);
        setStatus(dom, { text: "Cargando...", visible: true, type: "info" });

        try {
            const data = await fetchAemet(action);
            setStatus(dom, { visible: false });
            renderAemet(dom, data);

        } catch (err) {
            setStatus(dom, {
            text: err?.message || "Error",
            type: "error",
            visible: true,
            });
            
        } finally {
            dom.buttons.forEach((b) => (b.disabled = false));
        }
    });
}