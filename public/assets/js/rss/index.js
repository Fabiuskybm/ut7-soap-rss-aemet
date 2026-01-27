
import { dom } from './dom.js';
import { fetchRss } from './api.js';
import { renderItems } from './render.js';



export async function initRss() {
    if (!dom.status || !dom.content) return;

    const load = async () => {
        dom.status.textContent = 'Cargando noticias...';
        dom.content.innerHTML = '';

        try {
            const data = await fetchRss('europapress');

            dom.status.textContent = '';
            renderItems(dom.content, data.items);

            if (dom.count) dom.count.textContent = `${data.items?.length ?? 0} noticias`;
            if (dom.updated) dom.updated.textContent = `Actualizado: ${new Date().toLocaleString('es-ES')}`;
            
        } catch (err) {
            dom.status.textContent = 'Error cargando RSS.';
            dom.content.innerHTML = `<p>${String(err?.message || err)}</p>`;
            if (dom.count) dom.count.textContent = '';
        }
    };

    if (dom.refresh) dom.refresh.addEventListener('click', load);

    await load();
}