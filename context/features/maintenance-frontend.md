# Feature — Frontend maintenance switch

*Status: Done (code-read, 2026-10-14). Not tested live.*

## How a page becomes the maintenance page

`Configuration/TypoScript/setup.typoscript` (also imported by the site set) has two conditions that drop `page`
and build a new `PAGE` with `app.css`, `custom.css`, jQuery 2.1.0, the theme scripts, the title
"Maintenance Mode" and `page.10 = EXTBASEPLUGIN` (plugin `Mode`, action `page`):

| Condition | Provider | True when |
|---|---|---|
| `[frontend.user.isLoggedIn && usercheck()]` | `AuthCheckMaintenanceMode` → `FrontendUserConditionFunctionsProvider` | Record exists, `hide` = 0, the user is not whitelisted (`whitelistfrontend` 3 = `users`, otherwise `usergroups`), the IP is not whitelisted |
| `[!frontend.user.isLoggedIn && CheckMaintenanceMode]` | `CheckMaintenanceMode` | Record exists, `hide` = 0, the IP is not whitelisted |

- The record is looked up by `pid = getStoragePageId()` (see `core.md` for the v14 problem).
- The lookups keep the default restrictions, and the TCA declares `hidden` and `endtime` as enable columns:
  once the module's end date has passed, the record is no longer found, so the switch turns itself off and
  `pageAction` gets no settings (code-read).
- IP whitelist: comma list in `whitelist`, matched with `strstr(REMOTE_ADDR, ip)` (substring anywhere in the
  address, not prefix or CIDR).
- A request with `?pageid=<x>` matching the record's `pagelink` is let through, so the page linked from the
  maintenance page can be shown.
- `CheckMaintenanceMode` is computed when the provider is built, on every frontend request.

## Maintenance page (`pageAction`)

- Loads the record from `module.tx_nitsanmaintenance.persistence.storagePid` without storage restriction.
- Adds inline CSS (font colour, `customcss`); renders `Page.html` with `Square`, `Circle` or `Subscription`
  by `countboxstyle` (only when `countdown` is on); `Default.html` uses `backgroundcolor` for `themelayout` 2
  and the background image otherwise.
- Query parameter `tx_nitsanmaintenance_mode[key]` = `error` / `errorEmail` / other → flash message after a
  subscription.

## Subscription (`subscriberAction`)

- Validates the e-mail; without `settings.adminEmail` (constant / set setting) it redirects with `key=error`
  and stores nothing.
- Stores a `Subscriber` and mails the admin with `Email/AdminMail.html` (StandaloneView on v12, ViewFactory on
  v13+); the subscriber address is the sender.
