# nitsan_maintenance — Session state

## 2026-10-14 — ns_license integration + premium strip + agent context

- Working copy on `master` (7fc5c3f), uncommitted; no feature branch created.
- Added `nitsan/ns-license ^14.5.4` / `ns_license 14.5.4-14.9.99` (effective minimum now TYPO3 12.4.18).
  Version 14.0.0 → 14.1.0.
- Premium strip with "Start Free Trial" → ns_license module `?trial=nitsan_maintenance#free-section` at the top
  of the "Maintenance Mode" backend module, team-wide wording and design (see `features/premium-cta.md`).
- Verified live on TYPO3 14.3.7 classic (temporary system-maintainer admin, removed; `settings.php` restored
  byte-identical). PHP 8.4 and 8.1 lint clean.
- Created agent context (`AGENTS.md`, `CLAUDE.md`, `context/`, `tasks/`); no previous context existed.
- 2026-10-15: strip got `clear: both` so it spans the full module width below the page path, like
  ns_feedback (verified live at two widths).
- Open: ns_license 14.5.4 not yet published; v12/v13 not tested; frontend only code-read; security issue
  reported privately (see `core.md`).

## 2026-10-15 — Context audit

- 2026-10-15: corrected plugin type / no-op `page.tsconfig`, non-existent `FileReference` model, IP match
  (substring, not prefix); added `endtime` enable-column auto-off and backend script list (code-read).
