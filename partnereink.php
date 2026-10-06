<?php
/**
 * partnereink.php - Partnereink
 *
 * A partnerek rácsos listája, ábécé sorrendben. Az adatok az
 * includes/partnereinkAdatok.php-ban szerkeszthetők; weboldallal rendelkező
 * partner linkként, a többi sima szövegként jelenik meg.
 *
 * A partnerek szakmák szerinti blokkokban jelennek meg (a partnerek
 * 'szakmak' mezője alapján); a szakma nélküliek az "Egyéb partnerek"
 * blokkba kerülnek. A bontás a $SZAKMANKENT = false beállítással
 * kikapcsolható, ekkor egyetlen, cím nélküli rács jelenik meg.
 */

$oldalCim = 'Partnereink';
$oldalCss = 'assets/partnereink.css'; // Oldalspecifikus stílus

// Szakmák szerinti blokkos megjelenítés (true = be, false = egyetlen rács)
$SZAKMANKENT = true;

// A partnerek listájának betöltése
$PARTNEREK = require __DIR__ . '/includes/partnereinkAdatok.php';

require __DIR__ . '/includes/header.php';

// Csoportok: szakmánként egy blokk; kikapcsolt bontásnál egyetlen, cím nélküli csoport
$csoportok = partner_csoportok($PARTNEREK, $SZAKMANKENT);
?>

<h1>Partnereink</h1>

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
