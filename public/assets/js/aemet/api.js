

export async function fetchAemet(action) {

    const url = new URL('/api/aemet.php', window.location.origin);
    url.searchParams.set('action', action);

    const res = await fetch(url, { headers: { Accept: 'application/json' } });
    const data = await res.json().catch(() => null);

    if (!data) {
        throw new Error(`Respuesta no JSON (HTTP ${res.status})`);
    }
    
    if (!res.ok) {
        const msg = data?.error || `Error HTTP ${res.status}`;
        throw new Error(msg);
    }

    if (!data.ok) {
        throw new Error(data?.error || 'Respuesta inválida');
    }

    return data;
}