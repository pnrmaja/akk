<?php

$oldalCim = 'Galéria';
$oldalCss = 'assets/galeria.css';

$kepek = [
    '1-es terem.webp',
    '2-es terem.webp',
    '2-es terem1.webp',
    '2-es terem2.webp',
    '3-as terem.webp',
    '3-as terem1.webp',
    '3-as terem2.webp',
    '4-es terem.webp',
    '4-es terem1.webp',
    '4-es terem2.webp',
    '4-es terem3.webp',
    '6-os terem.webp',
    '6-os terem1.webp',
    '6-os terem2.webp'
];

require __DIR__ . '/includes/header.php';

?>

<h1>Termeink</h1>

<div class="galeria">

    <button class="galeria-gomb balra" onclick="elozoKep()">&#10094;</button>

    <div class="galeria-kep">
        <?php foreach ($kepek as $index => $kep): ?>
            <img
                src="assets/galeria/<?= rawurlencode($kep) ?>"
                alt="Terem <?= $index + 1 ?>"
                class="<?= $index === 0 ? 'aktiv' : '' ?>"
            >
        <?php endforeach; ?>
    </div>

    <button class="galeria-gomb jobbra" onclick="kovetkezoKep()">&#10095;</button>

</div>

<script>
let aktualisKep = 0;

const kepek = document.querySelectorAll('.galeria-kep img');

function mutatKep(index) {
    kepek.forEach(kep => {
        kep.classList.remove('aktiv');
    });

    kepek[index].classList.add('aktiv');
}

function kovetkezoKep() {
    aktualisKep++;

    if (aktualisKep >= kepek.length) {
        aktualisKep = 0;
    }

    mutatKep(aktualisKep);
}

function elozoKep() {
    aktualisKep--;

    if (aktualisKep < 0) {
        aktualisKep = kepek.length - 1;
    }

    mutatKep(aktualisKep);
}

setInterval(kovetkezoKep, 5000);
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>