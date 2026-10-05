<?php
/**
 * partnereink.php - Partnereink
 *
 * A partnerek rácsos listája. Az adatok az includes/partnereinkAdatok.php-ban
 * szerkeszthetők; weboldallal rendelkező partner linkként, a többi sima
 * szövegként jelenik meg.
 */

$oldalCim = 'Partnereink';
$oldalCss = 'assets/partnereink.css'; // Oldalspecifikus stílus

// A partnerek listájának betöltése
$PARTNEREK = require __DIR__ . '/includes/partnereinkAdatok.php';

require __DIR__ . '/includes/header.php';
?>

<h1>Partnereink</h1>

<div class="partnerek">

    <?php foreach ($PARTNEREK as $partner): ?>

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

<?php require __DIR__ . '/includes/footer.php'; ?>
