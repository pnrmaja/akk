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
        'url' => 'https://blathy.bmszc.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'BMSZC Puskás Tivadar Távközlési és Informatikai Technikum',
        'url' => 'https://www.puskas.hu/100/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'BMSZC Than Károly Technikum és Szakképző Iskola Wesselényi Miklós Telephelye',
        'url' => 'https://wesselenyi.bmszc.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Egressy Gábor Két Tanítási Nyelvű Technikum',
        'url' => 'https://egressy.bmszc.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Pataky István Híradásipari és Informatikai Technikum',
        'url' => 'https://www.pataky.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'BMSZC Trefort Ágoston Két Tanítási Nyelvű Technikum',
        'url' => 'https://trefort.bmszc.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Újpesti Két Tanítási Nyelvű Műszaki Technikum',
        'url' => 'https://edir.umszki.hu/',
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
        'nev' => 'BGSZC Eötvös Loránd Technikum',
        'url' => 'https://www.eotvosszki.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Mechatronikai technikus']
    ],
    [
        'nev' => 'BMSZC Neumann János Informatikai Technikum',
        'url' => 'https://neumann.bmszc.hu/',
        'szakmak' => ['Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'META – Don Bosco Technikum és Szakgimnázium',
        'url' => 'https://metakepzes.hu/?gad_source=1&gad_campaignid=20738501036&gbraid=0AAAAABrNwA9scxtc5smjlM640FNFhLgws&gclid=CjwKCAjwrbfWBhAeEiwAc2e6PipxQfTWGyQisHsQtg4_0-EAUknwpJeOzDpQtMkZcrKAkJ9F9_ODiBoC2lwQAvD_BwE',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BKSZC Gundel Károly Vendéglátó és Turisztikai Technikum',
        'url' => 'https://gundeliskola.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Pesterzsébeti Technikum',
        'url' => 'https://pekszi.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Teleki Blanka Közgazdasági Technikum',
        'url' => 'https://telekiblankabp.hu/',
        'szakmak' => ['Turisztikai technikus', 'Logisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Keleti Károly Közgazdasági Technikum',
        'url' => 'https://keletiszki.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'BGSZC Logisztikai és Kereskedelmi Technikum és Szakképző Iskola',
        'url' => 'https://logiker.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Váci SZC Király Endre Technikum és Szakképző Iskola',
        'url' => 'https://kiralyendre.hu/',
        'szakmak' => ['Villanyszerelő']
    ],
    [
        'nev' => 'BGéSZC Mechatronikai Technikum',
        'url' => 'https://mechatronika.hu/',
        'szakmak' => ['Elektronikai technikus']
    ],
    [
        'nev' => 'BMSZC Bolyai János Műszaki Technikum és Kollégium',
        'url' => 'https://bolyai-bp.edu.hu/',
        'szakmak' => ['Elektronikai technikus', 'Ipari informatikai technikus']
    ],
    [
        'nev' => 'Kaesz Gyula Faipari Technikum és Szakképző Iskola',
        'url' => 'https://kaesz.hu/',
        'szakmak' => ['Faipar (asztalos, kárpitos)']
    ],
];
