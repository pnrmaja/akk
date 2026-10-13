<?php

$oldalCim = 'Dokumentumok – Szalézi AKK';
$oldalCss = 'assets/dokumentumok.css';

require __DIR__ . '/includes/header.php';
?>

<div class="dokumentumok-oldal">

    <h1>Dokumentumok</h1>

    <p class="dokumentumok-bevezeto">
        Ezen az oldalon megtalálhatók a tanulóink számára fontos
        dokumentumok, amelyek megtekinthetők és letölthetők.
    </p>

    <div class="dokumentumok-racs">


        <article class="dokumentum-kartya">

            <div class="dokumentum-ikon pdf-ikon">
                PDF
            </div>

            <h2>Szakképzési munkaszerződés</h2>

            <p>
                A szakképzési munkaszerződés dokumentuma.
            </p>

            <div class="dokumentum-gombok">

                <a
                    href="dokumentumok/Szakképzési munkaszerződés.pdf"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="dokumentum-gomb megnyitas"
                >
                    Megnyitás
                </a>

                <a
                    href="dokumentumok/Szakképzési munkaszerződés.pdf"
                    download
                    class="dokumentum-gomb letoltes"
                >
                    Letöltés
                </a>

            </div>

        </article>

        <article class="dokumentum-kartya">

            <div class="dokumentum-ikon word-ikon">
                DOCX
            </div>

            <h2>Házirend – 2026/2027. tanév</h2>

            <p>
                A 2026/2027-es tanévre vonatkozó házirend.
            </p>

            <div class="dokumentum-gombok">

                <a
                    href="dokumentumok/Házirend_2026_2027_végleges.docx"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="dokumentum-gomb megnyitas"
                >
                    Megnyitás
                </a>

                <a
                    href="dokumentumok/Házirend_2026_2027_végleges.docx"
                    download
                    class="dokumentum-gomb letoltes"
                >
                    Letöltés
                </a>

            </div>

        </article>

    </div>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
