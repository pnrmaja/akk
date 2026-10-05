<?php
/**
 * includes/nav.php
 *
 * A főmenü adatai és kirajzolása.
 *   - menu_adatok()   : a menü fastruktúrája (egyetlen helyen karbantartva)
 *   - menu_kirajzol() : rekurzívan <ul>/<li> listává alakítja a fát
 *
 * Betöltő: includes/header.php. Az e() és a varosok() függvényt a
 * functions.php adja, ezért azt előbb be kell tölteni.
 */
declare(strict_types=1);


/**
 * A menü fastruktúrája.
 *
 * Egy elem: ['label' => felirat, 'href' => cél, 'children' => [almenü...]].
 * A 'href' elhagyható (ekkor '#' lesz), a 'children' tetszőleges mélységű.
 *
 * @return array[]
 */
function menu_adatok(): array
{
    // A "Szakmáink" almenüje dinamikus: minden településből egy link,
    // így új település felvételekor a menü automatikusan bővül.
    $szakmaGyerekek = [];
    foreach (varosok() as $varos) {
        $szakmaGyerekek[] = [
            'label' => $varos,
            'href'  => 'szakmaink.php?varos=' . rawurlencode($varos),
        ];
    }

    return [
        ['label' => 'Főoldal', 'href' => 'index.php'],

        ['label' => 'Rólunk', 'children' => [
            ['label' => 'Bemutatkozás',    'href' => 'bemutatkozas.php'],
            ['label' => 'Duális képzés',   'href' => 'dualisKepzes.php'],
            ['label' => 'Képzőközpontunk', 'href' => '#'], // Még nincs hozzá oldal
        ]],

        ['label' => 'Képzéseink', 'children' => [
            ['label' => 'Szakmáink', 'href' => 'szakmaink.php', 'children' => $szakmaGyerekek],
        ]],

        ['label' => 'Partnereink', 'href' => 'partnereink.php'],
        ['label' => 'Híreink',     'href' => 'hireink.php'],
        ['label' => 'Galéria',     'href' => 'galeria.php'],
        ['label' => 'Kapcsolat',   'href' => 'kapcsolat.php'],
    ];
}

/**
 * Egy menüszint kirajzolása (rekurzív).
 *
 * CSS-osztályok:
 *   - 0. szint: <ul class="menu">, a legördülő szülő <li class="dropdown">
 *   - mélyebb:  <ul class="dropdown-menu">, a szülő <li class="dropdown-submenu">
 *   - az aktuális oldalhoz tartozó legfelső szintű link: class="aktiv"
 *
 * @param array  $elemek   Az adott szint menüelemei.
 * @param string $aktualis Az aktuális fájlnév (pl. "galeria.php").
 * @param int    $szint    Beágyazási mélység; hívásnál nem kell megadni.
 */
function menu_kirajzol(array $elemek, string $aktualis, int $szint = 0): void
{
    echo $szint === 0 ? '<ul class="menu">' : '<ul class="dropdown-menu">';

    foreach ($elemek as $elem) {
        // Az elem tulajdonságai és a hozzájuk tartozó megjelenítés
        $vanGyerek = !empty($elem['children']);
        $href      = $elem['href'] ?? '#';
        $osztaly   = $vanGyerek ? ($szint === 0 ? 'dropdown' : 'dropdown-submenu') : '';
        $jelzo     = $vanGyerek ? ($szint === 0 ? ' ▾' : ' ▸') : ''; // Lenyíló-nyíl
        $aktiv     = $szint === 0 && $href === $aktualis ? ' class="aktiv"' : '';

        echo '<li' . ($osztaly ? ' class="' . $osztaly . '"' : '') . '>';
        echo '<a href="' . e($href) . '"' . $aktiv . '>' . e($elem['label']) . $jelzo . '</a>';

        // Almenü kirajzolása a következő szinten
        if ($vanGyerek) {
            menu_kirajzol($elem['children'], $aktualis, $szint + 1);
        }

        echo '</li>';
    }

    echo '</ul>';
}
