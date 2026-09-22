

Egyszerű, adatvezérelt weboldal a Szalézi Ágazati Képzőközpont bemutatására:
statikus tartalmi oldalak, egy szűrhető képzési katalógus, és egy közös
fejléc/lábléc + menürendszer, amit egyetlen helyen kell karbantartani.

## Követelmények és futtatás

- PHP 8.0 vagy újabb (a kód `declare(strict_types=1)`-et és `match`
  kifejezést használ).
- Külső csomag vagy adatbázis nem szükséges, minden adat PHP-tömbökben van.

Fejlesztői szerver indítása a projekt gyökeréből:

    php -S localhost:8000

## Könyvtárszerkezet

.
├── index.php – főoldal
├── bemutatkozas.php – "Bemutatkozás" statikus tartalmi oldal
├── szakmaink.php – szűrhető képzési katalógus
├── dualisKepzes.php – "Duális képzés" infó-oldal (kártyás lista)
├── includes/
│ ├── header.php – <head>, <nav>, <main> nyitása
│ ├── footer.php – <main>, <body>, <html> zárása
│ ├── nav.php – menüadatok + menü kirajzolása (rekurzív)
│ ├── functions.php – segédfüggvények: escape, adatbetöltés, szűrés
│ ├── adatok.php – a szakmaink.php-hoz tartozó képzési adatok
│ └── dualisKepzesAdatok.php – a dualisKepzes.php-hoz tartozó szöveges blokkok
├── assets/
│ ├── style.css – globális stílus (elrendezés, menü, kártyák)
│ └── dualis.css – csak a Duális képzés oldalhoz tartozó stílus
└── README.md


## Oldalsablon (header/footer minta)

Minden oldal ugyanazt a mintát követi:

```php
<?php
$oldalCim = 'Oldal címe – Szalézi AKK';
// opcionális, oldalspecifikus CSS:
// $oldalCss = 'assets/dualis.css';
require __DIR__ . '/includes/header.php';
?>

    <h1>…</h1>
    <p>…</p>

<?php require __DIR__ . '/includes/footer.php'; ?>
```

- `$oldalCim` adja a `<title>` tartalmát (a header.php escape-eli).
- `$oldalCss`, ha be van állítva, egy második `<link>`-ként kerül be a
  `assets/style.css` UTÁN, így felülírhatja azt egy adott oldalon
  (lásd: `dualisKepzes.php` → `assets/dualis.css`).
- `header.php` betölti a `functions.php`-t és a `nav.php`-t, meghatározza
  `$oldalCim`-et (alapértelmezés: „Szalézi AKK”) és `$aktualis`-t (az
  aktuális fájlnév a menü aktív állapotához), majd kiírja a `<nav>`-ot és
  megnyitja a `<main>`-t.
- `footer.php` csak a záró tageket tartalmazza (`</main></body></html>`).

## Menürendszer (`includes/nav.php`)

- `menu_adatok(): array` – egyetlen helyen definiált, tetszőlegesen mély
  fastruktúra. Egy elem: `['label' => …, 'href' => …, 'children' => […]]`.
  `href` elhagyható, ha csak legördülő szülő (ekkor `#` lesz).
- A „Szakmáink” menüpont gyerekei (`$szakmaGyerekek`) dinamikusan épülnek
  a `varosok()` alapján – ha új település kerül az adatokba, automatikusan
  megjelenik almenüként, kód módosítása nélkül.
- `menu_kirajzol(array $elemek, string $aktualis, int $szint = 0): void` –
  rekurzívan rajzolja ki a `<ul>`/`<li>` struktúrát. `$szint === 0`-nál
  `.menu` osztályt kap a lista és `.dropdown` a legördülő szülő `<li>`-je;
  mélyebb szinteken `.dropdown-menu` és `.dropdown-submenu`. Az aktuális
  oldalnak megfelelő legfelső szintű menüpont `aktiv` osztályt kap
  (`$href === $aktualis` alapján, fájlnév szerint hasonlítva).
- Új menüpont vagy almenü hozzáadása: csak a `menu_adatok()` tömbjét kell
  bővíteni, a `nav.php` renderelő logikáját nem kell módosítani.

## Segédfüggvények (`includes/functions.php`)

| Függvény | Feladat |
|---|---|
| `e(string): string` | `htmlspecialchars` rövidítése, `ENT_QUOTES \| ENT_SUBSTITUTE`, UTF-8. **Minden** dinamikus, felhasználó vagy adat által vezérelt kiírásnál ezt kell használni XSS ellen. |
| `kepzesek(): array` | Betölti (és `static` gyorsítótárazza egy kérésen belül) az `includes/adatok.php` tömböt. |
| `varosok(): array` | A képzésekben előforduló egyedi települések listája, az adatok sorrendjében. |
| `jogviszony_tipusok(): array` | A szűrhető jogviszony-kategóriák: kulcs (URL-paraméterhez) → megjelenítendő címke. Jelenleg: `tanuloi` → „Tanulói jogviszony”, `felnottkepzesi` → „Felnőttképzési jogviszony”. |
| `jogviszony_illeszkedik(string $kepzesJogviszony, string $tipus): bool` | Egy képzés `jogviszony` mezője illeszkedik-e a kategóriára. Részszöveg-egyezést vizsgál (`str_contains`), mert néhány képzésnél a mező kombinált (pl. „tanulói-, felnőttképzési jogviszony”) – ezek mindkét szűrőnél megjelennek. |
| `szurt_kepzesek(?string $varos, ?string $jogviszony = null): array` | Képzések szűrése településre és/vagy jogviszony-kategóriára. `null` paraméter = az adott dimenzióban nincs szűrés. A két szűrő kombinálható. |
| `szakma_szuro_url(?string $varos, ?string $jogviszony): string` | A `szakmaink.php` szűrőlinkjeihez generál URL-t úgy, hogy az egyik szűrő módosításakor a másik megmarad. |

