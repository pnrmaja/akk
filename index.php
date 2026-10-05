<?php
/**
 * index.php - Főoldal
 *
 * Bemutatkozó (hero) rész, "fejlesztés alatt" jelzés és Google Térkép.
 * Statikus tartalom, nem használ külön adatfájlt.
 */
$oldalCim = 'Szalézi AKK';
require __DIR__ . '/includes/header.php';
?>

<!-- Bemutatkozó rész: cím, kérdések és a három célcsoport -->
<section class="hero">

    <h1>Szalézi Ágazati Képzőközpont</h1>

    <h2>Gyakorlati helyet keresel?</h2>

    <p>
        Szülőként fontos számodra gyermeked szakmai jövője?
        Vállalkozásként szívesen fogadna gyakornokot?
    </p>

    <p>
        A Szalézi Ágazati Képzőközpont összeköti a pályájuk elején álló
        fiatalokat azokkal a vállalkozásokkal, amelyek valódi szakmai
        tapasztalatot, fejlődési lehetőséget és biztos alapokat kínálnak
        a szakmájukban.
    </p>

    <!-- A három kiemelt üzenet (diák / szülő / vállalkozás) -->
    <div class="kiemelt-szoveg">

        <div>
            <strong>A diákoknak</strong>
            <span>lehetőség.</span>
        </div>

        <div>
            <strong>A szülőknek</strong>
            <span>biztonság.</span>
        </div>

        <div>
            <strong>A vállalkozásoknak</strong>
            <span>utánpótlás.</span>
        </div>

    </div>

</section>


<!-- Tájékoztató: az oldal még fejlesztés alatt áll (magyarul és angolul) -->
<p class="fejlesztes">
    A weboldal még fejlesztés alatt áll.<br>
    <span lang="en">This website is still under development.</span>
</p>


<!-- Térkép: a képzőközpont címe (1044 Budapest, Váci út 73.) -->
<section class="terkep-szekcio">

    <h2>Hol találsz minket?</h2>

    <iframe
        src="https://www.google.com/maps?q=1044+Budapest,+V%C3%A1ci+%C3%BAt+73&output=embed"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen>
    </iframe>

    <p>
        <a
            class="terkep-link"
            href="https://www.google.com/maps?q=1044+Budapest,+V%C3%A1ci+%C3%BAt+73"
            target="_blank"
            rel="noopener noreferrer">
            Megnyitás a Google Térképen
        </a>
    </p>

</section>


<?php require __DIR__ . '/includes/footer.php'; ?>
