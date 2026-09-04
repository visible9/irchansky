# IR4 Single Page — theme guide for AI agents


A classic (non-block) WordPress starter theme for **single-page sites**. It ships with no design of its own: the look is deliberately modern and minimal, and the theme is reused as the starting point for new projects, so nothing project-specific belongs in it.

A multi-page sibling theme exists separately. Keep this one focused on one-page layouts.

## Mental model

A page is assembled from **sections**. One section = one PHP file = one shortcode. The client puts shortcodes into the page content, and every section renders its own markup, its own CSS and its own fields. Nothing about the layout is editable from the WordPress editor, which is the point: the client edits text and images, never markup.

```
page content:  [home_banner]  [home_about]  [home_services]  ...
                     |              |              |
template-parts/sections/home/home-banner.php   (markup + <style> + fields)
```



## File map


| Path                                                              | Role                                                                                                                                                                                              |
| ----------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `style.css`                                                       | Theme header only. **No styles here.**                                                                                                                                                            |
| `theme-styles.php`                                                | All global CSS: variables, typography, buttons, forms, layout, header, footer, animations. Printed inline in `wp_head` so WordPress never serves a stale cached copy.                             |
| `functions.php`                                                   | Theme supports, Carbon Fields boot, `section_field()` helper, performance filters.                                                                                                                |
| `shortcodes.php`                                                  | Registers one shortcode per section.                                                                                                                                                              |
| `includes/fields.php`                                             | All Carbon Fields definitions.                                                                                                                                                                    |
| `includes/theme-changes.php`                                      | Global vanilla JS: lazy loading, scroll animations, mobile menu close. Hooked to `wp_footer`.                                                                                                     |
| `template-parts/sections/home/*.php`                              | The 14 home sections.                                                                                                                                                                             |
| `header.php` / `footer.php`                                       | Sticky masthead and dark footer.                                                                                                                                                                  |
| `index.php`, `archive.php`, `search.php`, `single.php`, `404.php` | Blog fallbacks. `blog-styles.php` and `single-blog-styles.php` hold their CSS.                                                                                                                    |
| `fonts/`                                                          | Self-hosted, one subfolder per family: `space-grotesk/` (heading, variable 500–700, latin only - no Cyrillic exists for this family), `manrope/` (body, variable 400–700, latin + cyrillic) and `jetbrains-mono/` (accent/mono, variable 400–500, latin + cyrillic). `site-fonts.css` declares all `@font-face` rules. Nothing is fetched from Google at runtime.                                                                                                |
| `images/`                                                         | Default images shipped with the theme, used as the fallback when an image field is empty. Reference them with `get_template_directory_uri() . '/images/<file>'` as the `section_field()` default. |
| `vendor/`                                                         | Carbon Fields, installed with composer. Must ship inside the theme zip.                                                                                                                           |




## Registered shortcodes

`home_banner`, `home_services`, `home_about`, `home_team`, `home_cta`, `home_results`, `home_testimonials`, `home_social`, `home_news`, `home_contact`, `home_mission`, `home_pricing`, `home_portfolio`, `home_faq`

`home_banner`, `home_services`, `home_about`, `home_team`, `home_mission`, `home_results`, `home_portfolio`, `home_news`, `home_testimonials`, `home_cta`, `home_faq`, `home_pricing` and `home_contact` are built. The rest are empty stubs that still carry an older `apply_*_styles()` / `wp_footer` pattern — replace it with the inline `<style>` pattern described below when you build them.

## Writing a section

Follow `home-banner.php` as the reference. Structure is always: `<style>` block first, markup second.

```php
<style type="text/css">
	.home-example{position: relative; padding: 60px 0; background: var(--color-surface);}
	.home-example h2{margin: 0 0 20px;}
	@media(max-width: 750px){
		.home-example{padding: 40px 0;}
	}
</style>

<section class="home-example" id="example">
	<div class="content-width">
		<h2 class="fade-from-bottom"><?= section_field('crb_example_title', 'Default heading'); ?></h2>
	</div>
</section>
```

Hard rules:

