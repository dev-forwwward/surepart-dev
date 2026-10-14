# SurePart — local stub theme

A throwaway WordPress theme for building the SurePart pages in Local before the
PartsTrader backup arrives. It follows Sean's conventions: page-{slug}.php
templates, ACF Pro fields registered in code, vanilla JS, no page builder.

## Setup in Local
1. Local → "+" → Create a new site (Preferred environment is fine).
2. Open WP Admin → Appearance → Themes → Add New → Upload Theme → choose surepart-dev.zip → Activate.
   (Activation creates a published page with slug "surepart".)
3. Plugins → install ACF Pro (licence from the client). Free ACF will load
   the page, but repeaters and the options page need Pro.
4. Settings → Permalinks → "Post name" → Save.
5. Visit /surepart/.

Optional: Appearance → Menus → assign the three "SurePart —" locations.
Until then the nav and footer use built-in default links.

## Moving to the real theme
See SUREPART-FILES.md.
