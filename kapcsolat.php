<?php
ini_set('display_errors', '1'); error_reporting(E_ALL);
$oldalCim = 'Kapcsolat – Szalézi AKK';
$oldalCss = 'assets/kapcsolat.css';

$KAPCSOLAT = require __DIR__ . '/includes/kapcsolatAdatok.php';

require __DIR__ . '/includes/header.php';
?>

<div class="kapcsolat-oldal">
    <h1>Kapcsolat</h1>
    <p class="kapcsolat-bevezeto">Keressen bennünket bizalommal az alábbi elérhetőségeken!</p>

    <div id="kapcsolat-tartalom">
        <?php foreach ($KAPCSOLAT as $elem): ?>
            <section class="kapcsolat-kartya">
                <div class="kapcsolat-ikon"><?= e($elem['ikon'] ?? '') ?></div>
                <h2><?= e($elem['cim']) ?></h2>

                <?php if (!empty($elem['megjegyzes'])): ?>
                    <p class="kapcsolat-megjegyzes"><?= e($elem['megjegyzes']) ?></p>
                <?php endif; ?>

                <?php if (!empty($elem['nev'])): ?>
                    <p class="kapcsolat-nev"><?= e($elem['nev']) ?></p>
                <?php endif; ?>

                <?php foreach ($elem['sorok'] as $sor): ?>
                    <p class="kapcsolat-sor">
                        <span class="kapcsolat-felirat"><?= e($sor['felirat']) ?></span>
                        <?php if (!empty($sor['href'])): ?>
                            <a href="<?= e($sor['href']) ?>"><?= e($sor['ertek']) ?></a>
                        <?php else: ?>
                            <?= e($sor['ertek']) ?>
                        <?php endif; ?>
                    </p>
                <?php endforeach; ?>
            </section>
        <?php endforeach; ?>
    </div>
</div>



<?php require __DIR__ . '/includes/footer.php'; ?>

