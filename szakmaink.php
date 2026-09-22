<?php
require_once __DIR__ . '/includes/functions.php';

// Csak létező településre szűrünk; ismeretlen érték → minden képzés.
$varos = $_GET['varos'] ?? null;
if (!is_string($varos) || !in_array($varos, varosok(), true)) {
    $varos = null;
}

// Csak létező jogviszony-típusra szűrünk; ismeretlen érték → minden képzés.
$jogviszonyTipusok = jogviszony_tipusok();
$jogviszony = $_GET['jogviszony'] ?? null;
if (!is_string($jogviszony) || !array_key_exists($jogviszony, $jogviszonyTipusok)) {
    $jogviszony = null;
}

$lista = szurt_kepzesek($varos, $jogviszony);

$cimReszek = array_filter([$varos, $jogviszony ? $jogviszonyTipusok[$jogviszony] : null]);
$oldalCim  = 'Szakmáink' . ($cimReszek ? ' – ' . implode(', ', $cimReszek) : '') . ' – Szalézi AKK';

require __DIR__ . '/includes/header.php';
?>

    <h1>Szakmáink</h1>

    <div class="varos-nav">
        <a href="<?= e(szakma_szuro_url(null, $jogviszony)) ?>"
           class="<?= $varos === null ? 'aktiv' : '' ?>">Összes település</a>
        <?php foreach (varosok() as $v): ?>
            <a href="<?= e(szakma_szuro_url($v, $jogviszony)) ?>"
               class="<?= $v === $varos ? 'aktiv' : '' ?>"><?= e($v) ?></a>
        <?php endforeach; ?>
    </div>

    <div class="varos-nav">
        <a href="<?= e(szakma_szuro_url($varos, null)) ?>"
           class="<?= $jogviszony === null ? 'aktiv' : '' ?>">Összes jogviszony</a>
        <?php foreach ($jogviszonyTipusok as $kulcs => $cimke): ?>
            <a href="<?= e(szakma_szuro_url($varos, $kulcs)) ?>"
               class="<?= $kulcs === $jogviszony ? 'aktiv' : '' ?>"><?= e($cimke) ?></a>
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