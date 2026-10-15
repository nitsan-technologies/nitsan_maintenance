# nitsan_maintenance — Architecture

One Extbase plugin (`Mode`, never placed as content — TypoScript swaps it in for the whole page), one backend
module, two tables and two TypoScript condition providers.

## Configuration

| File | What |
|---|---|
| `ext_localconf.php` | Plugin `nitsanmaintenance_mode`, actions `page, subscriber` (both uncached); `list_type` plugin on v12/v13, `CType` on v14 (core default). No `registerPlugin()` / `tt_content` TCA override, so it appears in no editor selector |
| `Configuration/page.tsconfig` | `TCEFORM.tt_content.list_type.removeItems = nitsanmaintenance_mode`; no effect, the plugin is never registered as an item (and v14 has no `list_type` field) |
| `Configuration/Backend/Modules.php` | Group `nitsan_module` ("T3Planet", after Web) + module `nitsan_maintenance` ("Maintenance Mode", path `/module/web/NitsanMaintenance`, access `user`, page tree, actions `list, new, create, subscriber`) |
| `Configuration/ExpressionLanguage.php` | Registers `CheckMaintenanceMode` and `AuthCheckMaintenanceMode` for the `typoscript` context |
| `Configuration/TCA/Overrides/sys_template.php` | Static template "Maintenance" (`Configuration/TypoScript`) |
| `Configuration/TypoScript/constants.typoscript` | `plugin.tx_nitsanmaintenance_mode.{view,persistence.storagePid,settings.adminEmail}`, `module.tx_nitsanmaintenance_maintenance.{view,persistence.storagePid}` |
| `Configuration/TypoScript/setup.typoscript` | Plugin + module persistence/view, a dead `FileReference` mapping (see `core.md`), and the two conditions that replace `page` (see `features/maintenance-frontend.md`) |
| `Configuration/Sets/nitsan_maintenance/` | Site set `nitsan/nitsan-maintenance`; settings `nitsanMaintenance.plugin.persistence.storagePid`, `nitsanMaintenance.plugin.settings.adminEmail`, `nitsanMaintenance.module.persistence.storagePid`; the set constants bridge them into the classic constant names and the setup imports the classic setup |
| `Configuration/Services.yaml` | Autowires `Classes/*` |
| `Configuration/JavaScriptModules.php` | Import map `@nitsan/nitsan-maintenance/` → `Resources/Public/JavaScript/` |

## Classes

| Class | Role |
|---|---|
| `Controller\MaintenanceController` | Backend: `listAction` (form + `trialUrl`), `createAction` (save, image upload/removal). Frontend: `pageAction` (maintenance page), `subscriberAction` (store subscriber, mail admin) |
| `Domain\Model\Maintenance`, `Subscriber` | Extbase models; `image` / `logo_image` use the core `Extbase\Domain\Model\FileReference` |
| `Domain\Repository\MaintenanceRepository` | Includes `updateSysFileReferenceRecord()` for uploaded images |
| `Domain\Repository\SubscriberRepository` | |
| `ExpressionLanguage\CheckMaintenanceMode` | Variable `CheckMaintenanceMode` (bool), computed when the provider is built |
| `ExpressionLanguage\AuthCheckMaintenanceMode` + `FrontendUserConditionFunctionsProvider` | Function `usercheck()` for logged-in frontend users |

## Tables

- `tx_nitsanmaintenance_domain_model_maintenance`: one settings record (visibility `hide`, `endtime`,
  `countdown`, texts, colours, social links, `pagelink`, `countboxstyle`, `themelayout`, `image`,
  `logo_image`, `logo_position`, `whitelist` (IPs), `whitelistfrontend` + `users` / `usergroups`, `customcss`).
- `tx_nitsanmaintenance_domain_model_subscriber`: `subscriber_email`.

## Views

- Backend: `Layouts/Backend.html` (own docheader, Bootstrap 3 CSS, `premiumStrip` section, flash messages),
  `Templates/Maintenance/List.html` (two cards: maintenance settings, theme layout options).
- Frontend: `Layouts/Default.html`, `Templates/Maintenance/Page.html`, partials `Square`, `Circle`,
  `Subscription` (by `countboxstyle`), `Templates/Maintenance/Email/AdminMail.html`.

## Assets

- Backend: `JavaScript/Main.js` (ES module, image removal), `css/{bootstrap,bootstrap-colorpalette,
  font-awesome.min,global}.css` (the premium strip CSS is at the end of `global.css`), `js/` (jQuery,
  TinyMCE, Bootstrap, colour palette, `custom.js`; loaded with plain `<script>` tags from `List.html`).
- Frontend: `css/app.css`, `css/custom.css`, `js/jquery-2.1.0.min.js`, `js/themes/{plugin,script}.js`.
