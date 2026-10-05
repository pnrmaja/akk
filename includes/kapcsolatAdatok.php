<?php
/**
 * includes/kapcsolatAdatok.php
 *
 * A Kapcsolat oldal (kapcsolat.php) adatai; egy helyen szerkeszthetők.
 * Minden elem egy kártya, a következő mezőkkel:
 *   cim        - a kártya címe (kötelező)
 *   ikon       - emoji az ikonhoz
 *   nev        - személy neve (opcionális)
 *   megjegyzes - rövid megjegyzés a cím alatt (opcionális)
 *   sorok      - a megjelenő adatsorok; mindegyik:
 *                  felirat - az adat megnevezése (pl. "Email")
 *                  ertek   - a megjelenített érték
 *                  href    - opcionális link (mailto:, tel: stb.)
 *
 * Megjegyzés: a lábléc (footer.php) adatai külön, kézzel vannak beírva.
 */
declare(strict_types=1);

return [

    // Általános elérhetőségek
    [
        "cim"   => "Elérhetőségek",
        "ikon"  => "📞",
        "sorok" => [
            ["felirat" => "Email",       "ertek" => "kepzohely@akkszalezi.hu", "href" => "mailto:kepzohely@akkszalezi.hu"],
            ["felirat" => "Telefonszám", "ertek" => "0620/ 2320517",           "href" => "tel:+36202320517"],
        ],
    ],

    // Táppénzes igazolások beküldése
    [
        "cim"        => "Igazolások",
        "ikon"       => "🩺",
        "megjegyzes" => "Tanulóink figyelmébe táppénz esetén",
        "sorok"      => [
            ["felirat" => "Email", "ertek" => "igazolas@akkszalezi.hu", "href" => "mailto:igazolas@akkszalezi.hu"],
        ],
    ],

    // Vezetők és kapcsolattartók
    [
        "cim"   => "Ügyvezető",
        "ikon"  => "👤",
        "nev"   => "Kovács Levente",
        "sorok" => [
            ["felirat" => "Email", "ertek" => "kovacs.levente@akkszalezi.hu", "href" => "mailto:kovacs.levente@akkszalezi.hu"],
        ],
    ],

    [
        "cim"   => "Szakmai referens",
        "ikon"  => "🎓",
        "nev"   => "Halász-Máté Gabriella",
        "sorok" => [
            ["felirat" => "Email", "ertek" => "halasz.gabriella@akkszalezi.hu", "href" => "mailto:halasz.gabriella@akkszalezi.hu"],
        ],
    ],

    [
        "cim"   => "Tanulmányi osztály",
        "ikon"  => "📋",
        "nev"   => "Varga Melinda",
        "sorok" => [
            ["felirat" => "Email", "ertek" => "varga.melinda@akkszalezi.hu", "href" => "mailto:varga.melinda@akkszalezi.hu"],
        ],
    ],

];
