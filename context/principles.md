# nitsan_maintenance — Operating Principles

*Every change to code, context or docs must serve the goals below.*

---

## Goal 1 — Nothing that works may break

The extension declares TYPO3 v12–v14 (Composer and Classic mode), see `core.md`.

- Keep every declared major working. Follow the existing version switches (`Typo3Version` major checks in
  `FrontendUserConditionFunctionsProvider` and `MaintenanceController`, the `navigationComponent` switch in
  `Configuration/Backend/Modules.php`) instead of inventing new ones.
- Lowest PHP is 8.1 (TYPO3 12): no PHP 8.2+ syntax such as `readonly` classes or DNF types.
- The TypoScript conditions run on **every** frontend request of every site that includes the static template
  or the site set. A fatal error or slow query there takes the whole site down; test the frontend after any
  change in `Classes/ExpressionLanguage/`.
- Both configuration paths must keep working: the classic static template (`plugin.tx_nitsanmaintenance_mode.*`,
  `module.tx_nitsanmaintenance_maintenance.*` constants) and the site set (`nitsanMaintenance.*` settings).
- `MaintenanceController` serves the backend module **and** the frontend plugin. Do not add constructor
  dependencies that only make sense in the backend; create them lazily where they are used.
- Prefer the smallest change that fixes the root cause. No drive-by refactors.
- Run `tasks/run-quality.md` and re-test the affected flow before claiming done.

## Goal 2 — Token-cost efficiency (agent context)

- **DRY context:** each fact lives in exactly ONE file. Reference, don't copy.
- **Load on demand:** read `context/features/<area>.md` for the task, not everything.
- **Prune as you go:** keep `context/session-state.md` short.

## Goal 3 — Accuracy and trust

- Answer from context + code, never from invented API, table or field names.
- Mark statements as verified live or code-read; conflicting facts across files = fix the source file.

---

## Guardrails (non-negotiable)

- Never lock editors or visitors out by accident: a change to the conditions or the whitelist logic must be
  tested with maintenance mode on and off, logged in and logged out.
- Installing the premium version through ns_license replaces this extension's folder: never keep user data in
  files below the extension (uploads go to fileadmin `user_upload/`).
- Do not change ns_license from a nitsan_maintenance task; reuse its module and trial modal.
- Security findings are reported privately to the maintainers, not written into this public repository.
- All UI text goes into the English `Resources/Private/Language/*.xlf` files, no hard-coded labels. The `de.*`
  files are not touched.

---

## Apply this whenever you

- Edit `context/` or `AGENTS.md`
- Land a feature or bugfix (update the matching `context/features/*.md` + `session-state.md`)
