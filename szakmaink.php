<?php
require_once __DIR__ . '/includes/functions.php';

// Csak létező településre szűrünk; ismeretlen érték → minden képzés.
$varos = $_GET['varos'] ?? null;
if (!is_string($varos) || !in_array($varos, varosok(), true)) {
    $varos = null;
}

$lista    = szurt_kepzesek($varos);
$oldalCim = 'Szakmáink' . ($varos ? ' – ' . $varos : '') . ' – Szalézi AKK';
require __DIR__ . '/includes/header.php';
?>

    <h1>Szakmáink</h1>

    <div class="varos-nav">
        <a href="szakmaink.php" class="<?= $varos === null ? 'aktiv' : '' ?>">Összes</a>
        <?php foreach (varosok() as $v): ?>
            <a href="szakmaink.php?varos=<?= e(rawurlencode($v)) ?>"
               class="<?= $v === $varos ? 'aktiv' : '' ?>"><?= e($v) ?></a>
        <?php endforeach; ?>
    </div>

    <div id="kepzesek">
        <?php foreach ($lista as $k): ?>
            <article class="kepzes-kartya">
                <h2><?= e($k['nev']) ?></h2>
                <p>Település: <?= e($k['varos']) ?></p>
                <p>Ágazat: <?= e($k['agazat']) ?></p>
                <p>Jogviszony: <?= e($k['jogviszony']) ?></p>
                <p>Azonosító: <?= e($k['azonosito']) ?></p>

                <?php if (!empty($k['szakmairanyok'])): ?>
                    <ul class="szakmairanyok">
                        <?php foreach ($k['szakmairanyok'] as $irany): ?>
                            <li><?= e($irany) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($k['alkalmassagi'])): ?>
                    <p class="alkalmassagi"><?= e($k['alkalmassagi']) ?></p>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>

        <?php if (!$lista): ?>
            <p>Nincs megjeleníthető képzés.</p>
        <?php endif; ?>
    </div>

<?php require __DIR__ . '/includes/footer.php'; ?>
