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


