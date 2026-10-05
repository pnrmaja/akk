<?php
/**
 * reszletek.php - Egy szakma részletes oldala
 *
 * Hívás: reszletek.php?id=4-0722-08-01 (a szakma azonosítója kötőjelekkel).
 * Az alapadatok az includes/adatok.php-ból, a leírás-blokkok az
 * includes/reszletekAdatok.php-ból jönnek. Ismeretlen vagy hiányzó
 * azonosító esetén 404-es oldal jelenik meg.
 */
require_once __DIR__ . '/includes/functions.php';


/* --------------------------------------------------------------------------
   Szakma keresése az URL-ben kapott azonosító alapján
   -------------------------------------------------------------------------- */

$id     = $_GET['id'] ?? null;
$szakma = is_string($id) ? kepzes_azonosito_alapjan($id) : null;

if ($szakma === null) {
    // Nincs ilyen szakma: 404-es állapotkód és általános cím
    http_response_code(404);
    $oldalCim = 'A szakma nem található – Szalézi AKK';
} else {
    $oldalCim = $szakma['nev'] . ' – Szalézi AKK';
    $blokkok  = kepzes_reszletek($szakma['azonosito']); // Leírás-blokkok (lehet üres)
}
$oldalCss = 'assets/reszletek.css';

require __DIR__ . '/includes/header.php';
?>

<?php if ($szakma === null): ?>

    <!-- Hibaoldal: a szakma nem található -->
    <h1>A szakma nem található</h1>
    <p><a href="szakmaink.php">&larr; Vissza a szakmákhoz</a></p>

<?php else: ?>

    <div class="reszletek">

        <p class="reszletek-vissza">
            <a href="szakmaink.php">&larr; Vissza a szakmákhoz</a>
        </p>

        <h1><?= e($szakma['nev']) ?></h1>

        <!-- Alapadatok -->
        <dl class="reszletek-adatok">
            <div><dt>Település</dt><dd><?= e($szakma['varos']) ?></dd></div>
            <div><dt>Ágazat</dt><dd><?= e($szakma['agazat']) ?></dd></div>
            <div><dt>Jogviszony</dt><dd><?= e($szakma['jogviszony']) ?></dd></div>
            <div><dt>Szakma azonosító száma</dt><dd><?= e($szakma['azonosito']) ?></dd></div>
        </dl>

        <!-- Szakmairányok (csak ha vannak) -->
        <?php if (!empty($szakma['szakmairanyok'])): ?>
            <section class="reszletek-szakmairanyok">
                <h2>Szakmairányok</h2>
                <ul>
                    <?php foreach ($szakma['szakmairanyok'] as $irany): ?>
                        <li><?= e($irany) ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>

        <!-- Alkalmassági vizsgálatra figyelmeztető szöveg (csak ha kell) -->
        <?php if (!empty($szakma['alkalmassagi'])): ?>
            <p class="alkalmassagi"><?= e($szakma['alkalmassagi']) ?></p>
        <?php endif; ?>

        <!-- Részletes leírás blokkonként: 'h' = alcím, 'ul' = lista, egyéb = bekezdés -->
        <?php foreach ($blokkok as [$tipus, $tartalom]): ?>
            <?php if ($tipus === 'h'): ?>
                <h2><?= e($tartalom) ?></h2>
            <?php elseif ($tipus === 'ul'): ?>
                <ul>
                    <?php foreach ($tartalom as $pont): ?>
                        <li><?= e($pont) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p><?= e($tartalom) ?></p>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>

<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
