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
        'nev' => 'SZÁMALK-Szalézi Technikum és Szakgimnázium',
        'url' => 'https://www.szamalk-szalezi.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
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
        'url' => 'https://www.visitesztergom-budapest.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'All4Office',
        'url' => 'https://www.all4office.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Csömör Nagyközség Önkormányzata',
        'url' => 'https://csomor.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Ferencvárosi Egészségügyi Szolgálat',
        'url' => 'https://feszrendelo.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'HungaroControl Zrt.',
        'url' => 'https://www.hungarocontrol.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Élelmiszerlánc-biztonsági Centrum Nonprofit Kft. (ÉLBC Kft.)',
        'url' => 'https://www.elbc.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Pázmány Péter Katolikus Egyetem',
        'url' => 'https://ppke.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'P.U.B. Kft.',
        'url' => 'https://www.nemzeticegtar.hu/pub-kft-e10265569.html',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Special Effects Zrt.',
        'url' => 'https://www.nemzeticegtar.hu/special-effects-zrt-e10482564.html',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Újpesti Egészségközpont',
        'url' => 'https://www.ujpestiszakrendelo.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'One Magyarország Zrt.',
        'url' => 'https://www.one.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Váci Jávorszky Ödön Kórház',
        'url' => 'https://www.javorszky.hu/wordpress/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Filia Kereskedelmi és Szolgáltató Kft.',
        'url' => 'https://filiakft.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus']
    ],
    [
        'nev' => 'Újhartyáni Általános Iskola',
        'url' => 'https://nemetiskola.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'DPD Hungary Kft.',
        'url' => 'https://www.dpd.com/hu/hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Euro-Profil Kft.',
        'url' => 'https://europrofil.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'MOL',
        'url' => 'https://mol.hu/hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Magyar Máltai Szeretetszolgálat Egyesület',
        'url' => 'https://www.maltai.hu/',
        'szakmak' => ['Informatikai rendszer- és alkalmazás-üzemeltető technikus', 'Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Nokia Solutions and Networks Kft.',
        'url' => 'https://www.nokia.com/',
        'szakmak' => ['Szoftverfejlesztő és -tesztelő']
    ],
    [
        'nev' => 'Hotel Adalbert',
        'url' => 'https://www.hoteladalbert.hu/index.php/hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Péliföldszentkereszt- Gerecse Natúrpark Látogatóközpont',
        'url' => 'https://www.pelifoldszentkereszt.hu/?utm_source=gmb&utm_medium=referral',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Szent Arnold Lelkigyakorlatos Ház',
        'url' => 'https://www.szentarnold.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'Cityrama',
        'url' => 'https://www.cityrama.hu/',
        'szakmak' => ['Turisztikai technikus']
    ],
    [
        'nev' => 'BuildLog',
        'url' => 'https://build-log.hu/en/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Hopi Global Solution',
        'url' => 'https://hopiglobal.eu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'HOPI Hungária Kft.',
        'url' => 'https://hopilogistics.eu/hu-HU',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Miller Logisztika',
        'url' => 'https://millerlogisztika.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Profirent Gépkölcsönző Kft.',
        'url' => 'https://www.profirent.hu/?gad_source=1&gad_campaignid=15146390380&gbraid=0AAAAADzzPc9qLWsu1DNmwDty5d6KUljtt&gclid=CjwKCAjwrbfWBhAeEiwAc2e6PqKsMgDq0ZDzhvI8DtwjXfJjwLzehnbWOEGlcuOLRkiRpnxTCnsa6xoCiIsQAvD_BwE',
        'szakmak' => ['Logisztikai technikus', 'Mechatronikai technikus']
    ],
    [
        'nev' => 'RaorgTrans',
        'url' => 'https://raorgtrans.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'TERRA Hungária Építőgép Kft.',
        'url' => 'https://www.terra-world.hu/?gad_source=1&gad_campaignid=12349471189&gbraid=0AAAAADRfTzzNN9pfjcnBHTwPtsGXNPGcd&gclid=CjwKCAjwrbfWBhAeEiwAc2e6PriT_W8h-fWUcCxptpckpQ8oamdKynb2n-JQQfC6rJEqKrMlCUiv6RoCKxoQAvD_BwE',
        'szakmak' => ['Logisztikai technikus', 'Mechatronikai technikus']
    ],
    [
        'nev' => 'TRANSDANUBIA Logisztikai Kft',
        'url' => 'https://transdanubia.eu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Copy Depo',
        'url' => 'https://copydepo.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Orink Hungaria',
        'url' => 'https://orink.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Lando Eurasia Kft.',
        'url' => 'https://lando.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'HILLTOP LOGISZTIKAI Kft.',
        'url' => 'https://hilltoplog.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'László Trans',
        'url' => 'https://hosziget.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Logmaster Kft.',
        'url' => 'https://www.logmaster.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Sebestyén Intertransport Kft',
        'url' => 'https://nemzetkoziszallitas.eu/?gad_source=1&gad_campaignid=1641239202&gbraid=0AAAAADdkmx_a8Lz6k3otOh4QX68u6SSnU&gclid=CjwKCAjwrbfWBhAeEiwAc2e6PqyfLSVXac0JCMrXX_P0CBWXyITROfyoiPyLczWyxNSKST9KQcLOPBoC8jkQAvD_BwE',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'DCS Juicer Kft.',
        'url' => 'https://www.dcsjuicer.com/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'UNICRANES',
        'url' => 'https://unicranes.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'FestiPay Zrt.',
        'url' => 'https://festipay.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'Szido Kft.',
        'url' => 'https://esbe.eu/group/contact/europe/hungary/szido-kft',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'SZERVIZ-TRANS Kft.',
        'url' => 'https://kontenersitt.hu/',
        'szakmak' => ['Logisztikai technikus']
    ],
    [
        'nev' => 'RESRG Automotive HU Kft.',
        'url' => 'https://www.facebook.com/wujhartyan/',
        'szakmak' => ['Mechatronikai technikus']
    ],

    //ideiglenesen kikommentezve aamíg a kategória nincsen hozzájuk
    /*[
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
        'nev' => 'FOXPOST',
        'url' => 'https://foxpost.hu/'
    ],
    [
        'nev' => 'Pasaréti Közösségi Ház',
        'url' => 'https://pasaretikozossegihaz.hu/'
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
        'nev' => 'PaGeTo IT Kft.',
        'url' => 'https://www.ceginformacio.hu/cr9312212073'
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
        'nev' => 'Invitech',
        'url' => 'https://www.invitech.hu/'
    ],
    [
        'nev' => 'Herman Ottó Intézet Nonprofit Kft.',
        'url' => 'https://www.hermanottointezet.hu/'
    ],*/
];
