MMY US — website
================

CONTENTS
--------
  index.html                          Home
  about.html                          About (now includes factories, "Quadplex to 72-Plex", 4 facades)
  projects.html                       Projects (featured cards open the case studies)
  case-study-elizabeth.html           Case study — Elizabeth, LEED Platinum two-storey home
  case-study-windsor.html             Case study — Windsor, LEED Platinum single-storey home
  case-study-nine-plex.html           Case study — MMY US 9-Plex, LEED Gold multi-family
  case-study-sellersburg.html         Case study — Sellersburg Scholar House, 36 units
  case-study-mcc-medical-center.html  Case study — MCC Medical Center Campus, 60 units
  press.html                          Press
  news.html                           News
  tender-opportunities.html           Tender Opportunities
  invest.html                         Invest (built, NOT linked in navigation)
  images/                             Photos, favicons, REDS10 Group logo
  images/media/                       Home page video (placeholder until the factory flythrough file is supplied)
  images/case-studies/                9-Plex renders used on its case study

  Some images still load from the current site's Webflow CDN
  (cdn.prod.website-files.com). Keep the Webflow plan active until
  those images are copied into images/ — otherwise they will break.

HOW TO DEPLOY
-------------
1. Upload every file and folder AS-IS to the web root (e.g. public_html/).
   Do not rename anything — links are relative and case-sensitive.
2. index.html is the homepage.
3. Static HTML/CSS/JS only (Bootstrap 5 via CDN). No database or build step.

NOTES
-----
- Floor Plans page removed from the site and all navigation (client
  request). The previous page, its PDFs and images are kept separately
  in _archive/floor-plans-page/ (outside this folder) in case it returns.
- invest.html is unlinked but works if visited directly. To relaunch,
  add <a href="invest.html">Invest</a> back to the nav, mobile menu and
  footer of each page.
- Contact form is front-end only until a form handler is connected
  (submissions should go to hello@mmyus.com).
- Privacy Policy / Terms of Service links are placeholders.
