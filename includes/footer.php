<?php
/**
 * includes/footer.php
 *
 * Közös oldallábléc: lezárja a header.php-ban megnyitott <main> elemet,
 * kirajzolja a láblécet (vezetők és általános elérhetőségek), majd lezárja
 * a <body> és <html> elemet.
 *
 * Megjegyzés: a lábléc adatai itt kézzel vannak beírva. Változtatásukkor
 * az includes/kapcsolatAdatok.php-t (Kapcsolat oldal) is érdemes frissíteni.
 */
?>
</main>

<footer class="lablec">

    <div class="lablec-belso">

        <!-- 1. sor: vezetők és kapcsolattartók -->
        <div class="lablec-sor lablec-sor-elso">

            <section>
                <h3>Ügyvezető igazgató</h3>
                <p>Kovács Levente</p>
                <p>
                    Email:
                    <a href="mailto:kovacs.levente@akkszalezi.hu">
                        kovacs.levente@akkszalezi.hu
                    </a>
                </p>
            </section>

            <section>
                <h3>Szakmai referens</h3>
                <p>Halász-Máté Gabriella</p>
                <p>
                    Email:
                    <a href="mailto:halasz.gabriella@akkszalezi.hu">
                        halasz.gabriella@akkszalezi.hu
                    </a>
                </p>
            </section>

            <section>
                <h3>Tanulmányi osztály</h3>
                <p>Varga Melinda</p>
                <p>
                    Email:
                    <a href="mailto:varga.melinda@akkszalezi.hu">
                        varga.melinda@akkszalezi.hu
                    </a>
                </p>
            </section>

        </div>

        <!-- 2. sor: általános elérhetőségek és igazolások -->
        <div class="lablec-sor lablec-sor-masodik">

            <section>
                <h3>Elérhetőségek</h3>
                <p>
                    Email:
                    <a href="mailto:kepzohely@akkszalezi.hu">
                        kepzohely@akkszalezi.hu
                    </a>
                </p>
                <p>
                    Telefonszám:
                    <a href="tel:+36202320517">
                        06 20 232 0517
                    </a>
                </p>
            </section>

            <section>
                <h3>Igazolások</h3>
                <p>
                    Tanulóink figyelmébe táppénz esetén
                </p>
                <p>
                    Email:
                    <a href="mailto:igazolas@akkszalezi.hu">
                        igazolas@akkszalezi.hu
                    </a>
                </p>
            </section>

        </div>

    </div>

</footer>

</body>
</html>
