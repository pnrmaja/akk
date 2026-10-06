<?php
/**
 * includes/functions.php
 *
 * Közös segédfüggvények az egész weboldalhoz:
 *   - kimenet escape-elése (XSS elleni védelem)
 *   - képzési adatok betöltése és szűrése
 *   - ábécé szerinti rendezés és a partnerek csoportosítása
 *   - szakma-azonosítók és URL-ek előállítása
 *
 * Betöltő: includes/header.php (require_once), valamint közvetlenül a
 * szakmaink.php és a reszletek.php.
 */
declare(strict_types=1);


/* ==========================================================================
   KIMENET VÉDELME
   ========================================================================== */

/**
 * HTML-escape rövidítés. Minden dinamikus kiírásnál ezt használjuk.
 *
 * @param string $szoveg A kiírandó nyers szöveg.
 * @return string        HTML-ben biztonságosan megjeleníthető szöveg.
 */
function e(string $szoveg): string
{
    return htmlspecialchars($szoveg, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}


/* ==========================================================================
   KÉPZÉSI ADATOK
   ========================================================================== */

/**
 * Az összes képzés az includes/adatok.php fájlból.
 * A `static` változó miatt egy kérésen belül csak egyszer olvassuk be.
 *
 * @return array[] Képzések listája (lásd adatok.php a mezőkért).
 */
function kepzesek(): array
{
    static $kepzesek = null;
    return $kepzesek ??= require __DIR__ . '/adatok.php';
}

/**
 * A képzésekben szereplő egyedi települések (pl. Budapest, Kazincbarcika),
 * az adatok sorrendjében. A szűrősáv és a menü almenüje is ezt használja.
 *
 * @return string[]
 */
function varosok(): array
{
    return array_values(array_unique(array_column(kepzesek(), 'varos')));
}


/* ==========================================================================
   ABC-SORRENDEZÉS
   ========================================================================== */

/**
 * Két szöveg összehasonlítása magyar ábécé szerint (cs, gy, ly, ny, sz,
 * ty, zs külön betűként). Az intl bővítmény Collator osztályát használja;
 * ha az nincs telepítve, ékezetmentesített összehasonlításra esik vissza.
 *
 * @param string $a Az első szöveg.
 * @param string $b A második szöveg.
 * @return int      Negatív, nulla vagy pozitív, mint a strcmp().
 */
function abc_osszehasonlit(string $a, string $b): int
{
    static $collator = null;
    static $probalt  = false;

    // A Collator példányt egyszer hozzuk létre
    if (!$probalt) {
        $probalt  = true;
        $collator = class_exists('Collator') ? new Collator('hu_HU') : null;
    }

    if ($collator !== null) {
        return $collator->compare($a, $b);
    }

    // Tartalék: kisbetűsítés és ékezetek lecserélése
    $kulcs = fn(string $s): string => strtr(mb_strtolower($s, 'UTF-8'), [
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ú' => 'u', 'ü' => 'u', 'ű' => 'u',
    ]);
    return strcmp($kulcs($a), $kulcs($b));
}

/**
 * Elemek ábécé szerinti rendezése egy mező alapján (az eredeti tömb
 * változatlan marad).
 *
 * @param array[] $lista Rendezendő elemek.
 * @param string  $mezo  A rendezés alapjául szolgáló mező (pl. "nev").
 * @return array[]       A rendezett, újraindexelt lista.
 */
function abc_rendez(array $lista, string $mezo): array
{
    usort($lista, function (array $a, array $b) use ($mezo): int {
        $ertekA = isset($a[$mezo]) ? (string) $a[$mezo] : '';
        $ertekB = isset($b[$mezo]) ? (string) $b[$mezo] : '';

        return abc_osszehasonlit($ertekA, $ertekB);
    });

    return $lista;
}


/* ==========================================================================
   PARTNEREK CSOPORTOSÍTÁSA
   ========================================================================== */

/**
 * A partnerek ábécé szerint rendezve, csoportokba osztva a megjelenítéshez.
 *
 * $szakmankent = false: egyetlen, cím nélküli csoport (jelenlegi nézet).
 * $szakmankent = true:  szakmánként egy csoport (a partner opcionális
 *                       'szakmak' mezője alapján; egy partner több
 *                       csoportban is szerepelhet). A szakma nélküli
 *                       partnerek a lista végén, "Egyéb partnerek" címmel
 *                       kerülnek.
 *
 * @param array[] $partnerek    A partnereinkAdatok.php tömbje.
 * @param bool    $szakmankent  Szakmák szerinti bontás be/ki.
 * @return array[]              Csoportok: ['cim' => ?string, 'partnerek' => array[]].
 */
function partner_csoportok(array $partnerek, bool $szakmankent = false): array
{
    $partnerek = abc_rendez($partnerek, 'nev');

    if (!$szakmankent) {
        return [['cim' => null, 'partnerek' => $partnerek]];
    }

    // Partnerek gyűjtése szakmánként (a sorrend a rendezett listából öröklődik)
    $csoportok = [];
    $egyeb     = [];
    foreach ($partnerek as $partner) {
        if (empty($partner['szakmak'])) {
            $egyeb[] = $partner;
            continue;
        }
        foreach ($partner['szakmak'] as $szakma) {
            $csoportok[$szakma][] = $partner;
        }
    }

    // A csoportok is ábécé szerint követik egymást
    uksort($csoportok, fn($a, $b) => abc_osszehasonlit((string) $a, (string) $b));

    $eredmeny = [];
    foreach ($csoportok as $cim => $lista) {
        $eredmeny[] = ['cim' => (string) $cim, 'partnerek' => $lista];
    }
    if ($egyeb) {
        $eredmeny[] = ['cim' => 'Egyéb partnerek', 'partnerek' => $egyeb];
    }
    return $eredmeny;
}


/* ==========================================================================
   JOGVISZONY-SZŰRÉS
   ========================================================================== */

/**
 * A szűrhető jogviszony-típusok: kulcs => megjelenített címke.
 * A kulcs kerül az URL-be (?jogviszony=...) és a szűrési logikába.
 *
 * @return array<string,string>
 */
function jogviszony_tipusok(): array
{
    return [
        'tanuloi'        => 'Tanulói jogviszony',
        'felnottkepzesi' => 'Felnőttképzési jogviszony',
    ];
}

/**
 * Eldönti, hogy egy képzés jogviszony-mezője illeszkedik-e a típusra.
 * A mező lehet kombinált is (pl. "tanulói-, felnőttképzési jogviszony"),
 * ezért egyenlőség helyett részszöveg-egyezést vizsgálunk.
 *
 * @param string $kepzesJogviszony A képzés `jogviszony` mezője.
 * @param string $tipus            A jogviszony_tipusok() egyik kulcsa.
 * @return bool                    Igaz, ha a képzés megfelel a típusnak.
 */
function jogviszony_illeszkedik(string $kepzesJogviszony, string $tipus): bool
{
    return match ($tipus) {
        'tanuloi'        => str_contains($kepzesJogviszony, 'tanulói'),
        'felnottkepzesi' => str_contains($kepzesJogviszony, 'felnőttképzési'),
        default          => true,
    };
}

/**
 * Képzések szűrése településre és/vagy jogviszonyra.
 * A két szűrő egymástól függetlenül kombinálható. Az eredmény a szakma
 * neve szerint ábécé sorrendben van.
 *
 * @param string|null $varos      Település neve; null = nincs szűrés.
 * @param string|null $jogviszony Jogviszony-kulcs; null = nincs szűrés.
 * @return array[]                A szűrt, ábécé szerint rendezett lista.
 */
function szurt_kepzesek(?string $varos, ?string $jogviszony = null): array
{
    $lista = kepzesek();

    // Településre szűrés
    if ($varos !== null) {
        $lista = array_filter($lista, fn(array $k) => $k['varos'] === $varos);
    }

    // Jogviszonyra szűrés
    if ($jogviszony !== null) {
        $lista = array_filter($lista, fn(array $k) => jogviszony_illeszkedik($k['jogviszony'], $jogviszony));
    }

    // Alapértelmezett sorrend: a szakma neve szerint ábécében
    return abc_rendez(array_values($lista), 'nev');
}


/* ==========================================================================
   URL-EK ÉS AZONOSÍTÓK
   ========================================================================== */

/**
 * A szakmaink.php szűrőlinkjeinek URL-je. Az egyik szűrő módosításakor
 * a másik szűrő értéke megmarad.
 *
 * @param string|null $varos      Település; null = kimarad az URL-ből.
 * @param string|null $jogviszony Jogviszony-kulcs; null = kimarad az URL-ből.
 * @return string                 Pl. "szakmaink.php?varos=Budapest".
 */
function szakma_szuro_url(?string $varos, ?string $jogviszony): string
{
    $params = [];

    if ($varos !== null) {
        $params['varos'] = $varos;
    }
    if ($jogviszony !== null) {
        $params['jogviszony'] = $jogviszony;
    }

    return $params ? ('szakmaink.php?' . http_build_query($params)) : 'szakmaink.php';
}

/**
 * A szakma URL-barát azonosítója: "4 0722 08 01" → "4-0722-08-01".
 *
 * @param array $kepzes Egy képzés az adatok.php-ból.
 */
function szakma_id(array $kepzes): string
{
    return str_replace(' ', '-', $kepzes['azonosito']);
}

/**
 * A szakma részletek oldalának URL-je (reszletek.php?id=...).
 *
 * @param array $kepzes Egy képzés az adatok.php-ból.
 */
function szakma_url(array $kepzes): string
{
    return 'reszletek.php?id=' . rawurlencode(szakma_id($kepzes));
}

/**
 * Képzés keresése az URL-ben kapott azonosító alapján.
 *
 * @param string $id URL-barát azonosító (lásd szakma_id()).
 * @return array|null A talált képzés, vagy null, ha nincs ilyen.
 */
function kepzes_azonosito_alapjan(string $id): ?array
{
    foreach (kepzesek() as $kepzes) {
        if (szakma_id($kepzes) === $id) {
            return $kepzes;
        }
    }
    return null;
}


/* ==========================================================================
   SZAKMA RÉSZLETES LEÍRÁSA
   ========================================================================== */

/**
 * Egy szakma részletes leírás-blokkjai az includes/reszletekAdatok.php-ból.
 * A tömb kulcsa a szakma eredeti azonosítója (szóközökkel, pl. "4 0722 08 01").
 *
 * @param string $azonosito A szakma `azonosito` mezője.
 * @return array            Blokkok [típus, tartalom] formában; üres, ha nincs.
 */
function kepzes_reszletek(string $azonosito): array
{
    static $reszletek = null;
    $reszletek ??= require __DIR__ . '/reszletekAdatok.php';
    return $reszletek[$azonosito] ?? [];
}
