<?php
/**
 * includes/partnereinkAdatok.php
 *
 * A Partnereink oldal (partnereink.php) adatai. Mezők:
 *   nev     - a partner neve
 *   url     - a partner weboldala; null, ha nincs (ilyenkor sima szövegként jelenik meg)
 *   szakmak - opcionális: azon szakmák nevei (az adatok.php 'nev' mezői), amelyekhez
 *             a partner tartozik, pl. 'szakmak' => ['Villanyszerelő', 'Asztalos'].
 *             Egy partner több szakmánál is szerepelhet. Az oldal ezek szerint
 *             blokkokra bontja a listát (partnereink.php, $SZAKMANKENT = true);
 *             a 'szakmak' nélküli partnerek az "Egyéb partnerek" blokkba kerülnek.
 *             Forrás: Együttműködő cégek (iskolák nélkül), 2026 ősz.
 *
 * Új partner felvétele: új elem a tömbbe, tetszőleges helyre. A sorrend nem
 * számít: az oldal a partnereket automatikusan ábécé sorrendben jeleníti meg.
 */
declare(strict_types=1);

return [
    [
        'nev' => 'C.S. Informatikai Rendszerek Kft.',
        'url' => 'https://csinfo.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Invitech',
        'url' => 'https://www.invitech.hu/'
    ],
    [
        'nev' => 'Herman Ottó Intézet Nonprofit Kft.',
        'url' => 'https://www.hermanottointezet.hu/'
    ],
    [
        'nev' => 'Lanmen Informatika Kft.',
        'url' => 'https://lanmen.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Benkő István Református Általános Iskola és Gimnázium',
        'url' => 'https://benkorefi.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Nemzeti Élelmiszerlánc-biztonsági Hivatal',
        'url' => 'https://portal.nebih.gov.hu/'
    ],
    [
        'nev' => 'ACE Network Zrt.',
        'url' => 'https://acenet.tech/'
    ],
    [
        'nev' => 'Tree Rendszerház Kft.',
        'url' => null
    ],
    [
        'nev' => 'NeO Rendszerház Kft.',
        'url' => 'https://neo-rendszerhaz.hu/',
        'szakmak' => ['Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Wildom Informatikai Szolgáltató és Tanácsadó Kft.',
        'url' => 'https://wildom.com/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'PaGeTo IT Kft.',
        'url' => null
    ],
    [
        'nev' => 'Poli Computer PC Kft.',
        'url' => 'https://www.policomputer.hu/'
    ],
    [
        'nev' => 'Prémium Egészségpénztár',
        'url' => 'https://premiumegeszsegpenztar.hu/'
    ],
    [
        'nev' => 'NISZ Zrt.',
        'url' => 'https://nisz.hu/'
    ],
    [
        'nev' => 'Budapest Gyógyfürdői és Hévizei Zrt.',
        'url' => 'https://www.budapestgyogyfurdoi.hu/'
    ],
    [
        'nev' => 'FLORCONTROLL-SERVICE Kft.',
        'url' => null
    ],
    [
        'nev' => 'SZÁMALK-Szalézi Technikum és Szakgimnázium',
        'url' => 'https://www.szamalk-szalezi.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'MOL Campus',
        'url' => 'https://www.molcampus.hu/'
    ],
    [
        'nev' => 'Német Nemzetiségi Gimnázium és Kollégium',
        'url' => 'https://nemetiskola.hu/'
    ],
    [
        'nev' => 'Prompt',
        'url' => 'https://www.prompt.hu/'
    ],
    [
        'nev' => 'Mária Rádió Közhasznú Egyesület',
        'url' => 'https://www.mariaradio.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Hungaropharma Zrt.',
        'url' => 'https://hungaropharma.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Apor Vilmos Katolikus Főiskola',
        'url' => 'https://avkf.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'FOXPOST',
        'url' => 'https://foxpost.hu/'
    ],
    [
        'nev' => 'Pasaréti Közösségi Ház',
        'url' => 'https://pasaretikozossegihaz.hu/'
    ],
    [
        'nev' => 'Mátyás-templom',
        'url' => 'https://matyas-templom.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Szent István Bazilika',
        'url' => 'https://www.bazilika.biz/hu',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'D50',
        'url' => 'https://www.d50.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Esztergomi Bazilika',
        'url' => 'https://bazilika-esztergom.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Szent Adalbert Központ',
        'url' => 'https://www.szentadalbert.hu/hu/index.php/hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Prímás Pince',
        'url' => 'https://www.primaspince.hu/hu/index.php/hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Visit Esztergom-Budapest',
        'url' => 'https://www.visitesztergom-budapest.hu/'
    ],
    [
        'nev' => 'All4Office',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Csömör Nagyközség Önkormányzata',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Ferencvárosi Egészségügyi Szolgálat',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'HungaroControl Zrt.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Élelmiszerlánc-biztonsági Centrum Nonprofit Kft. (ÉLBC Kft.)',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Pázmány Péter Katolikus Egyetem',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'P.U.B. Kft.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Special Effects Zrt.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Újpesti Egészségközpont',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'One Magyarország Zrt.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Váci Jávorszky Ödön Kórház',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Filia Kereskedelmi és Szolgáltató Kft.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Újhartyáni Általános Iskola',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'DPD Hungary Kft.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Euro-Profil Kft.',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'MOL',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Magyar Máltai Szeretetszolgálat Egyesület',
        'url' => null,
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Nokia Solutions and Networks Kft.',
        'url' => null,
        'szakmak' => ['Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Hotel Adalbert',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Péliföldszentkereszt- Gerecse Natúrpark Látogatóközpont',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Szent Arnold Lelkigyakorlatos Ház',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Cityrama',
        'url' => null,
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BuildLog',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Hopi Global Solution',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'HOPI Hungária Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Miller Logisztika',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Profirent Gépkölcsönző Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus', 'Mechatronikai technikus']
    ],
    [
        'nev' => 'RaorgTrans',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'TERRA Hungária Építőgép Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus', 'Mechatronikai technikus']
    ],
    [
        'nev' => 'TRANSDANUBIA Logisztikai Kft',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Copy Depo',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Orink Hungaria',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Lando Eurasia Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'HILLTOP LOGISZTIKAI Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'László Trans',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Logmaster Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Sebestyén Intertransport Kft',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'DCS Juicer Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'UNICRANES',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'FestiPay Zrt.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Szido Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'SZERVIZ-TRANS Kft.',
        'url' => null,
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'RESRG Automotive HU Kft.',
        'url' => null,
        'szakmak' => ['Mechatronikai technikus']
    ]
];
