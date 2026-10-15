# Feature — Backend module "Maintenance Mode"

*Status: Done. Module renders on TYPO3 14.3.7 (2026-10-14, empty table); saving and uploads code-read.*

## Where

T3Planet → Maintenance Mode (`/module/web/NitsanMaintenance`). Access `user`; the page tree is shown but the
selected page is not used.

## Flow

- `listAction`: `MaintenanceRepository::findAll()[0]` → `newMaintenance` (one record per installation; the
  repository respects `module.tx_nitsanmaintenance.persistence.storagePid`, default 0) + `trialUrl`.
- The form (`List.html`) posts to `createAction`:
  - Rejects an end date in the past (flash message `error.enddate`).
  - Converts `endtime` to a timestamp, removes images on new upload or the `logo-delete` / `bg-delete` flags,
    then `update()` or `add()` + `persistAll()`.
  - Uploads `$_FILES['image']` / `$_FILES['logo_image']` into storage 1 `user_upload/` (rename on conflict)
    and creates the `sys_file_reference` row through `MaintenanceRepository::updateSysFileReferenceRecord()`.
  - Redirects to `list` with flash message `updateMassage`.
- `Main.js` wires the remove-image / remove-logo buttons. Its submit validation looks for `#imageUpload`,
  which `List.html` does not contain, so that check never runs.

## Form sections

1. Maintenance Mode Settings: visibility (`hide`), logo upload + position, title, heading, text, end time,
   IP whitelist, frontend whitelist (`whitelistfrontend` 1 nothing / 2 groups / 3 users + `usergroups` /
   `users`), social links, page link + label, footer text.
2. Theme Layout Options: custom CSS, font colour, `themelayout` (1 image background + upload, 2 solid
   `backgroundcolor`), countdown, animate, `countboxstyle` (square, circle, subscription) + subscription
   labels.

Known issues: see `core.md` (own docheader, Bootstrap 3, unused actions, view paths).
