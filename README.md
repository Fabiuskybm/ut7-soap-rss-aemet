# Proyecto UT7 · SOAP, RSS y AEMET

Aplicación web en PHP que integra **tres casos de uso reales de consumo y exposición de servicios**:

- **SOAP** para consultar módulos de FP desde MySQL.
- **RSS** (Europa Press) con parseo XML y caché en backend.
- **AEMET OpenData** mediante proxy seguro (la API key no se expone al navegador).

El proyecto está organizado en capas (infraestructura, servicio SOAP, presentación y APIs HTTP) y ejecuta todo el entorno con Docker.

---

## Tecnologías

- **PHP 8.2 + Apache**
- **MySQL 8.0**
- **SOAP nativo de PHP** (`SoapServer` / `SoapClient`)
- **Frontend vanilla JS (ES Modules)**
- **HTML + CSS**
- **Docker + Docker Compose**
- **Composer** (autoload PSR-4)

---

## Funcionalidades

### 1) Módulos FP (SOAP)
- Servicio SOAP con operaciones:
  - `infoModulo(id)`
  - `infoDepartamentos()`
  - `infoNomenclaturas()`
- Persistencia en MySQL (`modulos`) y consumo desde frontend mediante proxy `/api/fp.php`.

### 2) Noticias RSS
- Consumo del feed de Europa Press desde backend (`/api/rss.php`).
- Parseo XML a JSON para frontend.
- Caché temporal en servidor para reducir rate limits.

### 3) AEMET
- Proxy backend (`/api/aemet.php`) para llamadas OpenData.
- Soporte para:
  - mapa de isobaras,
  - predicción de Canarias,
  - predicción de Gran Canaria.
- La clave `AEMET_API_KEY` se gestiona en entorno y no se envía al cliente.

---

## Requisitos

- Docker
- Docker Compose
- (Opcional) API key de AEMET: <https://opendata.aemet.es/>

---

## Instalación y ejecución

1. Clona el repositorio.
2. (Opcional pero recomendado) define tu API key de AEMET en el entorno:

```bash
export AEMET_API_KEY="tu_api_key"
```

3. Levanta los servicios:

```bash
docker compose up --build
```

Aplicación y servicios:
- Web: `http://localhost:8080`
- MySQL (host): `127.0.0.1:3307`

> Dentro de Docker, el host de base de datos es `db`.

---

## Uso rápido

- **Inicio**: `http://localhost:8080/index.php?view=home`
- **Módulos SOAP**: `http://localhost:8080/index.php?view=modules`
- **RSS**: `http://localhost:8080/index.php?view=rss`
- **AEMET**: `http://localhost:8080/index.php?view=aemet`

Prueba SOAP directa (cliente de test):
- `http://localhost:8080/soap/test/client_test.php`

WSDL:
- `http://localhost:8080/soap/service.wsdl`

---

## Base de datos

La base `fp_db` se inicializa automáticamente con `database/fp.sql` al crear el contenedor por primera vez.

Si quieres reinicializar:

```bash
docker compose down -v
docker compose up --build
```

---

## Estructura principal

```text
public/                 # Front controller, assets y endpoints HTTP
src/Infrastructure/     # Conexión a base de datos
src/Soap/               # Servicio SOAP y repositorio
src/Presentation/       # Vistas, layout y parciales
database/               # Script SQL de inicialización
config/                 # Configuración de conexión DB
```

---

## Notas

- El contenedor web ejecuta `composer install` al arrancar.
- Dependencias PHP cacheadas en volumen Docker (`vendor_data`).
- Si `AEMET_API_KEY` no está configurada, la sección AEMET devolverá error controlado desde backend.
