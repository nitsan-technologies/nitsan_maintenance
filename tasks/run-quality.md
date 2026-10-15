# Run quality checks

The repo has no PHPUnit, PHPStan or CS config. Available checks:

```bash
# PHP syntax; also run once with PHP 8.1, the lowest version TYPO3 12 supports
for f in $(find . -name "*.php" -not -path "./.git/*"); do php -l "$f"; done

# composer.json
composer validate --no-check-publish

# XLF well-formedness
for f in Resources/Private/Language/*.xlf; do xmllint --noout "$f"; done
```

## Manual test (per TYPO3 major 12 / 13 / 14)

1. T3Planet → Maintenance Mode: the premium strip sits above the "Maintenance Mode Settings" card. Without
   ns_license active the strip is not shown and the module still works.
2. "Start Free Trial" (as system maintainer) opens the ns_license module and its trial modal with
   "Maintenance (nitsan_maintenance)" preselected. Cancel; don't start a trial.
3. Save the form with and without a logo / background image; an end date in the past shows an error.
4. Frontend with the static template or the site set included, visibility "Show":
   - logged out: every page shows the maintenance page; a whitelisted IP sees the site;
   - logged in as a whitelisted / non-whitelisted frontend user;
   - visibility "Hide": the normal site is back.
5. Subscription with and without an admin e-mail configured.
6. Check light and dark backend themes.

Set visibility back to "Hide" and remove test records afterwards.
