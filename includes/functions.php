<?php
declare(strict_types=1);

/** HTML-escape rövidítés – minden kiírt szöveghez használd. */
function e(string $szoveg): string
{
    return htmlspecialchars($szoveg, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Az összes képzés (egyszer töltjük be a kérés alatt). */
function kepzesek(): array
{
    static $kepzesek = null;
    return $kepzesek ??= require __DIR__ . '/adatok.php';
}

/** A képzésekben szereplő települések (Budapest, Kazincbarcika…). */
function varosok(): array
{
    return array_values(array_unique(array_column(kepzesek(), 'varos')));
}

/**
 * A szűrhető jogviszony-típusok: kulcs => megjelenítendő címke.
 * A kulcsot használjuk a lekérdezési paraméterben és a szűrésben.
 */
function jogviszony_tipusok(): array
{
    return [
        'tanuloi'        => 'Tanulói jogviszony',
        'felnottkepzesi' => 'Felnőttképzési jogviszony',
    ];
}

/**
 * Illeszkedik-e egy képzés jogviszony-mezője a kiválasztott típusra.
 * A mezőben előfordulhat kombinált érték (pl. "tanulói-, felnőttképzési
 * jogviszony"), ezért részszöveg-egyezést vizsgálunk, nem egyenlőséget.
 */
function jogviszony_illeszkedik(string $kepzesJogviszony, string $tipus): bool
{
    return match ($tipus) {
        'tanuloi'        => str_contains($kepzesJogviszony, 'tanulói'),
        'felnottkepzesi' => str_contains($kepzesJogviszony, 'felnőttképzési'),
        default          => true,
    };
}

/** Képzések szűrése településre és/vagy jogviszonyra; null = nincs szűrés az adott dimenzióban. */
function szurt_kepzesek(?string $varos, ?string $jogviszony = null): array
{
    $lista = kepzesek();

    if ($varos !== null) {
        $lista = array_filter($lista, fn(array $k) => $k['varos'] === $varos);
    }

    if ($jogviszony !== null) {
        $lista = array_filter($lista, fn(array $k) => jogviszony_illeszkedik($k['jogviszony'], $jogviszony));
    }

    return array_values($lista);
}

/** A szakmaink.php szűrőlinkjeinek URL-je, a másik szűrő megtartásával. */
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


/** A szakma URL-barát azonosítója: "4 0722 08 01" → "4-0722-08-01". */
function szakma_id(array $kepzes): string
{
    return str_replace(' ', '-', $kepzes['azonosito']);
}

/** A szakma részletek oldalának URL-je. */
function szakma_url(array $kepzes): string
{
    return 'reszletek.php?id=' . rawurlencode(szakma_id($kepzes));
}

/** Képzés keresése az URL-ben kapott azonosító alapján; null, ha nincs ilyen. */
function kepzes_azonosito_alapjan(string $id): ?array
{
    foreach (kepzesek() as $kepzes) {
        if (szakma_id($kepzes) === $id) {
            return $kepzes;
        }
    }
    return null;
}

/** Egy szakma részletes leírás-blokkjai (includes/reszletekAdatok.php); üres tömb, ha nincs. */
function kepzes_reszletek(string $azonosito): array
{
    static $reszletek = null;
    $reszletek ??= require __DIR__ . '/reszletekAdatok.php';
    return $reszletek[$azonosito] ?? [];
}
