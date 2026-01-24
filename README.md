# ut7-soap-rss-aemet

Base del proyecto UT7 (SOAP + RSS + AEMET).

Estado actual:  
Proyecto base **funcional** con Docker, Apache, PHP, MySQL y base de datos inicializada.  
Aún **no** se han implementado servicios SOAP, RSS ni AEMET.

---

## Requisitos

- Docker
- Docker Compose

---

## Cómo ejecutar el proyecto

Desde la raíz del repositorio:

```bash
docker compose up --build
```

Una vez levantado:

- Aplicación web: http://localhost:8080
- MySQL desde el host: `127.0.0.1:3307`

> Dentro de Docker, el host de la base de datos es `db`.

---

## Base de datos

- Motor: MySQL 8.0
- Base de datos: `fp_db`
- Usuario: `root`
- Contraseña: `1234`
- Puerto expuesto: `3307` → `3306`

### Inicialización automática

Al levantar el contenedor `db`, Docker ejecuta automáticamente los scripts SQL ubicados en:

```
database/
```

Actualmente se carga:

- `database/fp.sql`

> ⚠️ La inicialización solo se ejecuta la **primera vez** que se crea el volumen.  
> Para reinicializar completamente la base de datos:

```bash
docker compose down -v
docker compose up --build
```

---

## Notas

- El contenedor web ejecuta `composer install` automáticamente al arrancar.
- Las dependencias PHP se cachean en un volumen Docker (`vendor_data`).
- El proyecto está preparado como base para continuar el desarrollo del ejercicio UT7.
