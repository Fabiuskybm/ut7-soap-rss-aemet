
-- ===================
-- |  BASE DE DATOS  |
-- ===================

USE fp_db;


-- ========================
-- |  CREACIÓN DE TABLAS  |
-- ========================

DROP TABLE IF EXISTS modulos;

CREATE TABLE IF NOT EXISTS modulos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    curso_escolar VARCHAR(255) NOT NULL,
    departamento VARCHAR(255) NOT NULL,
    nivel VARCHAR(255) NOT NULL,
    especialidad VARCHAR(255) NOT NULL,
    nomenclatura_modulo VARCHAR(255) NOT NULL,
    curso INT(11) NOT NULL,
    numalumnos INT(11) NOT NULL,
    PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- ========================
-- |  INSERCIÓN DE DATOS  |
-- ========================

INSERT INTO modulos (
    id,
    curso_escolar,
    departamento,
    nivel,
    especialidad,
    nomenclatura_modulo,
    curso,
    numalumnos
) VALUES
    (
        1,
        '2020/2021',
        'Informática y Comunicaciones',
        'Ciclo Formativo Superior',
        'CFGS - Desarrollo de Aplicaciones Web',
        'DSW',
        2,
        30
    ),
    (
        2,
        '2020/2021',
        'Informática y Comunicaciones',
        'Ciclo Formativo Superior',
        'CFGS - Desarrollo de Aplicaciones Web',
        'FOL',
        2,
        18
    ),
    (
        3,
        '2020/2021',
        'Administración y Gestión',
        'Ciclo Formativo de Grado Superior',
        'CFGM - Gestión Administrativa',
        'TDE',
        1,
        25
    ),
    (
        4,
        '2020/2021',
        'Informática y Comunicaciones',
        'Ciclo Formativo de Grado Medio',
        'CFGM - Sistemas Microinformáticos y Redes',
        'MJE',
        1,
        28
    );