Font Awesome helper
===================

This is a small helper extension for inlining/linking font awesome icons. It uses [Font-Awesome-SVG-PNG](https://github.com/encharm/Font-Awesome-SVG-PNG) for the icons.

It provides two main twig functions, `fa` and `fai`.

`fa` will create a img tag with the desired icon in svg as it's src.

`fai` will inline the icons svg in the html.

They both take three arguments:

* icon (default: fire): which icon you want. You can see the choices at [fontawesome.io](http://fontawesome.io)
* color (default: black): either `black` or `white`. When using the inliner the color can be any valid CSS color.
* size (default: 18): the size in px you want to show the font as. You can override this in your own css if you want.

The icons should work pretty well with screen readers (as opposed to the normal font awesome) since it sets alt-text for the img tags and sets role and aria-label attributes for the inline svg tag.

If you use HTTP2 I recommend that you use the `fa` function, otherwise it might be best to use `fai`.

It also has a third twig function, `fasrc`, which just provides you with the url to the icon, for use in background images and somesuch.

### Examples

Inline the amazon icon:

`{{fai('amazon')}}`

Inline a gold-ish google icon at 36px:

`{{fai('google', '#b08643', 36)}}`

Link to a black github icon at 300px:

`{{fa('github', 'black', 300)}}`

Use the globe icon as a background image on a div:

`<div style="background-image:url({{fasrc('globe')}});background-size:cover;height:30px;width:30px;"></div>`