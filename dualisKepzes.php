<?php
/**
 * dualisKepzes.php - Duális képzés
 *
 * Információs oldal kártyás felépítéssel. A szekciók szövege az
 * includes/dualisKepzesAdatok.php-ban szerkeszthető.
 */

$oldalCim = 'Duális képzés';
$oldalCss = 'assets/dualis.css'; // Oldalspecifikus stílus

// A szekciók (cím + szöveg párok) betöltése
$DUALIS_KEPZES = require __DIR__ . '/includes/dualisKepzesAdatok.php';

require __DIR__ . '/includes/header.php';
?>

<h1>Duális képzés</h1>

<div id="dualis-tartalom">

    <!-- Minden adatelemből egy információs szekció -->
    <?php foreach ($DUALIS_KEPZES as $elem): ?>

        <section class="informacio">

            <h2>
                <?= htmlspecialchars($elem["cim"]) ?>
            </h2>

            <p>
                <?= htmlspecialchars($elem["szoveg"]) ?>
            </p>

        </section>

    <?php endforeach; ?>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
