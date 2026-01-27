
import { dom } from './dom.js';
import { fetchRss } from './api.js';
import { renderItems } from './render.js';


export async function initRss() {
    if (!dom.status || !dom.content) return;

    dom.status.textContent = 'Cargando noticias...';
    dom.content.innerHTML = '';

    try {
        const data = await fetchRss('europapress');
        dom.status.textContent = '';
        renderItems(dom.content, data.items);
    } catch (err) {
        dom.status.textContent = 'Error cargando RSS.';
        dom.content.innerHTML = `<p>${String(err?.message || err)}</p>`;
    }
}