
// =======================
// |  API (Proxy JSON)  |
// =======================
// Funciones de acceso al proxy PHP para los datos de Módulos.

const API_BASE = "/api/fp.php";
const apiUrl = (params) => `${API_BASE}?${new URLSearchParams(params).toString()}`;


export async function fetchJson(params) {
  const res = await fetch(apiUrl(params), {
    headers: { Accept: "application/json" },
  });

  if (!res.ok) throw new Error(`HTTP ${res.status}`);

  return await res.json();
}


// =============
// |  HELPERS  |
// =============

export const getDepartamentos = () => 
    fetchJson({ action: "departamentos" });

export const getNomenclaturas = () => 
    fetchJson({ action: "nomenclaturas" });

export const getModulo = (id) => 
    fetchJson({ action: "modulo", id: String(id) });