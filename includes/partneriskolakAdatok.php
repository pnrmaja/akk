<?php
/**
 * includes/partneriskolakAdatok.php
 *
 * A Partnereink oldal partneriskola-listájának adatai (partnereink.php,
 * ?tipus=iskolak). A szerkezete megegyezik a partnercégekével
 * (includes/partnereinkAdatok.php). Mezők:
 *   nev     - az iskola neve
 *   url     - az iskola weboldala; null, ha nincs (ilyenkor sima szövegként jelenik meg)
 *   szakmak - opcionális: azon szakmák (vagy szakmacsoportok) nevei, amelyekhez
 *             az iskola tartozik, pl. 'szakmak' => ['Villanyszerelő', 'Elektronikai technikus'].
 *             Egy iskola több szakmánál is szerepelhet. Az oldal ezek szerint
 *             blokkokra bontja a listát (partnereink.php, $SZAKMANKENT = true);
 *             a blokk címe a megadott szöveg, ezért ugyanazt a szakmát mindenhol
 *             pontosan ugyanúgy kell írni. A 'szakmak' nélküli iskolák az
 *             "Egyéb partnerek" blokkba kerülnek.
 *             Forrás: Együttműködő cégek (iskolák), 2026 ősz – "Iskolák" munkalap
 *             (a szakmák az oszlopfejlécek; a FAIPAR oszlop szakmacsoportként
 *             "Faipar (asztalos, kárpitos)" címmel szerepel).
 *
 * Új iskola felvétele: új elem a tömbbe, tetszőleges helyre. A sorrend nem
 * számít: az oldal az iskolákat automatikusan ábécé sorrendben jeleníti meg.
 */
declare(strict_types=1);

return [
    [
        'nev' => 'BMSZC Bláthy Ottó Titusz Informatikai Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'BMSZC Puskás Tivadar Távközlési és Informatikai Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'BMSZC Than Károly Technikum és Szakképző Iskola Wesselényi Miklós Telephelye',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Egressy Gábor Két Tanítási Nyelvű Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Pataky István Híradásipari és Informatikai Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'BMSZC Trefort Ágoston Két Tanítási Nyelvű Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Újpesti Két Tanítási Nyelvű Műszaki Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'SZÁMALK-Szalézi Technikum és Szakgimnázium',
        'url' => 'https://www.szamalk-szalezi.hu/',
        'szakmak' => [
            'Informatikai rendszer- és alkalmazás-üzemeltető technikus',
            'Szoftverfejlesztő és -tesztelő',
            'Turisztikai technikus'
        ]
    ],
    [
        'nev' => 'BGéSZC Eötvös Loránd Technikum',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Mechatronikai technikus']
    ],
    [
        'nev' => 'BMSZC Neumann János Informatikai Technikum',
        'url' => null,
        'szakmak' => ['Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'META – Don Bosco Technikum és Szakgimnázium',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BKSZC Gundel Károly Vendéglátó és Turisztikai Technikum',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Pesterzsébeti Technikum',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Teleki Blanka Közgazdasági Technikum',
        'url' => null,
        'szakmak' => ['Turisztikai technikus', 'Logisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Keleti Károly Közgazdasági Technikum',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Logisztikai és Kereskedelmi Technikum és Szakképző Iskola',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Váci SZC Király Endre Technikum és Szakképző Iskola',
        'url' => null,
        'szakmak' => ['Villanyszerelő']
    ],
    [
        'nev' => 'BGéSZC Mechatronikai Technikum',
        'url' => null,
        'szakmak' => ['Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Bolyai János Műszaki Technikum és Kollégium',
        'url' => null,
        'szakmak' => ['Elektronikai technikus', 'Ipari informatikai technikus']
    ],
    [
        'nev' => 'Kaesz Gyula Faipari Technikum és Szakképző Iskola',
        'url' => null,
        'szakmak' => ['Faipar (asztalos, kárpitos)']
    ],
];
