<?php

$oldalCim = 'Híreink';
$oldalCss = 'assets/hireink.css';

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

    <button class="hirek-gomb balra" onclick="elozoHir()">&#10094;</button>

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

    <button class="hirek-gomb jobbra" onclick="kovetkezoHir()">&#10095;</button>

</div>

<script>

let aktualisHir = 0;

const hirek = document.querySelectorAll('.hir-elem');

function mutatHirt(index) {

    hirek.forEach(hir => {
        hir.classList.remove('aktiv');
    });

    hirek[index].classList.add('aktiv');
}

function kovetkezoHir() {

    aktualisHir++;

    if (aktualisHir >= hirek.length) {
        aktualisHir = 0;
    }

    mutatHirt(aktualisHir);
}

function elozoHir() {

    aktualisHir--;

    if (aktualisHir < 0) {
        aktualisHir = hirek.length - 1;
    }

    mutatHirt(aktualisHir);
}

setInterval(kovetkezoHir, 4000);

</script>

<?php require __DIR__ . '/includes/footer.php'; ?>