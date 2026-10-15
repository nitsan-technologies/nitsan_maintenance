# Feature — Premium strip and ns_license free trial

*Status: Done. Verified live on TYPO3 14.3.7 (2026-10-14): strip renders at the top of the module, the button
opens the ns_license module with "Maintenance (nitsan_maintenance)" preselected in the trial modal. Requires
ns_license 14.5.4 (deep-link support) to be released. v12/v13 not tested.*

## Licensing status

Freemium. Premium product (T3Planet catalog): "Maintenance", €79,
https://t3planet.de/en/typo3-maintenance-mode-extension (not linked from the UI; the trial stays inside the
TYPO3 backend). Catalog features: custom maintenance pages, countdown timer styles, social links, logo options,
image/colour backgrounds, user role whitelisting.

## Dependency

`composer.json` `"nitsan/ns-license": "^14.5.4"`, `ext_emconf.php` `'ns_license' => '14.5.4-14.9.99'`. This
raises the effective minimum to TYPO3 12.4.18 (see `core.md`).

## Placement

T3Planet → Maintenance Mode (`/module/web/NitsanMaintenance`, `listAction`): above the flash messages and the
"Maintenance Mode Settings" card.

## How it works

- `MaintenanceController::listAction()` assigns `trialUrl` from `getTrialUrl()`: route
  `nitsan_nslicensemodule` + `trial=nitsan_maintenance` + `#free-section`, same frame. Returns `''` when the
  route is missing (ns_license not active); the strip is then not rendered. The backend `UriBuilder` is created
  inside the method because the controller also serves the frontend plugin.
- `Layouts/Backend.html` renders `<f:render section="premiumStrip" optional="true" />` before
  `<f:flashMessages />`; `Templates/Maintenance/List.html` defines the section inside `<f:if
  condition="{trialUrl}">`.

## Strip

- Markup: `core:icon actions-rocket`, headline and description on two lines, `btn btn-primary`
  "Start Free Trial →" (the arrow is `aria-hidden` markup).
- Labels in `locallang.xlf`: `premium.strip.headline` "You're using the free version of NS Maintenance",
  `premium.strip.description` "Unlock premium features and get more out of NS Maintenance.",
  `premium.strip.trial` "Start Free Trial".
- CSS at the end of `Resources/Public/css/global.css` (CRLF): `.nitsan-maintenance-premium-strip` — team-wide
  design (light-blue card `#e7f2fc`, border `#8eb6e8`, 4px `#2b6cb0` left accent, 6px radius, padding
  14px 18px, `light-dark()` for dark mode, button `#007bff` / hover `#0062cc`). Strip and button pin
  `var(--typo3-font-family)` / `var(--typo3-font-size)` so the module's Bootstrap 3 CSS does not change them.
- `clear: both` is required: the layout's own docheader floats the page path (`div.right`) to the right and
  never clears it, and the flex strip would otherwise shrink beside that float instead of taking the full
  width of the form below.
- Measured on v14.3.7: 12px text, 13.2px headline, 12px button, 67px tall on one line; same left and right
  edges as the form at 962px and 1200px frame widths.
- ns_license's module requires system maintainer access; other users get access denied after clicking.