- **CSS lives in the section file**, inside a `<style>` block placed **before** the markup.
- **One rule per line.** Never break a rule across lines — `.class { prop: value; prop: value; }` on a single line.
- **Reuse the root variables.** Never introduce a new font family, font size or colour in a section.
- **Never override global typography** (`p`, `h2`, `h3`, …) or the `.button` classes. Scope everything under the section's own class.
- **Breakpoints are only** `max-width: 750px` **and** `max-width: 1000px`**.**
- **Card grids size themselves to the number of cards.** Hold the track count in a `--columns` custom property and let quantity queries change it, so the grid reacts to what actually rendered rather than to how many fields exist:

```css
.home-x .x-grid{--columns: 4; display: grid; grid-template-columns: repeat(var(--columns), 1fr); gap: 24px;}
.home-x .x-grid:where(:has(> :nth-child(1):nth-last-child(2))){--columns: 2;}
.home-x .x-grid:where(:has(> :nth-child(1):nth-last-child(3n))){--columns: 3;}
.home-x .x-grid:where(:has(> :nth-child(1):nth-last-child(4n))){--columns: 4;}
@media(max-width: 1000px){
    .home-x .x-grid{--columns: 2;}
}
```

  `:nth-child(1):nth-last-child(n)` matches the first child only when the list is exactly that long, so the rule reads as "when there are n cards". The `:where()` is load bearing: without it `:has()` would push these rules to a higher specificity than the breakpoints below and the responsive columns would silently stop working. All the quantity rules therefore tie on specificity and the last match wins, which is why `3n` is written before `4n` — twelve cards land on four. Browsers without `:has()` simply keep the default column count. Grids of three use only the `2` and `4` rules (four cards read better as 2+2 than 3+1).

- **No BEM.** Short readable classes: `.team-member`, `.member-info`.
- **No localization** — no `__()`, `_e()`, no text domains. Hardcode English text.
- **No escaping** — no `esc_html()`, `esc_attr()`, `esc_url()`.
- **Keep templates flat.** Do not declare PHP variables above the markup; call `section_field()` inline.
- **Guard every element** with `if(section_field('crb_x', 'Default'))`, repeating the same default inside. Empty fields are how the client hides things — see the demo-mode rules under Fields.
- Add an animation class (`fade-in`, `fade-from-left`, `fade-from-right`, `fade-from-bottom`) to visual elements. A scroll script adds `.active` at 85% of the viewport; animations are disabled under 750px.
- Give the outer `<section>` an `id` so the anchor menu can reach it. `scroll-margin-top` is already handled globally.

Registering it in `shortcodes.php`:

```php
function home_example($atts, $content=null){
	ob_start();
	include(locate_template('template-parts/sections/home/home-example.php'));
	return ob_get_clean();
}
add_shortcode('home_example', 'home_example');
```



## Design tokens

Defined on `:root` in `theme-styles.php`, with overrides at 1000px and 750px.

```
--color-1     #16170f   ink: body text, dark surfaces, primary button
--color-2     #d0f828   accent: links, hover, active states - a bright lime, always paired with dark text
--color-3     #5c5e51   muted text
--color-bg    #f3f3ef   page background
--color-surface #ebebe4 light section background
--color-border  #d6d6d2 hairlines
--color-inverse #ffffff text on dark backgrounds
--color-on-accent #16170f text on the accent colour - the accent is light, so this stays dark ink, never white

--xl 64px  --lg 44px  --md 30px  --sm 20px  --default 17px  --xs 14px
(h1 = xl, h2 = lg, h3 = md, h4 = sm)

--heading-font: Space Grotesk   --default-font: Manrope   --accent-font: JetBrains Mono
--content-width 1200px   --gutter 24px   --radius 14px
--header-height 76px     --transition .25s ease
```

Five of these are editable by the client under Appearance > Customize > Colours: `--color-1`, `--color-2`, `--color-3`, `--color-surface` and `--color-border`. `theme_palette()` in `functions.php` is the single map of what is exposed; `palette_overrides()` prints a second `:root` block at the end of `theme-styles.php` holding only the values that differ from the theme defaults, so an untouched site ships no override at all.

`--color-bg`, `--color-inverse` and `--color-on-accent` are deliberately not exposed. Flipping the page background needs the whole palette rethought, not one value swapped, and `--color-on-accent` only makes sense paired with a light accent — if a client ever picked a dark accent through the customizer, text sitting on it would need to flip to `--color-inverse` instead, which is a design decision, not a colour swap.

