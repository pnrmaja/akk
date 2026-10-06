<?php
/**
 * includes/partnereinkAdatok.php
 *
 * A Partnereink oldal adatai.
 *
 * Mezők:
 *   nev  - partner neve
 *   url  - hivatalos weboldal
 *
 * Ha egy partnerhez nem sikerült egyértelműen azonosítani
 * a hivatalos weboldalt, akkor az url értéke null marad.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | ISKOLAI PARTNEREK
    |--------------------------------------------------------------------------
    */

    'iskolak' => [

        'Informatikai rendszer- és alkalmazásüzemeltető technikus' => [

            [
                'nev' => 'BMSZC Bláthy Ottó Titusz Informatikai Technikum',
                'url' => 'https://blathy.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Puskás Tivadar Távközlési és Informatikai Technikum',
                'url' => 'https://puskas.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Than Károly Technikum és Szakképző Iskola Wesselényi Miklós Telephelye',
                'url' => 'https://wesselenyi.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Egressy Gábor Két Tanítási Nyelvű Technikum',
                'url' => 'https://egressy.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Pataky István Híradásipari és Informatikai Technikum',
                'url' => 'https://pataky.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Trefort Ágoston Két Tanítási Nyelvű Technikum',
                'url' => 'https://trefort.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Újpesti Két Tanítási Nyelvű Műszaki Technikum',
                'url' => null
            ],

            [
                'nev' => 'SZÁMALK - Szalézi Technikum és Szakgimnázium',
                'url' => 'https://www.szamalk-szalezi.hu/'
            ],

            [
                'nev' => 'BGéSZC Eötvös Loránd Technikum',
                'url' => null
            ],
        ],


        'Szoftverfejlesztő és -tesztelő' => [

            [
                'nev' => 'SZÁMALK - Szalézi Technikum és Szakgimnázium',
                'url' => 'https://www.szamalk-szalezi.hu/'
            ],

            [
                'nev' => 'BMSZC Neumann János Informatikai Technikum',
                'url' => 'https://neumann.bmszc.hu/'
            ],
        ],


        'Turisztikai technikus' => [

            [
                'nev' => 'META – Don Bosco Technikum és Szakgimnázium',
                'url' => null
            ],

            [
                'nev' => 'BKSZC Gundel Károly Vendéglátó és Turisztikai Technikum',
                'url' => 'https://edir.gundel-bp.edu.hu/'
            ],

            [
                'nev' => 'BGSZC Pesterzsébeti Technikum',
                'url' => null
            ],

            [
                'nev' => 'BGSZC Teleki Blanka Közgazdasági Technikum',
                'url' => 'https://telekiblankabp.hu/'
            ],

            [
                'nev' => 'SZÁMALK - Szalézi Technikum és Szakgimnázium',
                'url' => 'https://www.szamalk-szalezi.hu/'
            ],
        ],


        'Logisztikai technikus' => [

            [
                'nev' => 'BGSZC Keleti Károly Közgazdasági Technikum',
                'url' => 'https://keletiszki.hu/'
            ],

            [
                'nev' => 'BGSZC Logisztikai és Kereskedelmi Technikum és Szakképző Iskola',
                'url' => 'https://www.logiker.hu/'
            ],

            [
                'nev' => 'BGSZC Teleki Blanka Közgazdasági Technikum',
                'url' => 'https://telekiblankabp.hu/'
            ],
        ],


        'Villanyszerelő' => [

            [
                'nev' => 'Váci SZC Király Endre Technikum és Szakképző Iskola',
                'url' => 'https://kiralyendre.hu/'
            ],
        ],


        'Elektronikai technikus' => [

            [
                'nev' => 'BGéSZC Mechatronikai Technikum',
                'url' => null
            ],

            [
                'nev' => 'BMSZC Than Károly Technikum és Szakképző Iskola Wesselényi Miklós Telephelye',
                'url' => 'https://wesselenyi.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Trefort Ágoston Két Tanítási Nyelvű Technikum',
                'url' => 'https://trefort.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Egressy Gábor Két Tanítási Nyelvű Technikum',
                'url' => 'https://egressy.bmszc.hu/'
            ],

            [
                'nev' => 'BMSZC Újpesti Két Tanítási Nyelvű Műszaki Technikum',
                'url' => null
            ],

            [
                'nev' => 'BMSZC Bolyai János Műszaki Technikum és Kollégium',
                'url' => 'https://bolyai.bmszc.hu/'
            ],
        ],


        'Mechatronikai technikus' => [

            [
                'nev' => 'BGéSZC Eötvös Loránd Technikum',
                'url' => null
            ],
        ],


        'FAIPAR (asztalos, kárpitos)' => [

            [
                'nev' => 'Kaesz Gyula Faipari Technikum és Szakképző Iskola',
                'url' => 'https://www.kaesz.hu/'
            ],
        ],


        'Ipari informatikai technikus' => [

            [
                'nev' => 'BMSZC Bolyai János Műszaki Technikum és Kollégium',
                'url' => 'https://bolyai.bmszc.hu/'
            ],
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | GYAKORLATI KÉPZŐHELYEK
    |--------------------------------------------------------------------------
    */

    'cegek' => [

        'Informatikai rendszer- és alkalmazásüzemeltető technikus' => [

            [
                'nev' => 'All4Office',
                'url' => 'https://www.all4office.hu/'
            ],

            [
                'nev' => 'Benkő István Református Általános Iskola és Gimnázium',
                'url' => 'https://benkorefi.hu/'
            ],

            [
                'nev' => 'Csömör Nagyközség Önkormányzata',
                'url' => 'https://www.csomor.hu/'
            ],

            [
                'nev' => 'Ferencvárosi Egészségügyi Szolgálat',
                'url' => null
            ],

            [
                'nev' => 'HungaroControl Zrt.',
                'url' => 'https://www.hungarocontrol.hu/'
            ],

            [
                'nev' => 'Hungaropharma Zrt.',
                'url' => 'https://hungaropharma.hu/'
            ],

            [
                'nev' => 'Lanmen Informatika Kft.',
                'url' => 'https://lanmen.hu/'
            ],

            [
                'nev' => 'Mária Rádió Közhasznú Egyesület',
                'url' => 'https://www.mariaradio.hu/'
            ],

            [
                'nev' => 'Élelmiszerlánc-biztonsági Centrum Nonprofit Kft.',
                'url' => 'https://elbc.hu/'
            ],

            [
                'nev' => 'Pázmány Péter Katolikus Egyetem',
                'url' => 'https://ppke.hu/'
            ],

            [
                'nev' => 'P.U.B. Kft.',
                'url' => null
            ],

            [
                'nev' => 'Special Effects Zrt.',
                'url' => null
            ],

            [
                'nev' => 'SZÁMALK-Szalézi Technikum és Szakgimnázium',
                'url' => 'https://www.szamalk-szalezi.hu/'
            ],

            [
                'nev' => 'Újpesti Egészségközpont',
                'url' => 'https://www.ujpestiszakrendelo.hu/'
            ],

            [
                'nev' => 'One Magyarország Zrt.',
                'url' => 'https://www.one.hu/'
            ],

            [
                'nev' => 'Váci Jávorszky Ödön Kórház',
                'url' => 'https://www.javorszky.hu/'
            ],

            [
                'nev' => 'Filia Kereskedelmi és Szolgáltató Kft.',
                'url' => null
            ],

            [
                'nev' => 'Újhartyáni Általános Iskola',
                'url' => 'https://nemetiskola.hu/'
            ],

            [
                'nev' => 'Wildom Informatikai Szolgáltató és Tanácsadó Kft.',
                'url' => 'https://wildom.com/'
            ],

            [
                'nev' => 'DPD Hungary Kft.',
                'url' => 'https://www.dpd.com/hu/hu/'
            ],

            [
                'nev' => 'Apor Vilmos Katolikus Főiskola',
                'url' => 'https://avkf.hu/'
            ],

            [
                'nev' => 'Euro-Profil Kft.',
                'url' => 'https://office.europrofil.hu/'
            ],

            [
                'nev' => 'MOL',
                'url' => 'https://www.mol.hu/'
            ],

            [
                'nev' => 'Magyar Máltai Szeretetszolgálat Egyesület',
                'url' => 'https://www.maltai.hu/'
            ],

            [
                'nev' => 'C.S. Informatikai rendszerek Kft.',
                'url' => 'https://csinfo.hu/'
            ],
        ],


        'Szoftverfejlesztő és -tesztelő' => [

            [
                'nev' => 'Újhartyáni Általános Iskola',
                'url' => 'https://nemetiskola.hu/'
            ],

            [
                'nev' => 'Wildom Informatikai Szolgáltató és Tanácsadó Kft.',
                'url' => 'https://wildom.com/'
            ],

            [
                'nev' => 'DPD Hungary Kft.',
                'url' => 'https://www.dpd.com/hu/hu/'
            ],

            [
                'nev' => 'Apor Vilmos Katolikus Főiskola',
                'url' => 'https://avkf.hu/'
            ],

            [
                'nev' => 'Euro-Profil Kft.',
                'url' => 'https://office.europrofil.hu/'
            ],

            [
                'nev' => 'MOL',
                'url' => 'https://www.mol.hu/'
            ],

            [
                'nev' => 'Magyar Máltai Szeretetszolgálat Egyesület',
                'url' => 'https://www.maltai.hu/'
            ],

            [
                'nev' => 'C.S. Informatikai rendszerek Kft.',
                'url' => 'https://csinfo.hu/'
            ],

            [
                'nev' => 'NeO Rendszerház Kft.',
                'url' => 'https://neo-rendszerhaz.hu/'
            ],

            [
                'nev' => 'Nokia Solutions and Networks Kft.',
                'url' => 'https://www.nokia.com/'
            ],
        ],


        'Turisztikai technikus' => [

            [
                'nev' => 'Esztergomi Bazilika',
                'url' => 'https://bazilika-esztergom.hu/'
            ],

            [
                'nev' => 'Szent Adalbert Központ',
                'url' => 'https://www.szentadalbert.hu/'
            ],

            [
                'nev' => 'Prímás Pince',
                'url' => 'https://www.primaspince.hu/'
            ],

            [
                'nev' => 'Hotel Adalbert',
                'url' => 'https://hoteladalbert.hu/'
            ],

            [
                'nev' => 'Mátyás-templom',
                'url' => 'https://matyas-templom.hu/'
            ],

            [
                'nev' => 'Szent István Bazilika',
                'url' => 'https://www.bazilika.biz/hu'
            ],

            [
                'nev' => 'D50',
                'url' => 'https://www.d50.hu/'
            ],

            [
                'nev' => 'Péliföldszentkereszt-Gerecse Natúrpark Látogatóközpont',
                'url' => null
            ],

            [
                'nev' => 'Szent Arnold Lelkigyakorlatos Ház',
                'url' => null
            ],

            [
                'nev' => 'Cityrama',
                'url' => null
            ],
        ],


        'Logisztikai technikus' => [

            [
                'nev' => 'BuildLog Profirent Gépkölcsönző Kft.',
                'url' => null
            ],

            [
                'nev' => 'Hopi Global Solution',
                'url' => 'https://hopiglobal.eu/hu/'
            ],

            [
                'nev' => 'TERRA Hungária Építőgép Kft.',
                'url' => 'https://www.terra-world.hu/'
            ],

            [
                'nev' => 'HOPI Hungária Kft.',
                'url' => 'https://hopiglobal.eu/hu/'
            ],

            [
                'nev' => 'Miller Logisztika',
                'url' => 'https://millerlogisztika.hu/'
            ],

            [
                'nev' => 'Profirent Gépkölcsönző Kft.',
                'url' => 'https://www.profirent.hu/'
            ],

            [
                'nev' => 'RaorgTrans',
                'url' => null
            ],

            [
                'nev' => 'TRANSDANUBIA Logisztikai Kft.',
                'url' => null
            ],

            [
                'nev' => 'Copy Depo',
                'url' => 'https://copydepo.hu/'
            ],

            [
                'nev' => 'Orink Hungaria',
                'url' => null
            ],

            [
                'nev' => 'Lando Eurasia Kft.',
                'url' => 'https://lando.hu/'
            ],

            [
                'nev' => 'HILLTOP LOGISZTIKAI Kft.',
                'url' => 'https://hilltoplog.hu/'
            ],

            [
                'nev' => 'László Trans',
                'url' => null
            ],

            [
                'nev' => 'Logmaster Kft.',
                'url' => null
            ],

            [
                'nev' => 'Sebestyén Intertransport Kft.',
                'url' => null
            ],

            [
                'nev' => 'DCS Juicer Kft.',
                'url' => null
            ],

            [
                'nev' => 'UNICRANES',
                'url' => 'https://unicranes.hu/'
            ],

            [
                'nev' => 'FestiPay Zrt.',
                'url' => null
            ],

            [
                'nev' => 'Szido Kft.',
                'url' => null
            ],

            [
                'nev' => 'SZERVIZ-TRANS Kft.',
                'url' => null
            ],
        ],


        'Mechatronikai technikus' => [

            [
                'nev' => 'TERRA Hungária Építőgép Kft.',
                'url' => 'https://www.terra-world.hu/'
            ],

            [
                'nev' => 'RESRG Automotive HU Kft.',
                'url' => 'https://www.resrgautomotive.com/'
            ],
        ],
    ],
];