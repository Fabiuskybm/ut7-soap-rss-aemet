<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($pageTitle ?? 'UT7', ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="icon" href="data:,">
</head>

<body class="page page--<?= htmlspecialchars($view ?? 'home', ENT_QUOTES, 'UTF-8') ?>">
    <?php require __DIR__ . '/partials/header.php'; ?>

    <main class="page__main">
        <?php
            if (isset($viewFile) && is_file($viewFile)) {
                require $viewFile;
            } else {
                echo '<p>Vista no encontrada.</p>';
            }
        ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

    <script type="module" src="assets/js/main.js"></script>
</body>

</html>