Because the accent is light, it must never be used as a text colour against the page background or `--color-surface` — only as a background (paired with `--color-on-accent`) or as a decorative accent (an underline, a border, a dot) where WCAG text-contrast rules don't apply. `a`, `.main-menu` link states and `.footer-col a:hover` all follow this: the text stays `--color-1` and only a thin underline/box-shadow picks up `--color-2`. `.footer-cta:hover` is the one place accent text is used directly, because it sits on the dark `--color-1` footer background, where it reads fine.

This is the real reason sections may never introduce a colour of their own: a hardcoded hex silently stops following the client's palette. Translucent overlays are the one exception the theme already makes — `rgb(15 15 17 / 40%)` for a gradient or a shadow, because `color-mix()` on a custom property is more machinery than a shadow deserves. Keep those to overlays and shadows, never to text or a background a reader looks at.

## Utility classes to reuse

- `.content-width` — the centred 1200px container with gutters.
- `.section-padding` — the standard vertical rhythm between sections.
- `.surface` / `.dark` — light grey or ink background; `.dark` also flips heading colours.
- `.eyebrow` — small uppercase label above a heading.
- `.lead` — larger muted intro paragraph. `.muted` — muted text.
- `.button` and `.button.secondary`, wrapped in `.button-container` for a row of buttons.
- `.absolute-cover` — absolutely positioned, `object-fit: cover` fill; add `.flex` to centre children.
- `.fade-in`, `.fade-from-left`, `.fade-from-right`, `.fade-from-bottom`.



## Fields (Carbon Fields)

Carbon Fields lives in the theme's `vendor/`, not as a plugin. The client installs the theme and the fields are simply there — no plugin, no licence, no importing field groups, and no admin UI that could delete a field.

- Definitions go in `includes/fields.php`. Container is `post_meta` conditioned on `post_type = page`; the fields sit on whichever page holds the shortcode.
- **Admin labels must be in English.**
- Field names are prefixed `crb_<section>_<name>`, e.g. `crb_banner_title`.
- Read values **only** through the helper:

```php
<?= section_field('crb_banner_title', 'Fallback heading'); ?>
```

`section_field()` runs a **per-section demo mode**, which is the rule every template has to be written around:

- While a section has no content at all, every field of that section returns its default. A fresh install looks finished instead of empty.
- The moment the client fills **any** field of that section, the section goes live and an empty field returns an empty string. That is how an element gets hidden — the client clears the text and it disappears. No `hide` checkboxes anywhere.
- Sections are independent: filling in About does not switch Banner out of demo mode. `section_has_content()` decides by the `_crb_<section>_` meta prefix, so the `crb_<section>_<name>` naming is load-bearing, not cosmetic.
- Without `vendor/` the defaults are always returned, so the theme never fatals and never renders blank.

**Therefore: wrap every element in** `if(section_field(...))` **with the same default you print.** A heading, a paragraph, an image, a whole stats row — anything that can end up empty in live mode needs a guard, or the page will render empty tags. Carbon Fields writes a meta row for every field on save, including empty ones, so detection is by non-empty *value*, never by the key existing.

Admin `html` note fields must be named `crb_<section>_note`; that suffix is skipped by `section_has_content()` because Carbon Fields exposes the note markup as the field's `default_value` and it can end up saved as meta.

Never call `carbon_get_the_post_meta()` directly in a section, and never let a section fatal when the library is missing.

Image fields use `->set_value_type('url')` so templates get a URL and stay flat.

Repeating content uses a `complex` field, `crb_team_members` being the reference — the client decides how many rows there are, so a fixed set of `crb_x_item_1_*` slots is only right when the count is part of the design. It stays inside demo mode: an empty complex reads as no content, so the section prints the demo array passed as the `section_field()` default and the template keeps one copy of the card markup. Write that default as one `array(...)` per row inline in the `foreach`, and guard the row on whichever subfield is required (a member with no name is skipped). A `complex` nested inside a `complex` works too, which is how each member carries its own social links.

Social links go through `social_networks()` in `functions.php` — one map holding the label, the inline SVG icon and the admin option list. `social_icon()` and `social_label()` read from it, `social_network_options()` feeds the `select` in `includes/fields.php`. Add a network there and nothing else changes.

A section can also draw its content from WordPress instead of from fields — `home_news` is the reference. It lists the three latest posts with `get_posts()` and falls back to three hardcoded demo cards while the blog is still empty, so the fields only cover the heading and the button. Real posts without a featured image fall back to a theme placeholder from `images/`.

