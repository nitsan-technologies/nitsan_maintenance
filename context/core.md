# nitsan_maintenance — Core facts

## Identity

| Item | Value |
|---|---|
| Extension key | `nitsan_maintenance` |
| Composer name | `nitsan/nitsan-maintenance` |
| Product name (T3Planet) | Maintenance |
| Namespace | `Nitsan\NitsanMaintenance\` → `Classes/` |
| Version (ext_emconf) | 14.1.0 (latest tag 14.0.0) |
| Repository | https://github.com/nitsan-technologies/nitsan_maintenance (default branch `master`) |
| Licensing status | **Freemium** — this repo is the free version. The NITSAN Free/Freemium sheet needs a Google login; status taken from the T3Planet catalog (`isFree: false` for the premium product) |
| Premium version (T3Planet catalog) | "Maintenance", €79, https://t3planet.de/en/typo3-maintenance-mode-extension |

## Compatibility

| Source | TYPO3 | PHP |
|---|---|---|
| `ext_emconf.php` | `12.0.0-14.9.99` | not declared |
| `composer.json` | `^12 \|\| ^13 \|\| ^14` | not declared |
| ns_license 14.5.4 (dependency) | `12.4.18-14.9.99` | not declared (TYPO3 12.4 needs 8.1+) |

- Effective minimum is **TYPO3 12.4.18 / PHP 8.1** because of ns_license; the declared `12.0.0` lower bound is
  kept as is.

## Dependencies

| Package | Constraint | Why |
|---|---|---|
| `typo3/cms-core` | see above | core |
| `nitsan/ns-license` / `ns_license` | `^14.5.4` / `14.5.4-14.9.99` | TYPO3 Shop module + free-trial deep link (see `features/premium-cta.md`) |

Bundled frontend libraries (no package manager): jQuery 2.1.0, Bootstrap 3, bootstrap-colorpalette, TinyMCE
(about 5 MB below `Resources/Public/js/`), Font Awesome, theme scripts in `Resources/Public/js/themes/`.

## Tooling

- No PHPUnit, PHPStan, CS fixer or package.json in the repo.
- CI: `.github/workflows/ter-release.yml` only (publishes tags to TER with tailor on PHP 7.4).
- `.gitattributes` export-ignores `.github/`, `AGENTS.md`, `CLAUDE.md`, `context/`, `tasks/` and itself, so they
  are not in the GitHub/Composer archive or the TER package (the TER release uploads the GitHub tag archive).
- No Crowdin config. English: `locallang.xlf` (module + frontend labels), `locallang_maintenance.xlf` (module
  title), `BackendModule.xlf` (T3Planet group), `locallang_db.xlf`, `locallang_csh_*.xlf`; German:
  `de.locallang.xlf`, `de.locallang_maintenance.xlf`.

## Conventions

- PHP mixes tabs and 4 spaces, no `declare(strict_types=1)`; keep the surrounding style when editing.
- TypoScript and Fluid use tabs.
- CSS lives in `Resources/Public/css/` (lower case); `global.css` uses CRLF line endings — keep them.

## Known issues (existing, not fixed)

All code-read unless marked.

- A security issue in the frontend condition code was found on 2026-10-14 and reported privately to the
  maintainers. Ask them before changing `Classes/ExpressionLanguage/`.
- `getStoragePageId()` (in both condition classes) reads `$GLOBALS['TSFE']`, which TYPO3 14 no longer sets
  (Breaking-107831), so on v14 it always returns 0 and the conditions only see a maintenance record on pid 0.
  On v12/v13 it parses `module.tx_nitsanmaintenance_maintenance.persistence.storagePid` with a regex from the
  raw constants of the nearest `sys_template` record; site-set settings and constants from included files are
  not seen, and on a site root page the result is always 0.
- `pageAction` reads the storage page from `module.tx_nitsanmaintenance.persistence.storagePid` (full
  TypoScript), the conditions from the constants above: the two can disagree.
- The frontend plugin is rendered with `switchableControllerActions` and `vendorName`, both ignored by
  `EXTBASEPLUGIN` on current TYPO3; it works because `page` is the first action.
- `Resources/Private/Layouts/Backend.html` builds its own `typo3-docheader` markup and loads Bootstrap 3 into
  the module; `listAction` shows `findAll()[0]` only (one record per installation).
- `Modules.php` lists the actions `new` (no `newAction()` exists) and `subscriber` (the frontend action, no
  module template).
- The setup maps `Nitsan\NitsanMaintenance\Domain\Model\FileReference` via `persistence.classes` and
  `config.tx_extbase.objects`; that class does not exist and TYPO3 ignores both options since v10.
- `module.tx_nitsanmaintenance.view.*` points to `Resources/Private/Backend/…` and an undefined
  `partialRootPath` constant; the folders do not exist and Extbase falls back to `Resources/Private/`.
- README badges show v13.0.1 / TYPO3 13 and GPL-3.0; `composer.json` uses the deprecated SPDX id `GPL-2.0+`.
  Catalog lists "TYPO3 v12 to v13", latest 13.1.1.
