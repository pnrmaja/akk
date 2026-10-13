<?php
/**
 * galeria.php - Galéria
 * Külön galéria az AKK termeinek és a Fényes Adolf utcai telephelynek.
 */

$oldalCim = 'Galéria – Szalézi AKK';
$oldalCss = 'assets/galeria.css';

$galeriak = [
    [
        'id' => 'akk',
        'cim' => 'Szalézi Ágazati Képzőközpont',
        'leiras' => 'Az AKK termei és oktatási környezete.',
        'mappa' => 'assets/galeria/akk/',
        'kepek' => [
            'terem1-0.webp',
            'terem1.webp',
            'terem2-0.webp',
            'terem2-1.webp',
            'terem2-2.webp',
            'terem2.webp',
            'terem3-0.webp',
            'terem3-1.webp',
            'terem3-2.webp',
            'terem3.webp',
            'terem4-0.webp',
            'terem4-1.webp',
            'terem4-2.webp',
            'terem4-3.webp',
            'terem4.webp',
            'terem5.webp',
            'terem6-0.webp',
            'terem6-1.webp',
            'terem6-2.webp',
            'terem6.webp',
            'Ebédlő.webp',
            'Rendszergazdai szoba.webp',
            'Szoftveres szoba.webp',
        ],
    ],
    [
        'id' => 'fenyes-adolf',
        'cim' => 'Fényes Adolf utcai telephely',
        'leiras' => 'Pillants be a Fényes Adolf utcai telephely termeibe!',
        'mappa' => 'assets/galeria/fenyes-adolf/',
        'kepek' => [
            'fenyes-adolf-1.webp',
            'fenyes-adolf-2.webp',
            'fenyes-adolf-3.webp',
            'fenyes-adolf-4.webp',
        ],
    ],
];

require __DIR__ . '/includes/header.php';
?>

<div class="galeria-oldal">

    <h1>Galéria</h1>

    <p class="galeria-bevezeto">
        Ismerd meg képzési helyszíneinket és termeinket!
    </p>

    <?php foreach ($galeriak as $galeria): ?>

        <section
            class="helyszin-galeria"
            aria-labelledby="cim-<?= e($galeria['id']) ?>"
        >

            <h2 id="cim-<?= e($galeria['id']) ?>">
                <?= e($galeria['cim']) ?>
            </h2>

            <p class="helyszin-leiras">
                <?= e($galeria['leiras']) ?>
            </p>

            <div
                class="helyszin-lapozo"
                data-galeria="<?= e($galeria['id']) ?>"
            >

                <button
                    type="button"
                    class="helyszin-gomb balra"
                    aria-label="Előző kép"
                >&#10094;</button>

                <div class="helyszin-kepek">

                    <?php foreach ($galeria['kepek'] as $index => $kep): ?>

                        <img
                            src="<?= e($galeria['mappa'] . rawurlencode($kep)) ?>"
                            alt="<?= e($galeria['cim']) ?> – <?= $index + 1 ?>. kép"
                            class="helyszin-kep <?= $index === 0 ? 'aktiv' : '' ?>"
                            loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                        >

                    <?php endforeach; ?>

                </div>

                <button
                    type="button"
                    class="helyszin-gomb jobbra"
                    aria-label="Következő kép"
                >&#10095;</button>

                <div class="helyszin-szamlalo" aria-live="polite">
                    1 / <?= count($galeria['kepek']) ?>
                </div>

            </div>

        </section>

    <?php endforeach; ?>

</div>

<script>
document.querySelectorAll('.helyszin-lapozo').forEach(galeria => {
    const kepek = galeria.querySelectorAll('.helyszin-kep');
    const elozo = galeria.querySelector('.balra');
    const kovetkezo = galeria.querySelector('.jobbra');
    const szamlalo = galeria.querySelector('.helyszin-szamlalo');

    if (kepek.length === 0) {
        return;
    }

    let aktualis = 0;
    let automatikusLapozas;

    function mutatKep(index) {
        kepek[aktualis].classList.remove('aktiv');

        aktualis = (index + kepek.length) % kepek.length;

        kepek[aktualis].classList.add('aktiv');
        szamlalo.textContent =
            `${aktualis + 1} / ${kepek.length}`;
    }

    function inditAutomatikusLapozast() {
        clearInterval(automatikusLapozas);

        automatikusLapozas = setInterval(() => {
            mutatKep(aktualis + 1);
        }, 5000);
    }

    elozo.addEventListener('click', () => {
        mutatKep(aktualis - 1);
        inditAutomatikusLapozast();
    });

    kovetkezo.addEventListener('click', () => {
        mutatKep(aktualis + 1);
        inditAutomatikusLapozast();
    });

    galeria.addEventListener('mouseenter', () => {
        clearInterval(automatikusLapozas);
    });

    galeria.addEventListener(
        'mouseleave',
        inditAutomatikusLapozast
    );

    inditAutomatikusLapozast();
});
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
