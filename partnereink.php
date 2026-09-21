<?php

$oldalCim = 'Partnereink';

$oldalCss = 'assets/partnereink.css';

$PARTNEREK = require __DIR__ . '/includes/partnereinkAdatok.php';

require __DIR__ . '/includes/header.php';

?>

<h1>Partnereink</h1>

<div class="partnerek">

    <?php foreach ($PARTNEREK as $partner): ?>

        <div class="partner-kartya">

            <?php if (!empty($partner['url'])): ?>

                <a
                    href="<?= e($partner['url']) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <?= e($partner['nev']) ?>
                </a>

            <?php else: ?>

                <span>
                    <?= e($partner['nev']) ?>
                </span>

            <?php endif; ?>

        </div>

    <?php endforeach; ?>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>