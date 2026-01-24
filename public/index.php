<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';



// -----------------------
//   Procesar vistas GET  
// -----------------------

// Determina la vista
$view = $_GET['view'] ?? 'home';


// Procesa la vista
switch ($view) {

    case 'home':
    default:
        $view = 'home';
        $viewFile = __DIR__ . '/../src/Presentation/views/home.php';
        $pageTitle = 'UT7 - Home';
        break;
}


// Cargar layout común
require __DIR__ . '/../src/Presentation/templates/layout.php';