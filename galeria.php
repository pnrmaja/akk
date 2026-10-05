<?php
/**
 * galeria.php - Galéria (termeink)
 *
 * Képlapozó: a képek az assets/galeria/ mappában vannak, a megjelenítés
 * sorrendje a $kepek tömb sorrendje. A lapozó JavaScript az oldal alján
 * van; 5 másodpercenként automatikusan is lapoz.
 */

$oldalCim = 'Galéria';
$oldalCss = 'assets/galeria.css'; // Oldalspecifikus stílus

// A megjelenítendő képek fájlnevei (assets/galeria/)
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

    <!-- Előző kép -->
    <button class="galeria-gomb balra" onclick="elozoKep()">&#10094;</button>

    <!-- Képek: egyszerre csak az 'aktiv' osztályú látszik -->
    <div class="galeria-kep">
        <?php foreach ($kepek as $index => $kep): ?>
            <img
                src="assets/galeria/<?= rawurlencode($kep) ?>"
                alt="Terem <?= $index + 1 ?>"
                class="<?= $index === 0 ? 'aktiv' : '' ?>"
            >
        <?php endforeach; ?>
    </div>

    <!-- Következő kép -->
    <button class="galeria-gomb jobbra" onclick="kovetkezoKep()">&#10095;</button>

</div>

<script>
// Az éppen megjelenített kép indexe
let aktualisKep = 0;

// Az összes kép elem a lapozóban
const kepek = document.querySelectorAll('.galeria-kep img');

// Megjeleníti a megadott indexű képet, a többit elrejti
function mutatKep(index) {
    kepek.forEach(kep => {
        kep.classList.remove('aktiv');
    });

    kepek[index].classList.add('aktiv');
}

// Következő kép; az utolsó után visszaugrik az elsőre
function kovetkezoKep() {
    aktualisKep++;

    if (aktualisKep >= kepek.length) {
        aktualisKep = 0;
    }

    mutatKep(aktualisKep);
}

// Előző kép; az első előtt az utolsóra ugrik
function elozoKep() {
    aktualisKep--;

    if (aktualisKep < 0) {
        aktualisKep = kepek.length - 1;
    }

    mutatKep(aktualisKep);
}

// Automatikus lapozás 5 másodpercenként
setInterval(kovetkezoKep, 5000);
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
