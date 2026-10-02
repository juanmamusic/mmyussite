MMY US — website prototype
============================

CONTENTS
--------
8 HTML pages (self-contained, no build step) + local asset folders:

  index.html                  Home
  about.html                  About
  projects.html                Projects
  floor-plans.html             Floor Plans
  press.html                   Press
  news.html                    News (newsletter archive)
  tender-opportunities.html    Tender Opportunities
  invest.html                  Invest (not linked in navigation — see NOTES)
  images/                      6 local interior photos used on the Home page
  images/floor-plans/          6 exterior renders used on the Floor Plans page
  floor-plans/                 6 downloadable floor plan PDFs (Richmond,
                                Clarence Duplex, Clarence Townhomes, Hanover,
                                Windsor, Tudor)

  All other images/video on the site are hotlinked from the live
  mmyus.com CDN — nothing else to upload for those.

HOW TO DEPLOY
-------------
1. Upload every file and all three folders (images/, images/floor-plans/,
   floor-plans/) AS-IS to the ROOT of the destination (e.g. public_html/,
   www/, or htdocs/) — do not rename any file or folder, all internal
   links are relative and case-sensitive.
2. index.html is the homepage — most hosts serve it automatically at
   the domain root. If not, set it as the default/index document.
3. No database, no server-side code, no build process required —
   pure static HTML/CSS/JS (Bootstrap 5 via CDN).

NOTES
-----
- invest.html is built and fully functional but intentionally NOT
  linked from any nav, mobile menu or footer (the client isn't
  raising right now). It still works if visited directly, and can be
  relinked in nav/mobile-menu/footer on all 8 pages by re-adding:
  <a href="invest.html">Invest</a> — easy to restore when ready.
- Floor Plans page now shows 6 real MMY US models (Richmond, Clarence
  Duplex, Clarence Townhomes, Hanover, Windsor, Tudor) with real
  exterior photos and a PDF download for each, filterable by bedroom
  count (2/3/4 bed).
- Press page now shows a thumbnail next to each of the 17 articles —
  real article images where the source site exposed one, a styled
  fallback icon where it didn't (a few sources are Google Drive
  scans or sites with no usable og:image).
- Projects catalog (bottom of Projects page) had 2 placeholder/fake
  entries ("Rapid Housing Initiative") — replaced with 2 real MMY US
  projects (Windsor model / Louisville & Cleveland, and the 9-Plex /
  Rebound project), reusing already-verified real photos and data.
- All content, stats and images are sourced from the live mmyus.com
  site or supplied directly by the client, per their no-fabrication
  requirement.
- Privacy Policy / Terms of Service links are placeholders (not
  prioritized for this prototype per client feedback).
