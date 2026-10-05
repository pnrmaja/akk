<?php
require_once __DIR__ . '/includes/functions.php';

// Az azonosító alapján keresünk; ismeretlen / hiányzó érték → 404.
$id     = $_GET['id'] ?? null;
$szakma = is_string($id) ? kepzes_azonosito_alapjan($id) : null;

if ($szakma === null) {
    http_response_code(404);
    $oldalCim = 'A szakma nem található – Szalézi AKK';
} else {
    $oldalCim = $szakma['nev'] . ' – Szalézi AKK';
    $blokkok  = kepzes_reszletek($szakma['azonosito']);
}
$oldalCss = 'assets/reszletek.css';

require __DIR__ . '/includes/header.php';
?>

<?php if ($szakma === null): ?>

    <h1>A szakma nem található</h1>
    <p><a href="szakmaink.php">&larr; Vissza a szakmákhoz</a></p>

<?php else: ?>

    <div class="reszletek">

        <p class="reszletek-vissza">
            <a href="szakmaink.php">&larr; Vissza a szakmákhoz</a>
        </p>

        <h1><?= e($szakma['nev']) ?></h1>

        <dl class="reszletek-adatok">
            <div><dt>Település</dt><dd><?= e($szakma['varos']) ?></dd></div>
            <div><dt>Ágazat</dt><dd><?= e($szakma['agazat']) ?></dd></div>
            <div><dt>Jogviszony</dt><dd><?= e($szakma['jogviszony']) ?></dd></div>
            <div><dt>Szakma azonosító száma</dt><dd><?= e($szakma['azonosito']) ?></dd></div>
        </dl>

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

        <?php if (!empty($szakma['alkalmassagi'])): ?>
            <p class="alkalmassagi"><?= e($szakma['alkalmassagi']) ?></p>
        <?php endif; ?>

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
