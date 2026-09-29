<?php
declare(strict_types=1);

// Kapcsolati adatok – egy helyen szerkeszthetők.
// Mezők: cim, ikon, nev (opcionális), megjegyzes (opcionális), sorok: [felirat, ertek, href (opcionális)]

return [

    [
        "cim"   => "Elérhetőségek",
        "ikon"  => "📞",
        "sorok" => [
            ["felirat" => "Email",       "ertek" => "kepzohely@akkszalezi.hu", "href" => "mailto:kepzohely@akkszalezi.hu"],
            ["felirat" => "Telefonszám", "ertek" => "0620/ 2320517",           "href" => "tel:+36202320517"],
        ],
    ],

    [
        "cim"        => "Igazolások",
        "ikon"       => "🩺",
        "megjegyzes" => "Tanulóink figyelmébe táppénz esetén",
        "sorok"      => [
            ["felirat" => "Email", "ertek" => "igazolas@akkszalezi.hu", "href" => "mailto:igazolas@akkszalezi.hu"],
        ],
    ],

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
