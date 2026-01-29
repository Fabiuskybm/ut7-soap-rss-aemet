

export function renderItems(container, items) {
    if (!container) return;

    if (!items?.length) {
        container.innerHTML = `<p>No hay noticias</p>`;
        return;
    }

    container.innerHTML = items.map(it => `
        <article class="rss-card">
            <div class="rss-card__media ${it.imageUrl ? '' : 'rss-card__media--empty'}" aria-hidden="true">
                ${it.imageUrl ? `<img class="rss-card__img" src="${escapeHtml(it.imageUrl)}" alt="">` : ''}
            </div>

            <div class="rss-card__body">
                <h3 class="rss-card__title">${escapeHtml(it.title)}</h3>
                ${it.pubDate ? `<p class="rss-card__date">${escapeHtml(it.pubDate)}</p>` : ''}
                ${it.description ? `<p class="rss-card__desc">${escapeHtml(it.description)}</p>` : ''}
            </div>

            <p class="rss-card__link">
                <a class="rss-card__btn" href="${escapeAttr(it.link)}" target="_blank" rel="noopener noreferrer">
                    <span>Ver</span>
                    
                    <span class="rss-card__btn-icon" aria-hidden="true">
                        <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor"
                            d="M36.026,20.058l-21.092,0c-1.65,0 -2.989,1.339 -2.989,2.989l0,25.964c0,1.65 1.339,2.989 2.989,2.989l26.024,0c1.65,0 2.989,-1.339 2.989,-2.989l0,-20.953l3.999,0l0,21.948c0,3.308 -2.686,5.994 -5.995,5.995l-28.01,0c-3.309,0 -5.995,-2.687 -5.995,-5.995l0,-27.954c0,-3.309 2.686,-5.995 5.995,-5.995l22.085,0l0,4.001Z"/>
                            <path fill="currentColor"
                            d="M55.925,25.32l-4.005,0l0,-10.481l-27.894,27.893l-2.832,-2.832l27.895,-27.895l-10.484,0l0,-4.005l17.318,0l0.002,0.001l0,17.319Z"/>
                        </svg>
                    </span>
                </a>
            </p>
        </article>
    `).join('');
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