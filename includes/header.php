<?php
declare(strict_types=1);
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/nav.php';

$oldalCim  = $oldalCim ?? 'Szalézi AKK';
$aktualis  = basename(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '') ?: 'index.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($oldalCim) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav>
    <?php menu_kirajzol(menu_adatok(), $aktualis); ?>
</nav>

<main>
