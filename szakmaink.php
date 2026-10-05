<?php
/**
 * szakmaink.php - Szakmáink (szűrhető képzési katalógus)
 *
 * Két, egymástól függetlenül kombinálható szűrő:
 *   ?varos=...      település szerint
 *   ?jogviszony=... jogviszony-típus szerint (kulcs: lásd jogviszony_tipusok())
 *
 * Adatok: includes/adatok.php (a functions.php-n keresztül).
 * A kártyákra kattintva a reszletek.php nyílik meg.
 */
require_once __DIR__ . '/includes/functions.php';


/* --------------------------------------------------------------------------
   Szűrőparaméterek ellenőrzése
   Ismeretlen vagy hamisított érték esetén a szűrő figyelmen kívül marad.
   -------------------------------------------------------------------------- */

// Település: csak létező értéket fogadunk el
$varos = $_GET['varos'] ?? null;
if (!is_string($varos) || !in_array($varos, varosok(), true)) {
    $varos = null;
}

// Jogviszony: csak létező kulcsot fogadunk el
$jogviszonyTipusok = jogviszony_tipusok();
$jogviszony = $_GET['jogviszony'] ?? null;
if (!is_string($jogviszony) || !array_key_exists($jogviszony, $jogviszonyTipusok)) {
    $jogviszony = null;
}


/* --------------------------------------------------------------------------
   Találati lista és oldalcím
   -------------------------------------------------------------------------- */

$lista = szurt_kepzesek($varos, $jogviszony);

// Az aktív szűrők bekerülnek az oldalcímbe is
$cimReszek = array_filter([$varos, $jogviszony ? $jogviszonyTipusok[$jogviszony] : null]);
$oldalCim  = 'Szakmáink' . ($cimReszek ? ' – ' . implode(', ', $cimReszek) : '') . ' – Szalézi AKK';

require __DIR__ . '/includes/header.php';
?>

    <h1>Szakmáink</h1>

    <!-- Település-szűrő (a jogviszony-szűrő értéke megmarad) -->
    <div class="varos-nav">
        <a href="<?= e(szakma_szuro_url(null, $jogviszony)) ?>"
           class="<?= $varos === null ? 'aktiv' : '' ?>">Összes település</a>
        <?php foreach (varosok() as $v): ?>
            <a href="<?= e(szakma_szuro_url($v, $jogviszony)) ?>"
               class="<?= $v === $varos ? 'aktiv' : '' ?>"><?= e($v) ?></a>
        <?php endforeach; ?>
    </div>

    <!-- Jogviszony-szűrő (a település-szűrő értéke megmarad) -->
    <div class="varos-nav">
        <a href="<?= e(szakma_szuro_url($varos, null)) ?>"
           class="<?= $jogviszony === null ? 'aktiv' : '' ?>">Összes jogviszony</a>
        <?php foreach ($jogviszonyTipusok as $kulcs => $cimke): ?>
            <a href="<?= e(szakma_szuro_url($varos, $kulcs)) ?>"
               class="<?= $kulcs === $jogviszony ? 'aktiv' : '' ?>"><?= e($cimke) ?></a>
        <?php endforeach; ?>
    </div>

    <!-- Képzéskártyák -->
    <div id="kepzesek">
        <?php foreach ($lista as $k): ?>
            <article class="kepzes-kartya">
                <h2><a href="<?= e(szakma_url($k)) ?>"><?= e($k['nev']) ?></a></h2>
                <p>Település: <?= e($k['varos']) ?></p>
                <p>Ágazat: <?= e($k['agazat']) ?></p>
                <p>Jogviszony: <?= e($k['jogviszony']) ?></p>
                <p>Azonosító: <?= e($k['azonosito']) ?></p>

                <!-- Szakmairányok (csak ha vannak) -->
                <?php if (!empty($k['szakmairanyok'])): ?>
                    <ul class="szakmairanyok">
                        <?php foreach ($k['szakmairanyok'] as $irany): ?>
                            <li><?= e($irany) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <!-- Alkalmassági vizsgálatra figyelmeztető szöveg (csak ha kell) -->
                <?php if (!empty($k['alkalmassagi'])): ?>
                    <p class="alkalmassagi"><?= e($k['alkalmassagi']) ?></p>
                <?php endif; ?>

                <p class="reszletek-link">Részletek &rarr;</p>
            </article>
        <?php endforeach; ?>

        <!-- Üres találati lista -->
        <?php if (!$lista): ?>
            <p>Nincs megjeleníthető képzés.</p>
        <?php endif; ?>
    </div>

<?php require __DIR__ . '/includes/footer.php'; ?>
