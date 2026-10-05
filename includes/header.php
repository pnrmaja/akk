<?php
/**
 * includes/header.php
 *
 * Közös oldalfejléc: megnyitja a HTML-dokumentumot, kirajzolja a fejléc-képet
 * és a menüt, majd megnyitja a <main> elemet (lezárja: includes/footer.php).
 *
 * Az oldalak a beillesztés ELŐTT ezeket a változókat állíthatják be:
 *   $oldalCim - a <title> tartalma (alapértelmezés: "Szalézi AKK")
 *   $oldalCss - opcionális, oldalspecifikus stíluslap elérési útja
 */
declare(strict_types=1);

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/nav.php';

// Alapértelmezett oldalcím, ha az oldal nem adott meg sajátot
$oldalCim = $oldalCim ?? 'Szalézi AKK';

// Az aktuális fájlnév (pl. "galeria.php"), a menü aktív elemének jelöléséhez
$aktualis = basename(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '') ?: 'index.php';
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($oldalCim) ?></title>

    <!-- Globális stílus, minden oldalon betöltődik -->
    <link rel="stylesheet" href="assets/style.css">

    <!-- Oldalspecifikus stílus (a globálist felülírhatja, ezért utána jön) -->
    <?php if (!empty($oldalCss)): ?>
    <link rel="stylesheet" href="<?= e($oldalCss) ?>">
    <?php endif; ?>
</head>
<body>
    <!-- Fejléc-kép -->
    <header class="fejlec">
        <img src="assets/fejlec/fejlec.webp" alt="Szalézi Ágazati Képzőközpont">
    </header>

    <!-- Főmenü (adatai: includes/nav.php) -->
    <nav>
        <?php menu_kirajzol(menu_adatok(), $aktualis); ?>
    </nav>

<!-- Az oldal tartalma; a záró </main> a footer.php-ban van -->
<main>
