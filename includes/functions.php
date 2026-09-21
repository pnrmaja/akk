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

/** Képzések szűrése településre; null = mind. */
function szurt_kepzesek(?string $varos): array
{
    if ($varos === null) {
        return kepzesek();
    }
    return array_values(array_filter(
        kepzesek(),
        fn(array $k) => $k['varos'] === $varos
    ));
}
