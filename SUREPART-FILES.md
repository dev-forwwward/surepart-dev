# SurePart — files to move into the PartsTrader theme

Sean asked for every edited file to be tracked so he can FTP them specifically.

## New files (copy as-is into the theme root)
- inc/surepart.php
- inc/surepart-fields.php
- header-surepart.php
- footer-surepart.php
- page-surepart.php
- template-parts/surepart/home/hero.php
- template-parts/surepart/home/opportunity.php
- template-parts/surepart/home/platform.php
- template-parts/surepart/home/platform-ui.php
- template-parts/surepart/home/approach.php
- template-parts/surepart/home/cta.php
- assets/surepart/ (css, js, img, fonts)

## Edited existing files
- functions.php — add ONE line at the end:
  require_once get_stylesheet_directory() . '/inc/surepart.php';

## NOT part of the deliverable (stub only)
- style.css, index.php, the rest of this stub functions.php
