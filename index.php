<?php
$oldalCim = 'Szalézi AKK';
require __DIR__ . '/includes/header.php';
?>

    <h1>Szalézi Ágazati Képzőközpont</h1>
    <p>Üdvözöljük a Szalézi Ágazati Képzőközpont oldalán!</p>

<section class="galeria">

    <h2>Galéria</h2>

    <div class="galeria-container">

        <button class="galeria-gomb balra" onclick="elozoKepek()">
            &#10094;
        </button>

        <div class="galeria-grid">

            <?php for ($i = 1; $i <= 19; $i++): ?>

                <div class="galeria-kep">
                    <img
                        src="assets/galeria/rajz_<?= sprintf('%02d', $i) ?>.jpg"
                        alt="Épületrajz <?= $i ?>"
                    >
                </div>

            <?php endfor; ?>

        </div>

        <button class="galeria-gomb jobbra" onclick="kovetkezoKepek()">
            &#10095;
        </button>

    </div>

</section>

<script>
    let aktualisOldal = 0;

    const kepek = document.querySelectorAll(".galeria-kep");

    function galeriaFrissites() {

        kepek.forEach((kep, index) => {

            if (
                index >= aktualisOldal * 3 &&
                index < aktualisOldal * 3 + 3
            ) {
                kep.style.display = "block";
            } else {
                kep.style.display = "none";
            }

        });
    }

    function kovetkezoKepek() {

        const maxOldal = Math.ceil(kepek.length / 3) - 1;

        if (aktualisOldal < maxOldal) {
            aktualisOldal++;
            galeriaFrissites();
        }
    }

    function elozoKepek() {

        if (aktualisOldal > 0) {
            aktualisOldal--;
            galeriaFrissites();
        }
    }

    galeriaFrissites();
</script>

    <section class="terkep-szekcio">
        <h2>Hol találsz minket?</h2>
        <iframe
            src="https://www.google.com/maps?q=1044+Budapest,+V%C3%A1ci+%C3%BAt+73&output=embed"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen></iframe>
        <p>
            <a class="terkep-link" href="https://www.google.com/maps?q=1044+Budapest,+V%C3%A1ci+%C3%BAt+73" target="_blank" rel="noopener noreferrer">
                Megnyitás a Google Térképen
            </a>
        </p>
    </section>

<?php require __DIR__ . '/includes/footer.php'; ?>