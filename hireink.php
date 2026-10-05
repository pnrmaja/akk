<?php
/**
 * hireink.php - Híreink
 *
 * Képlapozó a hírek képeivel (assets/hirek/). Minden elemhez tartozik egy
 * képfájl és egy megjelenített név. A lapozó JavaScript az oldal alján van;
 * 4 másodpercenként automatikusan is lapoz.
 *
 * Megjegyzés: a 'nev' mezők jelenleg helyőrzők ("Festő neve").
 */

$oldalCim = 'Híreink';
$oldalCss = 'assets/hireink.css'; // Oldalspecifikus stílus

// A hírek listája: 'kep' = fájlnév (assets/hirek/), 'nev' = megjelenő felirat
$hirek = [
    [
        'kep' => 'rajz_01.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_02.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_03.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_04.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_05.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_06.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_07.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_08.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_09.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_10.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_11.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_12.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_13.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_14.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_15.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_16.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_17.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_18.webp',
        'nev' => 'Festő neve'
    ],
    [
        'kep' => 'rajz_19.webp',
        'nev' => 'Festő neve'
    ]
];

require __DIR__ . '/includes/header.php';

?>

<h1>Híreink</h1>

<div class="hirek">

    <!-- Előző hír -->
    <button class="hirek-gomb balra" onclick="elozoHir()">&#10094;</button>

    <!-- Hírek: egyszerre csak az 'aktiv' osztályú látszik -->
    <div class="hir">

        <?php foreach ($hirek as $index => $hir): ?>

            <div class="hir-elem <?= $index === 0 ? 'aktiv' : '' ?>">

                <img
                    src="assets/hirek/<?= e($hir['kep']) ?>"
                    alt="<?= e($hir['nev']) ?>"
                >

                <h2><?= e($hir['nev']) ?></h2>

            </div>

        <?php endforeach; ?>

    </div>

    <!-- Következő hír -->
    <button class="hirek-gomb jobbra" onclick="kovetkezoHir()">&#10095;</button>

</div>

<script>

// Az éppen megjelenített hír indexe
let aktualisHir = 0;

// Az összes hír elem a lapozóban
const hirek = document.querySelectorAll('.hir-elem');

// Megjeleníti a megadott indexű hírt, a többit elrejti
function mutatHirt(index) {

    hirek.forEach(hir => {
        hir.classList.remove('aktiv');
    });

    hirek[index].classList.add('aktiv');
}

// Következő hír; az utolsó után visszaugrik az elsőre
function kovetkezoHir() {

    aktualisHir++;

    if (aktualisHir >= hirek.length) {
        aktualisHir = 0;
    }

    mutatHirt(aktualisHir);
}

// Előző hír; az első előtt az utolsóra ugrik
function elozoHir() {

    aktualisHir--;

    if (aktualisHir < 0) {
        aktualisHir = hirek.length - 1;
    }

    mutatHirt(aktualisHir);
}

// Automatikus lapozás 4 másodpercenként
setInterval(kovetkezoHir, 4000);

</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
