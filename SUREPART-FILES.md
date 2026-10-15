# SurePart — files to move into the PartsTrader theme

Sean asked for every edited file to be tracked so he can FTP them specifically.

## New files (copy as-is into the theme root)
- inc/surepart.php
- inc/surepart-fields.php
- inc/surepart-content.php
- inc/surepart-contact.php
- header-surepart.php
- footer-surepart.php
- page-surepart.php
- template-surepart-platform.php
- template-surepart-about.php
- template-surepart-contact.php
- template-parts/surepart/home/hero.php
- template-parts/surepart/home/opportunity.php
- template-parts/surepart/home/platform.php
- template-parts/surepart/home/platform-ui.php
- template-parts/surepart/home/approach.php
- template-parts/surepart/home/cta.php
- template-parts/surepart/platform/ (hero, features, results, split, visual-*)
- template-parts/surepart/about/ (hero, intro, team, backers)
- template-parts/surepart/shared/cta-band.php
- assets/surepart/ (css, js, img, img/team, fonts)

## Edited existing files
- functions.php — add ONE line at the end:
  require_once get_stylesheet_directory() . '/inc/surepart.php';

## Pages to create in WP Admin
All are children of the "SurePart" page (slug `surepart`). Set the template under Page Attributes:

| Page                     | Slug                       | Template            |
|--------------------------|----------------------------|---------------------|
| Price Confidence         | `price-confidence`         | SurePart — Platform |
| Estimate Accuracy        | `estimate-accuracy`        | SurePart — Platform |
| Operational Intelligence | `operational-intelligence` | SurePart — Platform |
| About                    | `about`                    | SurePart — About    |
| Contact                  | `contact`                  | SurePart — Contact  |

The platform template picks its copy and illustration from the slug, so keep
those slugs. Every ACF field is optional; empty fields fall back to the design copy.

Contact form submissions are emailed with wp_mail() to SurePart Settings →
"Contact form recipient" (defaults to the site admin email). Check that the
site's SMTP setup delivers mail.

## NOT part of the deliverable (stub only)
- style.css, index.php, the rest of this stub functions.php
