# AGENTS.md — nitsan_maintenance (Maintenance Mode)

Agent router for the Maintenance Mode free extension. Load only what your task needs.

> **Principles:** `context/principles.md`
> **Session log:** `context/session-state.md`
> **Doc index:** `context/docs-map.md`

---

## Always load

| File | Why |
|---|---|
| `context/principles.md` | Guardrails, "nothing that works may break" rule |
| `context/core.md` | Identity, TYPO3/PHP/ns_license constraints, tooling, known issues |

---

## Task router

| Task | Load |
|---|---|
| Frontend switch: TypoScript conditions, whitelists, maintenance page, countdown, subscription mail | `context/features/maintenance-frontend.md` |
| Backend module "Maintenance Mode": settings form, image upload, storage page | `context/features/backend-module.md` |
| Premium strip / free trial / ns_license dependency | `context/features/premium-cta.md` |
| Files, classes, TypoScript structure, assets | `context/architecture.md` |
| Lint / validate / manual test | `tasks/run-quality.md` |
| Update agent context after a change | `tasks/context-update.md` |

---

## Feature status

| Feature | Status | Agent entry |
|---|---|---|
| Replace every frontend page with a maintenance page (IP / frontend user whitelists, countdown, subscription) | Done (code-read) | `context/features/maintenance-frontend.md` |
| Backend module to edit the single maintenance record | Done (renders on v14.3.7) | `context/features/backend-module.md` |
| Premium strip in the backend module + ns_license free-trial deep link | Done (needs ns_license 14.5.4 release) | `context/features/premium-cta.md` |

---

## Quick commands

```bash
cd packages/nitsan_maintenance     # or typo3conf/ext/nitsan_maintenance in Classic mode
for f in $(find . -name "*.php" -not -path "./.git/*"); do php -l "$f"; done
composer validate --no-check-publish
for f in Resources/Private/Language/*.xlf; do xmllint --noout "$f"; done
```