## Képzési adatok (`includes/adatok.php`)

Egy sima PHP tömb, minden elem egy asszociatív tömb, mezők:

| Mező | Kötelező | Leírás |
|---|---|---|
| `nev` | igen | A képzés/szakma neve. |
| `varos` | igen | Telephely települése (jelenleg: Budapest, Kazincbarcika). Ez vezérli a település-szűrőt és a menü almenüjét. |
| `jogviszony` | igen | Szabad szöveg, pl. „tanulói jogviszony”, „felnőttképzési jogviszony”, vagy kombinált „tanulói-, felnőttképzési jogviszony”. Ez a szövegértékek jelennek meg a kártyán; a szűrés `jogviszony_illeszkedik()`-en keresztül részszöveg-egyezéssel történik. |
| `agazat` | igen | Az ágazat/szakmacsoport megnevezése. |
| `azonosito` | igen | Szakma-azonosító szám (pl. „5 0612 12 02”). |
| `szakmairanyok` | nem | Tömb, ha a szakmának több szakmairánya van; ha üres/hiányzik, a lista nem jelenik meg. |
| `alkalmassagi` | nem | Szöveg, ha a képzéshez foglalkozás-egészségügyi alkalmassági vizsgálat szükséges; ha hiányzik, a figyelmeztetés nem jelenik meg. |

Új képzés felvétele: egy új tömbelem hozzáadása ehhez a fájlhoz; minden
egyéb (szűrők, menü, kártyalista) automatikusan frissül.

## Szakmáink oldal (`szakmaink.php`)

- Két, egymástól függetlenül kombinálható szűrő: **település**
  (`?varos=…`) és **jogviszony** (`?jogviszony=…`).
- Mindkét paramétert validáljuk: ismeretlen/hamisított érték esetén a
  szűrő figyelmen kívül marad (nincs hibaüzenet, csak visszaesik
  „mindre” szűrésre) – ez védi az oldalt érvénytelen bemenettől.
- A két szűrősor (`.varos-nav`) egymás alatt jelenik meg; mindkettőben
  szerepel egy „Összes …” link a szűrő törléséhez.
- A `<title>` és az oldal `$oldalCim`-je tükrözi az aktív szűrő(ke)t
  (pl. „Szakmáink – Budapest, Tanulói jogviszony – Szalézi AKK”).
- A találati lista kártyákként jelenik meg (`#kepzesek` → `.kepzes-kartya`
  elemek); ha a szűrés eredménye üres, „Nincs megjeleníthető képzés.”
  szöveg jelenik meg helyette.

## Duális képzés oldal (`dualisKepzes.php` + `includes/dualisKepzesAdatok.php`)

- Az adatfájl egy egyszerű lista `cim` / `szoveg` párokból; az oldal
  végigmegy rajtuk és mindegyikből egy `.informacio` szekciót rendel.
- Saját stíluslapja van (`assets/dualis.css`), amit az `$oldalCss`
  változón keresztül tölt be a `header.php`, a globális
  `assets/style.css` mellé (azt nem helyettesíti, hanem kiegészíti).
- Új blokk felvétele: új `['cim' => …, 'szoveg' => …]` elem az adatfájl
  tömbjéhez.

## Stílusok

- `assets/style.css` – globális elrendezés, tipográfia, a legördülő menü
  (`.menu`, `.dropdown`, `.dropdown-menu`, `.dropdown-submenu`), a
  szűrősávok (`.varos-nav`, aktív állapot: `.aktiv`) és a képzési kártyák
  (`.kepzes-kartya`, `.szakmairanyok`, `.alkalmassagi`) stílusa. A
  Szakmáink oldal mindkét szűrősora ugyanezt a `.varos-nav` osztályt
  használja, így vizuálisan egységesek.
- `assets/dualis.css` – kizárólag a Duális képzés oldal elrendezése
  (`.dualis-oldal`, `#dualis-tartalom`, `.informacio`), reszponzív
  töréspont `768px`-nél.

## Biztonsági megjegyzés

Minden dinamikus, kifelé írt szöveget az `e()` függvényen kell átvezetni
(kivéve, ahol explicit HTML-t akarunk kiírni – erre jelenleg nincs
példa). A `dualisKepzes.php` jelenleg a natív `htmlspecialchars()`-t
hívja közvetlenül `e()` helyett ugyanazokkal a paraméterekkel;
egységesség kedvéért érdemes lenne itt is `e()`-re váltani.

## Bővítési útmutató – gyors összefoglaló

| Feladat | Hol |
|---|---|
| Új képzés/szakma | `includes/adatok.php` – új tömbelem |
| Új település | Csak egy új `varos` érték az adatok között – a szűrő és a menü automatikusan felveszi |
| Új jogviszony-kategória a szűrőhöz | `includes/functions.php` – `jogviszony_tipusok()` és `jogviszony_illeszkedik()` bővítése |
| Új statikus oldal | Új `.php` fájl a gyökérben, a header/footer mintát követve, + link a `nav.php`-ban |
| Új menüpont/almenü | `includes/nav.php` – `menu_adatok()` tömbje |
| Új „Duális képzés” infóblokk | `includes/dualisKepzesAdatok.php` – új elem |