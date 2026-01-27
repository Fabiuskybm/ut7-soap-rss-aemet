<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?= htmlspecialchars($pageTitle ?? 'UT7', ENT_QUOTES, 'UTF-8') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <meta name="theme-color" content="#1a1a2e">

    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="icon" href="data:,">
</head>


<body class="page page--<?= htmlspecialchars($view ?? 'home', ENT_QUOTES, 'UTF-8') ?>">
    <?php require __DIR__ . '/partials/header.php'; ?>

    <main class="page__main">
        <div class="container">
            <?php
                if (isset($viewFile) && is_file($viewFile)) {
                    require $viewFile;
                } else {
                    echo '<p>Vista no encontrada.</p>';
                }
            ?>
        </div>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

    <script type="module" src="assets/js/main.js"></script>
</body>

</html>