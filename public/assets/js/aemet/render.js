import { clearContent } from "./state.js";



function normalizePlaceName(place) {
	const m = place.match(/^(.+?),\s*(Las|Los|La|El)$/i);
	if (!m) return place;

	const article = m[2].toLowerCase();
	const pretty =
		article === 'las' ? 'Las' :
		article === 'los' ? 'Los' :
		article === 'la'  ? 'La'  :
		'El';

	return `${pretty} ${m[1]}`;
}


export function renderAemet(dom, payload) {
	clearContent(dom);

	const card = document.createElement('div');
	card.className = 'aemet__card';

	// Título
	if (payload?.title) {
		const h = document.createElement('h3');
		h.className = 'aemet__card-title';
		h.textContent = payload.title || 'AEMET';
		card.append(h);
	}

	// Imagen
	if (payload?.type === 'image') {
		if (payload.imageUrl) {
			const img = document.createElement('img');
			img.className = 'aemet__image';
			img.src = payload.imageUrl;
			img.alt = payload.title || 'Mapa AEMET';
			img.loading = 'lazy';
			card.append(img);
		} else {
			const p = document.createElement('p');
			p.className = 'aemet__note';
			p.textContent = payload.note || 'Imagen no disponible todavía.';
			card.append(p);
		}

		dom.content.append(card);
		return;
	}

	// Texto (table)
	if (payload?.type === 'table') {
		const rows = Array.isArray(payload.rows) ? payload.rows : [];

		const body = document.createElement('div');
		body.className = 'aemet__text';

		const meta = {
			place: null,
			date: null,
			time: null,
			valid: null,
			subtitle: null,
		};

		const cleaned = rows
			.map((r) => String(r ?? '').trim())
			.filter(Boolean)
			.filter((line) => line !== 'AGENCIA ESTATAL DE METEOROLOGÍA');


		const rxIsland = /^PREDICCI[ÓO]N\s+PARA\s+LA\s+ISLA\s+DE\s+(.+)$/i;
		const rxGeneral = /^PREDICCI[ÓO]N\s+GENERAL\s+PARA\s+LA\s+COMUNIDAD\s+DE\s+(.+)$/i;
		const rxDia = /^D[ÍI]A\s+(.+?)\s+A\s+LAS\s+(\d{1,2}:\d{2})/i;
		const rxValida = /^PREDICCI[ÓO]N\s+V[ÁA]LIDA\s+PARA\s+(.+)$/i;

		cleaned.forEach((line) => {
			let m;

			if (!meta.subtitle && (m = line.match(rxIsland))) {
				meta.subtitle = `Predicción para la isla de ${m[1].trim()}`;
				meta.place = m[1].trim();
				return;
			}

			if (!meta.subtitle && (m = line.match(rxGeneral))) {
				meta.subtitle = `Predicción general para ${m[1].trim()}`;
				meta.place = m[1].trim();
				return;
			}

			if ((!meta.date || !meta.time) && (m = line.match(rxDia))) {
				meta.date = m[1].trim();
				meta.time = m[2].trim();
				return;
			}

			if (!meta.valid && (m = line.match(rxValida))) {
				meta.valid = m[1].trim();
			}

			if (!meta.place && line.length <= 28 && line === line.toUpperCase()) {
				meta.place = line.trim();
			}
		});


		if (meta.subtitle || meta.place || meta.date || meta.time || meta.valid) {
			const metaWrap = document.createElement('div');
			metaWrap.className = 'aemet__meta';

			if (meta.subtitle) {
				const sub = document.createElement('p');
				sub.className = 'aemet__meta-subtitle';
				sub.textContent = meta.subtitle;
				metaWrap.appendChild(sub);
			}

			const chips = document.createElement('div');
			chips.className = 'aemet__chips';

			const addChip = (text) => {
				if (!text) return;
				const chip = document.createElement('span');
				chip.className = 'aemet__chip';
				chip.textContent = text;
				chips.appendChild(chip);
			};

			addChip(meta.place);
			addChip(meta.date);
			addChip(meta.time ? `${meta.time} h` : null);

			metaWrap.appendChild(chips);

			if (meta.valid) {
				const valid = document.createElement('div');
				valid.className = 'aemet__valid';
				valid.textContent = `Predicción válida para ${meta.valid}`;
				metaWrap.appendChild(valid);
			}

			body.appendChild(metaWrap);
		}


		const isSectionTitle = (s) =>
			/^([A-Z]\.-\s)/.test(s) || /^PREDICCI[ÓO]N\b/i.test(s) || /^D[ÍI]A\b/i.test(s);

		const isAllCaps = (s) =>
			s.length >= 8 && s === s.toUpperCase() && /[A-ZÁÉÍÓÚÜÑ]/.test(s);

		const blocks = [];
		let current = '';
		let inTemps = false;

		const flush = () => {
			const text = current.trim();
			if (text) blocks.push({ type: 'p', text });
			current = '';
		};

		cleaned.forEach((line) => {

			if (/^TEMPERATURAS MÍNIMAS Y MÁXIMAS PREVISTAS\b/i.test(line)) {
				flush();
				blocks.push({ type: 'temps_title', text: line });
				inTemps = true;
				return;
			}

			if (inTemps) {
				blocks.push({ type: 'temps_row', text: line });
				return;
			}

			if (
				(meta.place && line === meta.place) ||
				rxIsland.test(line) ||
				rxGeneral.test(line) ||
				rxDia.test(line) ||
				rxValida.test(line)
			) {
				return;
			}

			if (isSectionTitle(line) || isAllCaps(line)) {
				flush();
				blocks.push({ type: 'h', text: line });
				return;
			}

			current += (current ? ' ' : '') + line;
		});

		flush();


		if (blocks.length === 0) {
			const p = document.createElement('p');
			p.className = 'aemet__note';
			p.textContent = 'Sin datos para mostrar';
			card.appendChild(p);
			dom.content.appendChild(card);
			return;
		}

		let tempsCard = null;
		let tempsList = null;

		const ensureTempsCard = (title) => {
			if (tempsCard) return;

			tempsCard = document.createElement('section');
			tempsCard.className = 'aemet__temps';

			const head = document.createElement('div');
			head.className = 'aemet__temps-head';
			head.textContent = title || 'Temperaturas previstas';

			tempsList = document.createElement('div');
			tempsList.className = 'aemet__temps-list';

			tempsCard.appendChild(head);
			tempsCard.appendChild(tempsList);

			body.appendChild(tempsCard);
		};

		blocks.forEach((item) => {
			if (item.type === 'h') {
				const h = document.createElement('h4');
				h.className = 'aemet__section-title';
				h.textContent = item.text;
				body.appendChild(h);
				return;
			}

			if (item.type === 'temps_title') {
				ensureTempsCard(item.text);
				return;
			}

			if (item.type === 'temps_row') {
				ensureTempsCard('Temperaturas previstas');

				const row = document.createElement('div');
				row.className = 'aemet__temp-row';

				const match = item.text.match(/(.+?)\s+(\d+)\s+(\d+)\s*$/);

				if (match) {
					const place = normalizePlaceName(match[1].trim());
					const min = match[2];
					const max = match[3];

					const placeEl = document.createElement('div');
					placeEl.className = 'aemet__temp-place';
					placeEl.textContent = place;

					const mins = document.createElement('div');
					mins.className = 'aemet__temp-minmax';

					const minBox = document.createElement('div');
					minBox.className = 'aemet__temp-box aemet__temp-box--min';
					minBox.innerHTML = `<span class="aemet__temp-label">mín</span><span class="aemet__temp-value">${min}°</span>`;

					const maxBox = document.createElement('div');
					maxBox.className = 'aemet__temp-box aemet__temp-box--max';
					maxBox.innerHTML = `<span class="aemet__temp-label">máx</span><span class="aemet__temp-value">${max}°</span>`;

					mins.appendChild(minBox);
					mins.appendChild(maxBox);

					row.appendChild(placeEl);
					row.appendChild(mins);

				} else {
					row.textContent = item.text;
				}

				tempsList.appendChild(row);
				return;
			}

			const p = document.createElement('p');
			p.className = 'aemet__paragraph';
			p.textContent = item.text;
			body.appendChild(p);
		});

		card.appendChild(body);
		dom.content.appendChild(card);
		return;
	}

	const p = document.createElement('p');
	p.className = 'aemet__note';
	p.textContent = payload?.note || 'Sin datos.';

	card.appendChild(p);
	dom.content.appendChild(card);
}