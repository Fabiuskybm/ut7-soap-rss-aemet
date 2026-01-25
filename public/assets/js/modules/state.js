
// ===========
// |  State  |
// ===========
// Gestión de estados de la UI de Módulos (lista / vacío / detalle / error)
 

export function createModulesState(dom) {

    const { status, empty, card } = dom;


    function showStatus(text) {
        status.textContent = text ?? "";
        status.classList.remove("is-hidden");
    }


    function hideStatus() {
        status.classList.add("is-hidden");
    }


    function showEmpty() {
        empty.classList.remove("is-hidden");
        card.classList.add("is-hidden");
    }


    function showDetail() {
        empty.classList.add("is-hidden");
        card.classList.remove("is-hidden");
    }


    function setView(view, opt = {}) {
        const message = opt.message ?? "";
        const fallback = opt.errorFallback ?? "empty";

        switch (view) {
            case "loadingList":
                showStatus(message || "Cargando módulos...");
                showEmpty();
                break;

            case "empty":
                hideStatus();
                showEmpty();
                break;

            case "loadingDetail":
                showStatus(message || "Cargando detalle...");
                showEmpty();
                break;

            case "detail":
                hideStatus();
                showDetail();
                break;

            case "error":
                showStatus(message || "Ha ocurrido un error");
                if (fallback === "detail") showDetail();
                else showEmpty();
                break;

            default:
                hideStatus();
                showEmpty();
        }
    }

    return { setView };
}