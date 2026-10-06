# Szalézi Ágazati Képzőközpont – weboldal

Egyszerű, adatvezérelt weboldal a Szalézi Ágazati Képzőközpont bemutatására:
statikus tartalmi oldalak, egy szűrhető képzési katalógus részletes
szakmaoldalakkal, képlapozók (galéria, hírek), valamint egy közös
fejléc/lábléc + menürendszer, amit egyetlen helyen kell karbantartani.

## Követelmények és futtatás

- PHP 8.0 vagy újabb (a kód `declare(strict_types=1)`-et és `match`
  kifejezést használ).
- Külső csomag vagy adatbázis nem szükséges, minden adat PHP-tömbökben van.
- Ajánlott: az `intl` PHP-bővítmény, amely a magyar ábécé szerinti
  rendezést adja (lásd „Rendezés"). Nélküle az oldal működik, de a
  rendezés egyszerűsített.

Fejlesztői szerver indítása a projekt gyökeréből:

    php -S localhost:8000

## Könyvtárszerkezet

```
.
├── index.php               – főoldal (hero, fejlesztés alatt jelzés, térkép)
├── bemutatkozas.php        – "Bemutatkozás" statikus tartalmi oldal
├── dualisKepzes.php        – "Duális képzés" infó-oldal (kártyás lista)
├── szakmaink.php           – szűrhető képzési katalógus
├── reszletek.php           – egy szakma részletes oldala (?id=...)
├── partnereink.php         – partnerek rácsos listája
├── hireink.php             – hírek képlapozója
├── galeria.php             – termek képlapozója
├── kapcsolat.php           – elérhetőségi kártyák
├── includes/
│   ├── header.php              – <head>, fejléc-kép, <nav>, <main> nyitása
│   ├── footer.php              – </main>, lábléc, </body>, </html>
│   ├── nav.php                 – menüadatok + menü kirajzolása (rekurzív)
│   ├── functions.php           – segédfüggvények: escape, adatbetöltés, szűrés, rendezés, URL-ek
│   ├── adatok.php              – a képzések alapadatai (szakmaink + reszletek)
│   ├── reszletekAdatok.php     – a szakmák részletes leírás-blokkjai
│   ├── dualisKepzesAdatok.php  – a Duális képzés oldal szöveges blokkjai
│   ├── partnereinkAdatok.php   – a partnerek listája
│   └── kapcsolatAdatok.php     – a Kapcsolat oldal kártyái
├── assets/
│   ├── style.css           – globális stílus (elrendezés, menü, kártyák, főoldal, lábléc)
│   ├── dualis.css          – Duális képzés oldal
│   ├── partnereink.css     – Partnereink oldal
│   ├── hireink.css         – Híreink oldal
│   ├── galeria.css         – Galéria oldal
│   ├── kapcsolat.css       – Kapcsolat oldal
│   ├── reszletek.css       – szakma részletek oldal
│   ├── fejlec/             – fejléc-kép (fejlec.webp)
│   ├── galeria/            – galéria képei (.webp)
│   └── hirek/              – hírek képei (rajz_01.webp …)
└── README.md
```

## Kódolási és kommentelési konvenciók

Az egész projekt egységesen, magyarul kommentezett.

- **PHP-fájlok:** minden fájl elején `/** … */` fejlécblokk áll, ami
  megmondja, mit csinál a fájl, mit használ és (adatfájloknál) milyen mezőket
  vár. A függvények `/** … */` docblockot kapnak (leírás, `@param`, `@return`).
  A hosszabb fájlokban a szakaszokat `/* ==== … ==== */` fejlécek tagolják.
- **Sablonrészek (HTML a PHP-ban):** `<!-- … -->` megjegyzések jelölik a
  nagyobb blokkokat és a feltételes részeket.
- **JavaScript (galéria, hírek):** soronként a függvények elé írt rövid
  megjegyzések.
- **CSS-fájlok:** minden fájl elején fejlécblokk; a szakaszok
  `/* --- … --- */` (oldalspecifikus) vagy `/* === … === */` (`style.css`)
  vonalakkal vannak elválasztva.
- A kommentek **csak a viselkedést magyarázzák**, a kód működése nem függ
  tőlük.

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

- `$oldalCim` adja a `<title>` tartalmát (a `header.php` escape-eli).
- `$oldalCss`, ha be van állítva, egy második `<link>`-ként kerül be a
  `assets/style.css` UTÁN, így felülírhatja azt egy adott oldalon
  (pl. `dualisKepzes.php` → `assets/dualis.css`).
- `header.php` betölti a `functions.php`-t és a `nav.php`-t, meghatározza
  `$oldalCim`-et (alapértelmezés: „Szalézi AKK") és `$aktualis`-t (az
  aktuális fájlnév a menü aktív állapotához), kiírja a fejléc-képet és a
  `<nav>`-ot, majd megnyitja a `<main>`-t.
- `footer.php` lezárja a `<main>`-t, kirajzolja a láblécet, majd a
  `</body></html>`-t.
- Mivel a `functions.php` a `header.php`-n keresztül töltődik be, az oldal
  saját kódjában a segédfüggvényeket (pl. `partner_csoportok()`) a
  `require header.php` UTÁN lehet hívni.

## Menürendszer (`includes/nav.php`)

- `menu_adatok(): array` – egyetlen helyen definiált, tetszőlegesen mély
  fastruktúra. Egy elem: `['label' => …, 'href' => …, 'children' => […]]`.
  `href` elhagyható, ha csak legördülő szülő (ekkor `#` lesz).
- A „Szakmáink" menüpont gyerekei (`$szakmaGyerekek`) dinamikusan épülnek
  a `varosok()` alapján – ha új település kerül az adatokba, automatikusan
  megjelenik almenüként, kód módosítása nélkül.
- `menu_kirajzol(array $elemek, string $aktualis, int $szint = 0): void` –
  rekurzívan rajzolja ki a `<ul>`/`<li>` struktúrát. `$szint === 0`-nál
  `.menu` osztályt kap a lista és `.dropdown` a legördülő szülő `<li>`-je;
  mélyebb szinteken `.dropdown-menu` és `.dropdown-submenu`. Az aktuális
  oldalnak megfelelő legfelső szintű menüpont `aktiv` osztályt kap
  (`$href === $aktualis` alapján, fájlnév szerint hasonlítva).
- Új menüpont vagy almenü hozzáadása: csak a `menu_adatok()` tömbjét kell
  bővíteni, a renderelő logikát nem kell módosítani.
- A „Képzőközpontunk" menüpont jelenleg `#`-re mutat (még nincs hozzá oldal).

## Segédfüggvények (`includes/functions.php`)

| Függvény | Feladat |
|---|---|
| `e(string): string` | `htmlspecialchars` rövidítése, `ENT_QUOTES \| ENT_SUBSTITUTE`, UTF-8. **Minden** dinamikus, felhasználó vagy adat által vezérelt kiírásnál ezt kell használni XSS ellen. |
| `kepzesek(): array` | Betölti (és `static` gyorsítótárazza egy kérésen belül) az `includes/adatok.php` tömböt. |
| `varosok(): array` | A képzésekben előforduló egyedi települések listája, az adatok sorrendjében. |
| `abc_osszehasonlit(string $a, string $b): int` | Két szöveg összehasonlítása magyar ábécé szerint (cs, gy, ly, ny, sz, ty, zs külön betűként). Az `intl` `Collator` osztályát használja; ha az nincs telepítve, ékezetmentesített összehasonlításra esik vissza. |
| `abc_rendez(array $lista, string $mezo): array` | Elemek ábécé szerinti rendezése egy mező alapján (pl. `'nev'`); az eredeti tömböt nem módosítja. |
| `partner_csoportok(array $partnerek, bool $szakmankent = false): array` | A partnerek ábécé szerint rendezve, megjelenítési csoportokba osztva (`['cim' => ?string, 'partnerek' => array]`). Kikapcsolt bontásnál egyetlen, cím nélküli csoport; bekapcsolva szakmánként egy csoport (a partnerek `szakmak` mezője alapján), a szakma nélküliek „Egyéb partnerek" címmel a végén. |
| `jogviszony_tipusok(): array` | A szűrhető jogviszony-kategóriák: kulcs (URL-paraméterhez) → megjelenítendő címke. Jelenleg: `tanuloi` → „Tanulói jogviszony", `felnottkepzesi` → „Felnőttképzési jogviszony". |
| `jogviszony_illeszkedik(string $kepzesJogviszony, string $tipus): bool` | Egy képzés `jogviszony` mezője illeszkedik-e a kategóriára. Részszöveg-egyezést vizsgál (`str_contains`), mert néhány képzésnél a mező kombinált (pl. „tanulói-, felnőttképzési jogviszony") – ezek mindkét szűrőnél megjelennek. |
| `szurt_kepzesek(?string $varos, ?string $jogviszony = null): array` | Képzések szűrése településre és/vagy jogviszony-kategóriára, az eredmény a szakma neve szerint ábécé sorrendben. `null` paraméter = az adott dimenzióban nincs szűrés. A két szűrő kombinálható. |
| `szakma_szuro_url(?string $varos, ?string $jogviszony): string` | A `szakmaink.php` szűrőlinkjeihez generál URL-t úgy, hogy az egyik szűrő módosításakor a másik megmarad. |
| `szakma_id(array $kepzes): string` | A szakma URL-barát azonosítója: `4 0722 08 01` → `4-0722-08-01`. |
| `szakma_url(array $kepzes): string` | A szakma részletek oldalának URL-je: `reszletek.php?id=…`. |
| `kepzes_azonosito_alapjan(string $id): ?array` | Képzés keresése az URL-ben kapott (kötőjeles) azonosító alapján; `null`, ha nincs ilyen. |
| `kepzes_reszletek(string $azonosito): array` | Egy szakma részletes leírás-blokkjai a `reszletekAdatok.php`-ból (kulcs: az eredeti, szóközös azonosító); üres tömb, ha nincs. |

## Rendezés

- A **Szakmáink** és a **Partnereink** oldal listája alapból ábécé sorrendben
  jelenik meg; az adatfájlokban a tömbelemek sorrendje ezért nem számít.
- A rendezés magyar ábécé szerint történik (`abc_osszehasonlit()`), ehhez az
  `intl` PHP-bővítmény kell. Nélküle az ékezetek figyelmen kívül maradnak,
  de a kétjegyű betűket (cs, sz, zs …) nem kezeli külön.
- A település-szűrősáv és a menü almenüje **nem** ábécé szerint, hanem az
  adatok sorrendjében követi a településeket (`varosok()`).

## Képzési adatok (`includes/adatok.php`)

Egy sima PHP tömb, minden elem egy asszociatív tömb. A megjelenítés
sorrendjét a Szakmáink oldalon az ábécé adja (a tömb sorrendje nem
számít). Mezők:

| Mező | Kötelező | Leírás |
|---|---|---|
| `nev` | igen | A képzés/szakma neve. |
| `varos` | igen | Telephely települése (jelenleg: Budapest, Kazincbarcika). Ez vezérli a település-szűrőt és a menü almenüjét. |
| `jogviszony` | igen | Szabad szöveg, pl. „tanulói jogviszony", „felnőttképzési jogviszony", vagy kombinált „tanulói-, felnőttképzési jogviszony". Ez jelenik meg a kártyán; a szűrés `jogviszony_illeszkedik()`-en keresztül részszöveg-egyezéssel történik. |
| `agazat` | igen | Az ágazat/szakmacsoport megnevezése. |
| `azonosito` | igen | Szakma-azonosító szám (pl. „5 0612 12 02"). Ebből készül a részletek oldal URL-je, és ez a `reszletekAdatok.php` kulcsa is. |
| `szakmairanyok` | nem | Tömb, ha a szakmának több szakmairánya van; ha üres/hiányzik, a lista nem jelenik meg. |
| `alkalmassagi` | nem | Szöveg, ha a képzéshez foglalkozás-egészségügyi alkalmassági vizsgálat szükséges; ha hiányzik, a figyelmeztetés nem jelenik meg. |

Új képzés felvétele: egy új tömbelem hozzáadása ehhez a fájlhoz; minden
egyéb (szűrők, menü, kártyalista) automatikusan frissül.

## Szakmáink oldal (`szakmaink.php`)

- Két, egymástól függetlenül kombinálható szűrő: **település**
  (`?varos=…`) és **jogviszony** (`?jogviszony=…`).
- Mindkét paramétert validáljuk: ismeretlen/hamisított érték esetén a
  szűrő figyelmen kívül marad (nincs hibaüzenet, csak visszaesik
  „mindre" szűrésre) – ez védi az oldalt érvénytelen bemenettől.
- A két szűrősor (`.varos-nav`) egymás alatt jelenik meg; mindkettőben
  szerepel egy „Összes …" link a szűrő törléséhez.
- A `<title>` és az oldal `$oldalCim`-je tükrözi az aktív szűrő(ke)t
  (pl. „Szakmáink – Budapest, Tanulói jogviszony – Szalézi AKK").
- A találati lista kártyákként jelenik meg (`#kepzesek` → `.kepzes-kartya`
  elemek), a szakma neve szerint ábécé sorrendben; a teljes kártya
  kattintható, és a részletek oldalra visz. Ha a szűrés eredménye üres,
  „Nincs megjeleníthető képzés." szöveg jelenik meg.

## Szakma részletek oldal (`reszletek.php` + `includes/reszletekAdatok.php`)

- Hívás: `reszletek.php?id=4-0722-08-01` (a szakma azonosítója kötőjelekkel).
- Az alapadatok (település, ágazat, jogviszony, azonosító, szakmairányok,
  alkalmassági figyelmeztetés) az `adatok.php`-ból jönnek.
- A leírás a `reszletekAdatok.php`-ból jön, az **eredeti, szóközös**
  azonosító szerint kulcsolva (pl. `'4 0722 08 01'`). Egy szakmához
  blokkok listája tartozik, a megadott sorrendben:

  | Blokk | Jelentés |
  |---|---|
  | `['h', 'Cím']` | alcím (`<h2>`) |
  | `['p', 'Szöveg']` | bekezdés |
  | `['ul', ['pont1', 'pont2']]` | felsorolás |

- Ha egy szakmához nincs leírás-blokk, csak az alapadatok jelennek meg.
- Ismeretlen vagy hiányzó `id` esetén 404-es állapotkódú „A szakma nem
  található" oldal jelenik meg.
- Saját stíluslapja: `assets/reszletek.css`.

## Duális képzés oldal (`dualisKepzes.php` + `includes/dualisKepzesAdatok.php`)

- Az adatfájl egy egyszerű lista `cim` / `szoveg` párokból; az oldal
  végigmegy rajtuk és mindegyikből egy `.informacio` szekciót rendel.
- Saját stíluslapja van (`assets/dualis.css`), amit az `$oldalCss`
  változón keresztül tölt be a `header.php`, a globális
  `assets/style.css` mellé (azt nem helyettesíti, hanem kiegészíti).
- Új blokk felvétele: új `['cim' => …, 'szoveg' => …]` elem az adatfájl
  tömbjéhez.

## Partnereink oldal (`partnereink.php` + `includes/partnereinkAdatok.php`)

- Az adatfájl partnerek listája. Mezők: `nev`, `url` és opcionálisan
  `szakmak`. Ha az `url` nem üres, a név új lapon megnyíló linkként jelenik
  meg (`rel="noopener noreferrer"`), egyébként sima szövegként (`null`
  érték).
- A partnerek **ábécé sorrendben** jelennek meg (a `partner_csoportok()`
  rendezi őket), így az adatfájlban a sorrend nem számít.
- Rácsos elrendezés (3 oszlop, telefonon 1), stílus: `assets/partnereink.css`.
- **Szakmák szerinti blokkok (előkészítve, jelenleg kikapcsolva):** a
  `partnereink.php` tetején a `$SZAKMANKENT` változó vezérli. `false`
  esetén az oldal egyetlen, cím nélküli rácsot ír ki (a jelenlegi nézet).
  Bekapcsolásához:
  1. a partnereknél meg kell adni a `szakmak` mezőt, pl.
     `'szakmak' => ['Villanyszerelő', 'Asztalos']` (az `adatok.php` `nev`
     értékei); egy partner több szakmánál is szerepelhet;
  2. a `$SZAKMANKENT` értékét `true`-ra kell állítani.

  Ekkor szakmánként egy-egy blokk jelenik meg `<h2 class="partner-csoport-cim">`
  címmel (a blokkok és a bennük lévő partnerek is ábécé szerint), a
  szakma nélküli partnerek pedig „Egyéb partnerek" blokkban a végén.
- Új partner: új `['nev' => …, 'url' => …]` elem az adatfájlban.

## Kapcsolat oldal (`kapcsolat.php` + `includes/kapcsolatAdatok.php`)

- Az adatfájl kártyák listája. Egy kártya mezői: `cim`, `ikon` (emoji),
  opcionálisan `nev` és `megjegyzes`, valamint `sorok`, amelyben minden sor
  `felirat`, `ertek` és opcionális `href` (pl. `mailto:`, `tel:`).
- Stílus: `assets/kapcsolat.css`.
- **Figyelem:** a `kapcsolat.php` tetején egy fejlesztői hibakijelző sor van
  (`display_errors`); éles üzemben ezt el kell távolítani.
- A lábléc (`footer.php`) ugyanezeket az elérhetőségeket kézzel beírva
  tartalmazza, ezért módosításkor mindkét helyen frissíteni kell.

## Képlapozók: Galéria és Híreink

- **`galeria.php`** – a képek fájlnevei a fájl tetején lévő `$kepek`
  tömbben vannak (`assets/galeria/`); stílus: `assets/galeria.css`.
- **`hireink.php`** – a hírek a `$hirek` tömbben (`kep` + `nev`), a képek az
  `assets/hirek/` mappában vannak; stílus: `assets/hireink.css`. A `nev`
  mezők jelenleg helyőrzők („Festő neve").
- Mindkét oldal a saját JavaScriptjével lapoz (előző/következő gomb, a
  végén visszaugrik), és időzítővel automatikusan is léptet
  (galéria: 5 mp, hírek: 4 mp).

## Stílusok

- `assets/style.css` – globális stílus, szakaszokra bontva: alapok, menü,
  Szakmáink (szűrősáv, `.kepzes-kartya`), fejléc-kép, lábléc, főoldal
  (`.hero`, `.kiemelt-szoveg`, `.fejlesztes`, `.terkep-szekcio`),
  reszponzív szabályok. A Szakmáink oldal mindkét szűrősora ugyanazt a
  `.varos-nav` osztályt használja, így vizuálisan egységesek. A fájl végén
  egy „Régi / tartalék szabályok" szakasz van (régi galéria- és
  lábléc-osztályok), ami ellenőrzés után törölhető.
- Oldalspecifikus stíluslapok (az `$oldalCss`-en át, a `style.css` UTÁN
  töltődnek): `dualis.css`, `partnereink.css`, `hireink.css`, `galeria.css`,
  `kapcsolat.css`, `reszletek.css`. Mindegyik reszponzív törésponttal
  rendelkezik (768 / 900 / 700 / 600 px, oldaltól függően).

## Biztonsági megjegyzés

Minden dinamikus, kifelé írt szöveget az `e()` függvényen kell átvezetni
(kivéve, ahol explicit HTML-t akarunk kiírni – erre jelenleg nincs
példa). A `dualisKepzes.php` jelenleg a natív `htmlspecialchars()`-t
hívja közvetlenül `e()` helyett ugyanazokkal a paraméterekkel; egységesség
kedvéért érdemes lenne itt is `e()`-re váltani.

## Bővítési útmutató – gyors összefoglaló

| Feladat | Hol |
|---|---|
| Új képzés/szakma | `includes/adatok.php` – új tömbelem (a sorrend az ábécé szerint automatikus) |
| Szakma részletes leírása | `includes/reszletekAdatok.php` – új kulcs az `azonosito` értékével, blokkokkal |
| Új település | Csak egy új `varos` érték az adatok között – a szűrő és a menü automatikusan felveszi |
| Új jogviszony-kategória a szűrőhöz | `includes/functions.php` – `jogviszony_tipusok()` és `jogviszony_illeszkedik()` bővítése |
| Új statikus oldal | Új `.php` fájl a gyökérben, a header/footer mintát követve, + link a `nav.php`-ban |
| Új menüpont/almenü | `includes/nav.php` – `menu_adatok()` tömbje |
| Új „Duális képzés" infóblokk | `includes/dualisKepzesAdatok.php` – új elem |
| Új partner | `includes/partnereinkAdatok.php` – új elem (a sorrend az ábécé szerint automatikus) |
| Partnerek szakmák szerinti blokkjai | `szakmak` mező a partnereknél + `$SZAKMANKENT = true` a `partnereink.php`-ban |
| Új kapcsolati kártya | `includes/kapcsolatAdatok.php` – új elem (és a lábléc, ha ott is szerepel) |
| Új galériakép | kép az `assets/galeria/` mappába + fájlnév a `galeria.php` `$kepek` tömbjébe |
| Új hír | kép az `assets/hirek/` mappába + új elem a `hireink.php` `$hirek` tömbjébe |
