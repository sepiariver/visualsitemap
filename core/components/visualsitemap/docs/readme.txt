# visualSitemap

A Visual Sitemap Generator: Perfect for pre-design work and getting client signoffs.

visualSitemap uses Wayfinder to replicate your Resource Tree in a nicely styled, HTML/CSS sitemap with clickable links.  Get a jump on development as well, because the Resource Tree will already be populated with the site's architecture ;)

Uses [SlickMap CSS by Matt Everson of Astuteo](http://astuteo.com/slickmap)

(He's an EE guy, but donate to show him how awesome the MODX community is ;) - and to let him know you appreciate his work!


OLD VERSION DESCRIPTION
Slight modification to the initial beta release (see Change Log for details). Possibly works in other versions of Revolution, but only tested in 2.2.6. Beta testing results and feedback welcome!

----------------------------

USAGE

----------------------------

Use visualSitemap by calling the Chunk into your template or content field, like this:

[[$visualSitemap]]

You can optionally use the sample visualSitemapTemplate which displays a bare HTML page with visualSitemap as its only content.

The Chunk contains a Wayfinder Snippet call that generates a menu of the whole site. The default Snippet tpls assign CSS selectors to the menu containers for the default slickmap.css styles.

An example with options:

[[$visualSitemap? &outerTpl=`visualSitemap.outerUtil.tpl`]]

&outerTpl => name of the chunk to use as Wayfinder's outer template. The visualSitemap.outerUtil.tpl differs from the default tpl in that it displays the first-level menu items only. It can be used to show a secondary "utility" menu, in addition to the primary one, by calling the chunk twice, once for each tpl. Or simply add another Wayfinder call.

You can override the default CSS by:

Overriding the styles in a custom CSS file.
Removing the visualSitemapCSS Snippet from the visualSitemap Chunk. This Snippet registers the slickmap.css file into the head of the document. Removing it will render an unstyled Wayfinder menu.
Specifying your own CSS file by adding &file property to the visualSitemapCSS Snippet call: [[visualSitemapCSS? &file=`myCSS.css`]]
Use your own Wayfinder Snippet tpls. The default styles will have no effect unless you use the default selectors.
However, there's really not much point in that case, as the value of this Addon really lies in the integration of slickman.css styles, producing a visual HTML/CSS sitemap out-of-the-box.

Note: this package includes a custom Snippet "getCount" that helps sets a class to the default menu container according to how many top-level menu items exist in the Resource Tree.