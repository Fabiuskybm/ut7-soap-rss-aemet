

export async function fetchRss(action = 'europapress') {
    const url = `/api/rss.php?action=${encodeURIComponent(action)}`;

    const res = await fetch(url, { headers: { 'Accept': 'application/json' } });

    let data = null;
    try { data = await res.json(); } catch {}

    if (!res.ok) {
        const msg = data?.error || `Error HTTP ${res.status}`;
        throw new Error(msg);
    }

    if (!data || data.ok !== true) {
        throw new Error(data?.error || 'Respuesta inválida');
    }

    return data;
}