

export function renderItems(container, items) {

    if (!container) return;

    if (!items?.length) {
        container.innerHTML = `<p>No hay noticias</p>`;
        return;
    }

    container.innerHTML = items.map(it => `
        <article class="rss-card">
            ${it.imageUrl ? `<img class="rss-card__img" src="${escapeHtml(it.imageUrl)}" alt="">` : ''}
            <h3 class="rss-card__title">${escapeHtml(it.title)}</h3>
            ${it.pubDate ? `<p class="rss-card__date">${escapeHtml(it.pubDate)}</p>` : ''}
            ${it.description ? `<p class="rss-card__desc">${escapeHtml(it.description)}</p>` : ''}
            <p class="rss-card__link">
            <a href="${escapeAttr(it.link)}" target="_blank" rel="noopener noreferrer">Abrir noticia</a>
            </p>
        </article>
    `);
}


function escapeHtml(str) {
    return String(str ?? '')
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
}


function escapeAttr(str) {
    return escapeHtml(str).replaceAll('`', '&#096;');
}