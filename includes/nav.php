<?php
declare(strict_types=1);

// A menü egyetlen helyen karbantartva. 'children' → legördülő / almenü.
function menu_adatok(): array
{
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
            ['label' => 'Képzőközpontunk', 'href' => '#'],
            ['label' => 'Partnereink',     'href' => '#'],
        ]],
        ['label' => 'Képzéseink', 'children' => [
            ['label' => 'Szakmáink', 'href' => 'szakmaink.php', 'children' => $szakmaGyerekek],
        ]],
        ['label' => 'Duális képzés', 'children' => [
            ['label' => 'A duális képzésről', 'href' => '#'],
            ['label' => 'Partnervállalatok',  'href' => '#'],
            ['label' => 'Munkaszerződés',     'href' => '#'],
        ]],
        ['label' => 'Kapcsolat', 'href' => '#'],
    ];
}

/** Egy menüszint kirajzolása (rekurzív). */
function menu_kirajzol(array $elemek, string $aktualis, int $szint = 0): void
{
    echo $szint === 0 ? '<ul class="menu">' : '<ul class="dropdown-menu">';

    foreach ($elemek as $elem) {
        $vanGyerek = !empty($elem['children']);
        $href      = $elem['href'] ?? '#';
        $osztaly   = $vanGyerek ? ($szint === 0 ? 'dropdown' : 'dropdown-submenu') : '';
        $jelzo     = $vanGyerek ? ($szint === 0 ? ' ▾' : ' ▸') : '';
        $aktiv     = $szint === 0 && $href === $aktualis ? ' class="aktiv"' : '';

        echo '<li' . ($osztaly ? ' class="' . $osztaly . '"' : '') . '>';
        echo '<a href="' . e($href) . '"' . $aktiv . '>' . e($elem['label']) . $jelzo . '</a>';
        if ($vanGyerek) {
            menu_kirajzol($elem['children'], $aktualis, $szint + 1);
        }
        echo '</li>';
    }

    echo '</ul>';
}
