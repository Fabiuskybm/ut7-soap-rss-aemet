<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';



// =========================
// |  Procesar vistas GET  |
// =========================

// Determina la vista
$view = $_GET['view'] ?? 'home';


// Procesa la vista
switch ($view) {

    case 'home':
        $view = 'home';
        $viewFile = __DIR__ . '/../src/Presentation/views/home.php';
        $pageTitle = 'UT7 - Inicio';
        break;

    case 'modules':
        $view = 'modules';
        $viewFile = __DIR__ . '/../src/Presentation/views/modules.php';
        $pageTitle = 'UT7 - Módulos';
        break;

    case 'rss':
        $view = 'rss';
        $viewFile = __DIR__ . '/../src/Presentation/views/rss.php';
        $pageTitle = 'UT7 - Sección de noticias';
        break;

    case 'aemet':
        $view = 'aemet';
        $viewFile = __DIR__ . '/../src/Presentation/views/aemet.php';
        $pageTitle = 'UT7 - Aemet';
        break;

    default:
        $view = 'home';
        $viewFile = __DIR__ . '/../src/Presentation/views/home.php';
        $pageTitle = 'UT7 - Inicio';
        break;
}


// Cargar layout común
require __DIR__ . '/../src/Presentation/templates/layout.php';