---
title: Apple & Live
authors:
- ola-kleiven
tags:
- sitepatching
license: cc-by-3.0
---

## Added patches

PATCH-389 Live Calendar does not respond to mouse due to event.button being W3C-compatible
PATCH-389 Live Calendar events are shown in squished box because table cells are containers for positioned descendants

PATCH-387 Make Apple.com menu visible in 11.10. Support for CSS gradient makes site add an extra stylesheet with fancy effects. Unfortunately they also hit a different Opera bug in this stylesheet.
PATCH-385 Apple.com thinks Opera&#39;s CSS property vendor prefix is <i>o</i> instead of <i>O</i> on JS properties

PATCH-386 Fix Facebook Comments script. Similar to Facebook Connect attachEvent issue (we&#39;re still not IE!)

PATCH-281 messed up layout in lower part of page due to wrong percentage rounding on g4tv.com




