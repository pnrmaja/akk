<?php
/**
 * partnereink.php - Partnereink
 */

$oldalCim = 'Partnereink';
$oldalCss = 'assets/partnereink.css';

$PARTNEREK = require __DIR__ . '/includes/partnereinkAdatok.php';

/*
 * A partneradatok összegyűjtése.
 * Kezeli azt is, ha a partnerek több szinten vannak
 * az adatok tömbjében.
 */
function partnerekOsszegyujtese($adatok): array
{
    $eredmeny = [];

    if (!is_array($adatok)) {
        return $eredmeny;
    }

    foreach ($adatok as $adat) {

        // Ha ez már egy konkrét partner
        if (
            is_array($adat) &&
            array_key_exists('nev', $adat)
        ) {
            $eredmeny[] = [
                'nev' => (string) $adat['nev'],
                'url' => !empty($adat['url'])
                    ? (string) $adat['url']
                    : null
            ];

            continue;
        }

        // Ha egy újabb tömbszint következik
        if (is_array($adat)) {
            $eredmeny = array_merge(
                $eredmeny,
                partnerekOsszegyujtese($adat)
            );
        }
    }

    return $eredmeny;
}

$PARTNEREK = partnerekOsszegyujtese($PARTNEREK);


/*
 * Ábécésorrend
 */
usort($PARTNEREK, function ($a, $b) {
    return strcasecmp($a['nev'], $b['nev']);
});


require __DIR__ . '/includes/header.php';
?>

<h1>Partnereink</h1>

<p class="partnerek-bevezeto">
    Közös munkánk alapját megbízható iskolai és vállalati partnereink adják.
    Együtt azért dolgozunk, hogy tanulóink a képzés mellett valódi szakmai
    tapasztalatot is szerezhessenek.
</p>


<section class="partner-szekcio">

    <div class="partner-cim">
        <h2>Partnereink</h2>

        <p>
            Iskolai és vállalati partnereink listája.
            Ahol elérhető, a partner nevére kattintva megnyitható a hivatalos weboldal.
        </p>
    </div>


    <div class="partnerek">

        <?php foreach ($PARTNEREK as $partner): ?>

            <div class="partner-kartya">

                <?php if (!empty($partner['url'])): ?>

                    <a
                        href="<?= e($partner['url']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                    >

                        <span class="partner-nev">
                            <?= e($partner['nev']) ?>
                        </span>

                        <span class="partner-link">
                            Weboldal megnyitása →
                        </span>

                    </a>

                <?php else: ?>

                    <span class="partner-nev">
                        <?= e($partner['nev']) ?>
                    </span>

                <?php endif; ?>

            </div>

        <?php endforeach; ?>

    </div>

</section>


<?php require __DIR__ . '/includes/footer.php'; ?>