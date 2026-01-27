
import { getAemetDom } from "./dom.js";
import { fetchAemet } from "./api.js";
import { setStatus, clearContent } from "./state.js";
import { renderAemet } from "./render.js";


export function initAemet() {

    const res = getAemetDom();
    if (!res.ok) return;

    const {  dom } = res;

    dom.buttons.forEach((btn) => {

        btn.addEventListener('click', async () => {

            const action = btn.dataset.aemetAction;

            clearContent(dom);
            setStatus(dom, { text: 'Cargando...', visible: true });

            try {
                const data = await fetchAemet(action);
                setStatus(dom, { visible: false });
                renderAemet(dom, data);

            } catch (e) {
                setStatus(dom, { 
                    text: e.message || 'Error', 
                    type: 'error', 
                    visible: true 
                });
            }

        });
    });
}