Everything lives in one `Page Sections` container with `->set_layout('tabbed-vertical')` and an `add_tab()` per section, so 14 sections do not become 14 metaboxes. Add a tab, never a second container.

Gotcha: Carbon Fields stores meta with a leading underscore. `get_post_meta($id, 'crb_banner_title')` returns nothing — the real key is `_crb_banner_title`.

Gotcha: a `complex` subfield must not be called `value`. Complex rows are stored as `_field|subfield|row|index|value`, so that name collides with the trailing segment — the row saves with an empty subfield slot and reads back as an empty array, silently. `home_results` uses `number` for exactly this reason. `_type` is taken as well.

## Forms

The theme ships no form of its own. A section that needs one carries a plain text field for a shortcode — `crb_cta_form`, `crb_contact_form` — and the client pastes in whatever their form plugin gives them, so the theme stays plugin agnostic. Print it through the helper, never through `do_shortcode()` directly:

```php
<?php if(section_form('crb_contact_form')){ ?>
	<div class="contact-form"><?= section_form('crb_contact_form'); ?></div>
<?php } ?>
```

`section_form()` expands the tag and returns an empty string when nothing expanded. That second part matters: with the plugin deactivated or the theme moved to another site, `do_shortcode()` hands the tag straight back and a literal `[formidable key=x]` would be printed on the page.

Form fields need no plugin specific CSS. The global form styles in `theme-styles.php` are written against element selectors — `input[type="email"]`, `textarea`, `select` — so any plugin's markup picks them up, and submit buttons are covered by `input[type="submit"], button[type="submit"]` for the same reason. Never add `.frm_*` or `.wpcf7-*` rules. Do not reach for the plugin's "disable styling" setting either: plugins hide their spam honeypot with their own CSS — Formidable's is a plain `input type="text"` — and switching that stylesheet off puts the honeypot on the page as a visible field. On a dark panel, re-colour the submit inside the section the way `home_cta` does.

Laying a form out beyond what element selectors reach — putting a single field and its submit on one row, for instance — is a job for a few lines of section JavaScript rather than for guessed class names. `home_cta` walks up from the field until it finds the ancestor that also holds the submit, tags that ancestor and the two branches with its own classes, and styles those. It survives any plugin's wrapper depth, and it skips empty wrappers left in the markup while never touching a real control, honeypots included.

There is no demo form. Until a shortcode is pasted the form area is simply absent, which leaves containers that would otherwise hold empty space. `home_cta` and `home_contact` deal with that in CSS rather than with long `if` chains — `:not(:has(> *))` hides an empty column, and a section with nothing left in it hides itself.

## Images and lazy loading

The theme disables WordPress lazy loading, `srcset` and `decoding`, and runs its own script in `includes/theme-changes.php`. It swaps `data-url` → `src` and `data-bg-img` → inline background when the element approaches the viewport.

A `the_content` filter rewrites `src="` to `data-url="`, but it runs at priority 10, before shortcodes expand at priority 11 — so **images output by a section keep a normal** `src` and load eagerly. That is correct for above-the-fold content. For heavy images further down the page, write `data-url` yourself instead of `src`.

## JavaScript

Vanilla only, no jQuery. Global behaviour belongs in `includes/theme-changes.php`; anything section-specific goes in a `<script>` inside the section file. Use readable variable names and avoid inventing custom `data-` attributes.

A full screen overlay (the portfolio lightbox is the reference) is written inside the section file but moved to the end of `<body>` by its own script, so no ancestor can clip a `position: fixed` element. Its CSS is therefore keyed off its own top level class rather than the section class, and it reads its content out of the DOM — the tile's `img` and its `.item-title` / `.item-category` — instead of carrying invented `data-` attributes.

## Content

Approved copy always beats text found in a design. Skip placeholder instructions wrapped in brackets `[...]`.

## Local development

- Neither `php` nor `composer` is on `PATH`. Use `D:\OSPanel\modules\PHP-8.3\php.exe`, and a downloaded `composer.phar` run through it.
- Lint before finishing: `D:/OSPanel/modules/PHP-8.3/php.exe -l <file>`.
- The dev site is `http://ir4-single-page.local/`; `curl` against it is the quickest way to confirm a section renders without notices.

