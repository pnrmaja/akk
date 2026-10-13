
<?php
/**
 * szakmaink.php - Szűrhető képzési katalógus képekkel.
 */

require_once __DIR__ . '/includes/functions.php';

/* Szűrőparaméterek ellenőrzése */

// Település szerinti szűrés
$varos = $_GET['varos'] ?? null;

if (!is_string($varos) || !in_array($varos, varosok(), true)) {
    $varos = null;
}

// Jogviszony szerinti szűrés
$jogviszonyTipusok = jogviszony_tipusok();
$jogviszony = $_GET['jogviszony'] ?? null;

if (!is_string($jogviszony) || !array_key_exists($jogviszony, $jogviszonyTipusok)) {
    $jogviszony = null;
}

/* Képzések és képfájlok betöltése */

$lista = szurt_kepzesek($varos, $jogviszony);
$szakmaKepek = require __DIR__ . '/includes/szakmaKepek.php';

/* Oldalcím beállítása */

$cimReszek = array_filter([
    $varos,
    $jogviszony ? $jogviszonyTipusok[$jogviszony] : null
]);

$oldalCim = 'Szakmáink'
    . ($cimReszek ? ' – ' . implode(', ', $cimReszek) : '')
    . ' – Szalézi AKK';

$oldalCss = 'assets/szakmaink.css';

require __DIR__ . '/includes/header.php';
?>

<h1>Szakmáink</h1>

<p class="szakmaink-bevezeto">
    Fedezd fel képzéseinket, és találd meg a számodra megfelelő szakmát!
    A szűrők segítségével település és jogviszony szerint is kereshetsz.
</p>

<!-- Település szerinti szűrő -->
<div class="varos-nav">
    <a
        href="<?= e(szakma_szuro_url(null, $jogviszony)) ?>"
        class="<?= $varos === null ? 'aktiv' : '' ?>"
    >
        Összes település
    </a>

    <?php foreach (varosok() as $v): ?>
        <a
            href="<?= e(szakma_szuro_url($v, $jogviszony)) ?>"
            class="<?= $v === $varos ? 'aktiv' : '' ?>"
        >
            <?= e($v) ?>
        </a>
    <?php endforeach; ?>
</div>

<!-- Jogviszony szerinti szűrő -->
<div class="varos-nav">
    <a
        href="<?= e(szakma_szuro_url($varos, null)) ?>"
        class="<?= $jogviszony === null ? 'aktiv' : '' ?>"
    >
        Összes jogviszony
    </a>

    <?php foreach ($jogviszonyTipusok as $kulcs => $cimke): ?>
        <a
            href="<?= e(szakma_szuro_url($varos, $kulcs)) ?>"
            class="<?= $kulcs === $jogviszony ? 'aktiv' : '' ?>"
        >
            <?= e($cimke) ?>
        </a>
    <?php endforeach; ?>
</div>

<!-- Találatok száma -->
<p class="talalatok-szama">
    Megjelenített képzések: <strong><?= count($lista) ?></strong>
</p>

<!-- Képzéskártyák -->
<div id="kepzesek">

    <?php foreach ($lista as $k): ?>
        <?php
        $azonosito = $k['azonosito'];
        $kepFajl = $szakmaKepek[$azonosito] ?? null;
        $reszletekUrl = szakma_url($k);
        ?>

        <article class="kepzes-kartya">

            <!-- Szakmához tartozó kép -->
            <?php if ($kepFajl !== null): ?>
                <a
                    href="<?= e($reszletekUrl) ?>"
                    class="kepzes-kep-link"
                    tabindex="-1"
                    aria-hidden="true"
                >
                    <img
                        src="<?= e('assets/szakmak_kepek/' . $kepFajl) ?>"
                        alt=""
                        class="kepzes-kep"
                        loading="lazy"
                    >
                </a>
            <?php endif; ?>

            <div class="kepzes-tartalom">

                <h2>
                    <a href="<?= e($reszletekUrl) ?>">
                        <?= e($k['nev']) ?>
                    </a>
                </h2>

                <p class="kepzes-agazat">
                    <strong>Ágazat:</strong>
                    <?= e($k['agazat']) ?>
                </p>

                <p>
                    <strong>Település:</strong>
                    <?= e($k['varos']) ?>
                </p>

                <p>
                    <strong>Jogviszony:</strong>
                    <?= e($k['jogviszony']) ?>
                </p>

                <p>
                    <strong>Azonosító:</strong>
                    <?= e($k['azonosito']) ?>
                </p>

                <!-- Szakmairányok -->
                <?php if (!empty($k['szakmairanyok'])): ?>
                    <div class="kepzes-szakmairanyok">
                        <strong>Szakmairányok:</strong>

                        <ul class="szakmairanyok">
                            <?php foreach ($k['szakmairanyok'] as $irany): ?>
                                <li><?= e($irany) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Alkalmassági figyelmeztetés -->
                <?php if (!empty($k['alkalmassagi'])): ?>
                    <p class="alkalmassagi">
                        <?= e($k['alkalmassagi']) ?>
                    </p>
                <?php endif; ?>

                <a
                    href="<?= e($reszletekUrl) ?>"
                    class="reszletek-link"
                >
                    Részletek <span aria-hidden="true">&rarr;</span>
                </a>

            </div>
        </article>

    <?php endforeach; ?>

    <!-- Nincs találat -->
    <?php if (!$lista): ?>
        <p class="nincs-talalat">
            Nincs megjeleníthető képzés a kiválasztott szűrők alapján.
        </p>
    <?php endif; ?>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
