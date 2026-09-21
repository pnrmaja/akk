<?php

$oldalCim = 'Duális képzés';

$oldalCss = 'assets/dualis.css';

$DUALIS_KEPZES = require __DIR__ . '/includes/dualisKepzesAdatok.php';

require __DIR__ . '/includes/header.php';

?>

<h1>Duális képzés</h1>

<div id="dualis-tartalom">

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