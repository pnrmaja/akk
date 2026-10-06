<?php
/**
 * kapcsolat.php - Kapcsolat
 */

$oldalCim = 'Kapcsolat – Szalézi AKK';
$oldalCss = 'assets/kapcsolat.css';

require __DIR__ . '/includes/header.php';
?>

<div class="kapcsolat-oldal">

    <h1>Kapcsolat</h1>

    <p class="kapcsolat-bevezeto">
        Keressen bennünket bizalommal az alábbi elérhetőségeken!
    </p>


    <!-- =========================================
         VEZETŐK ÉS TANULMÁNYI OSZTÁLY
         ========================================= -->

    <section class="kapcsolat-csoport">

        <div class="kapcsolat-csoport-fejlec">
            <h2>Kapcsolattartóink</h2>
        </div>

        <div class="kapcsolat-racs">

            <!-- Ügyvezető igazgató -->
            <article class="kapcsolat-kartya">

                <div class="kapcsolat-ikon">
                    👤
                </div>

                <h3>Ügyvezető igazgató</h3>

                <p class="kapcsolat-nev">
                    Kovács Levente
                </p>

                <a href="mailto:kovacs.levente@akkszalezi.hu">
                    kovacs.levente@akkszalezi.hu
                </a>

            </article>


            <!-- Szakmai referens -->
            <article class="kapcsolat-kartya">

                <div class="kapcsolat-ikon">
                    👤
                </div>

                <h3>Szakmai referens</h3>

                <p class="kapcsolat-nev">
                    Halász-Máté Gabriella
                </p>

                <a href="mailto:halasz.gabriella@akkszalezi.hu">
                    halasz.gabriella@akkszalezi.hu
                </a>

            </article>


            <!-- Tanulmányi osztály -->
            <article class="kapcsolat-kartya">

                <div class="kapcsolat-ikon">
                    🎓
                </div>

                <h3>Tanulmányi osztály</h3>

                <p class="kapcsolat-nev">
                    Varga Melinda
                </p>

                <a href="mailto:varga.melinda@akkszalezi.hu">
                    varga.melinda@akkszalezi.hu
                </a>

            </article>

        </div>

    </section>


    <!-- =========================================
         ELÉRHETŐSÉGEK ÉS IGAZOLÁSOK
         ========================================= -->

    <section class="kapcsolat-csoport">

        <div class="kapcsolat-csoport-fejlec">
            <h2>Elérhetőségek és ügyintézés</h2>
        </div>

        <div class="kapcsolat-racs masodik-sor">

            <!-- Általános elérhetőség -->
            <article class="kapcsolat-kartya">

                <div class="kapcsolat-ikon">
                    📞
                </div>

                <h3>Elérhetőségek</h3>

                <p>
                    <strong>Email:</strong><br>
                    <a href="mailto:kepzohely@akkszalezi.hu">
                        kepzohely@akkszalezi.hu
                    </a>
                </p>

                <p>
                    <strong>Telefonszám:</strong><br>
                    <a href="tel:+36202320517">
                        06 20 / 232 0517
                    </a>
                </p>

            </article>


            <!-- Igazolások -->
            <article class="kapcsolat-kartya">

                <div class="kapcsolat-ikon">
                    📄
                </div>

                <h3>Tanulóink figyelmébe</h3>

                <p class="kapcsolat-megjegyzes">
                    Táppénzes igazolások esetén
                </p>

                <a href="mailto:igazolas@akkszalezi.hu">
                    igazolas@akkszalezi.hu
                </a>

            </article>

        </div>

    </section>

</div>


<?php require __DIR__ . '/includes/footer.php'; ?>