<?php
/**
 * partnereink.php - Partnereink
 *
 * Két külön lista: a partnercégek (alapértelmezett) és a partneriskolák.
 * Egyszerre mindig csak az egyik látszik; a váltás a lista fölötti
 * választósávval történik, a Szakmáink szűrőihez hasonlóan linkekkel
 * (?tipus=iskolak). Ismeretlen vagy hiányzó érték esetén a partnercégek
 * jelennek meg.
 *
 * Az adatok az includes/partnereinkAdatok.php (cégek) és az
 * includes/partneriskolakAdatok.php (iskolák) fájlban szerkeszthetők;
 * weboldallal rendelkező partner linkként, a többi sima szövegként jelenik meg.
 *
 * A partnerek mindkét listában szakmák szerinti blokkokban, ábécé sorrendben
 * jelennek meg (a partnerek 'szakmak' mezője alapján); a szakma nélküliek az
 * "Egyéb partnerek" blokkba kerülnek. A bontás a $SZAKMANKENT = false
 * beállítással kikapcsolható, ekkor egyetlen, cím nélküli rács jelenik meg.
 */

$oldalCss = 'assets/partnereink.css'; // Oldalspecifikus stílus

// Szakmák szerinti blokkos megjelenítés (true = be, false = egyetlen rács)
$SZAKMANKENT = true;

// A választható listák: URL-kulcs => felirat és adatfájl (az includes/ mappában).
// Az első elem az alapértelmezett: ez látszik, ha nincs (érvényes) választás.
$LISTAK = [
    'cegek'   => ['felirat' => 'Partnercégek',   'adatfajl' => 'partnereinkAdatok.php'],
    'iskolak' => ['felirat' => 'Partneriskolák', 'adatfajl' => 'partneriskolakAdatok.php'],
];
$ALAPERTELMEZETT = array_key_first($LISTAK);

// A kiválasztott lista ellenőrzése: ismeretlen vagy hamisított érték esetén
// az alapértelmezett lista marad (nincs hibaüzenet)
$tipus = $_GET['tipus'] ?? null;

if (!is_string($tipus) || !array_key_exists($tipus, $LISTAK)) {
    $tipus = $ALAPERTELMEZETT;
}

// Oldalcím: az alapértelmezett listánál csak "Partnereink", egyébként a lista neve is
$oldalCim = 'Partnereink'
    . ($tipus !== $ALAPERTELMEZETT ? ' – ' . $LISTAK[$tipus]['felirat'] : '');

// A kiválasztott lista betöltése (a fájlnév a $LISTAK-ból jön, nem az URL-ből)
$PARTNEREK = require __DIR__ . '/includes/' . $LISTAK[$tipus]['adatfajl'];

require __DIR__ . '/includes/header.php';

// Csoportok: szakmánként egy blokk; kikapcsolt bontásnál egyetlen, cím nélküli csoport
$csoportok = partner_csoportok($PARTNEREK, $SZAKMANKENT);
?>

<h1>Partnereink</h1>

<!-- Listaválasztó: partnercégek / partneriskolák (egyszerre csak az egyik látszik) -->
<div class="partner-valaszto">

    <?php foreach ($LISTAK as $kulcs => $lista): ?>
        <?php
        // Az alapértelmezett lista linkje paraméter nélküli (tiszta URL)
        $href = $kulcs === $ALAPERTELMEZETT
            ? 'partnereink.php'
            : 'partnereink.php?tipus=' . rawurlencode($kulcs);
        ?>

        <a
            href="<?= e($href) ?>"
            class="<?= $kulcs === $tipus ? 'aktiv' : '' ?>"
        >
            <?= e($lista['felirat']) ?>
        </a>

    <?php endforeach; ?>

</div>

<?php foreach ($csoportok as $csoport): ?>

    <!-- Csoportcím (csak szakmák szerinti bontásnál) -->
    <?php if ($csoport['cim'] !== null): ?>
        <h2 class="partner-csoport-cim"><?= e($csoport['cim']) ?></h2>
    <?php endif; ?>

    <div class="partnerek">

        <?php foreach ($csoport['partnerek'] as $partner): ?>

            <div class="partner-kartya">

                <?php if (!empty($partner['url'])): ?>

                    <!-- Van weboldal: új lapon megnyíló link -->
                    <a
                        href="<?= e($partner['url']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <?= e($partner['nev']) ?>
                    </a>

                <?php else: ?>

                    <!-- Nincs weboldal: csak a név -->
                    <span>
                        <?= e($partner['nev']) ?>
                    </span>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

<?php endforeach; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
