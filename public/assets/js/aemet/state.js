

export function setStatus(dom, { text = "", type = "info", visible = false } = {}) {
    dom.status.textContent = text;
    dom.status.dataset.type = type;
    dom.status.classList.toggle("is-hidden", !visible);
}

export function clearContent(dom) {
    dom.content.innerHTML = "";
}