<style type="text/css">
	/*
	* THEME SETTINGS
	* Colors, type scale, layout tokens, header and footer.
	* Printed inline in wp_head so WordPress never caches a stale version.
	* Section-specific CSS lives inside each section file in template-parts/sections/home/.
	*/

	/*Theme Variables*/
	:root {
		/*site colors*/
		--color-1: #16170f;
		/*ink: text, dark surfaces, primary button*/
		--color-2: #d0f828;
		/*accent: links, hover, active states - a bright lime, paired with dark ink text, never white*/
		--color-3: #5c5e51;
		/*muted text*/
		--color-bg: #f3f3ef;
		--color-card: #f9f9f6;
		--color-surface: #ebebe4;
		/*light section background*/
		--color-border: #d6d6d2;
		--color-inverse: #ffffff;
		/*text on dark backgrounds*/
		--color-on-accent: #16170f;
		/*text on the accent colour - stays dark since the accent is light*/
		--ink-faint: #6c6d66;
		/*section background*/
		--beige-gradient: linear-gradient(180deg, var(--color-bg) 0%, var(--color-surface) 100%);


		/*font sizes*/
		--xl: 64px;
		--lg: 44px;
		--md: 30px;
		--sm: 20px;
		--default: 17px;
		--xs: 14px;
		--xxs: 12px;

		/*font families*/
		--heading-font: "Space Grotesk", "Manrope", -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
		--default-font: "Manrope", -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
		--accent-font: "JetBrains Mono", ui-monospace, "SFMono-Regular", Menlo, monospace;

		/*layout*/
		--content-width: 1200px;
		--gutter: 24px;
		--radius: 14px;
		--header-height: 76px;
		--transition: .25s ease;
		--border-radius-def: 3px;
	}

	@media(max-width: 1000px) {
		:root {
			--xl: 48px;
			--lg: 36px;
			--md: 26px;
			--sm: 19px;
			--default: 16px;
			--xs: 14px;
			--header-height: 66px;
		}
	}

	@media(max-width: 750px) {
		:root {
			--xl: 36px;
			--lg: 28px;
			--md: 22px;
			--sm: 18px;
			--default: 16px;
			--xs: 13px;
			--gutter: 18px;
			--header-height: 62px;
		}
	}


	/*Default Overall Styles*/
	html {
		scroll-behavior: smooth;
	}

	* {
		box-sizing: border-box;
	}

	body {
		margin: 0;
		background: var(--color-bg);
		color: var(--color-1);
		font-family: var(--default-font);
		font-size: var(--default);
		line-height: 1.65;
		-webkit-font-smoothing: antialiased;
		font-variant-ligatures: none;
		overflow-anchor: none;
	}

	img,
	svg,
	video {
		max-width: 100%;
		height: auto;
	}

	iframe {
		max-width: 100%;
	}

	a {
		color: var(--color-1);
		text-decoration: underline;
		text-decoration-color: var(--color-border);
		text-decoration-thickness: 1px;
		text-underline-offset: 3px;
		transition: text-decoration-color var(--transition);
	}

	a:hover {
		text-decoration-color: var(--color-2);
	}

	hr {
		border: 0;
		border-top: 1px solid var(--color-border);
		margin: 2em 0;
	}

	::selection {
		background: var(--color-1);
		color: var(--color-inverse);
	}

	[class*="wp-block-"] {
		position: relative;
		z-index: 2;
	}


	/*Font Defaults*/
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		font-family: var(--heading-font);
		font-weight: 600;
		line-height: 1.12;
		letter-spacing: -.01em;
		color: var(--color-1);
		margin: 0 0 .5em;
	}

	h1 {
		font-size: var(--xl);
	}

	h2 {
		font-size: var(--lg);
	}

	h3 {
		font-size: var(--md);
	}

	h4 {
		font-size: var(--sm);
	}

	h5,
	h6 {
		font-size: var(--default);
	}

	p,
	ul,
	ol,
	li {
		font-family: var(--default-font);
		line-height: 1.65;
	}

	p {
		margin: 0 0 1em;
	}

	p:last-child {
		margin-bottom: 0;
	}

	strong {
		font-weight: 600;
	}

	.eyebrow {
		display: inline-flex;
		align-items: center;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 500;
		letter-spacing: .12em;
		text-transform: uppercase;
		background: var(--color-2);
		color: var(--color-on-accent);
		padding: 6px 16px;
		border-radius: var(--border-radius-def);
		margin: 0 0 1em;
	}

	.accent-word {
		background: var(--color-2);
		color: var(--color-on-accent);
		padding: 0 8px;
		border-radius: 3px;
		box-decoration-break: clone;
		-webkit-box-decoration-break: clone;
	}

	.lead {
		font-size: var(--sm);
		line-height: 1.55;
		color: var(--color-3);
	}

	.muted {
		color: var(--color-3);
	}

	.mono {
		font-family: var(--accent-font);
	}


	/*Button Styles*/
	.button,
	.button-container a {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		gap: 8px;
		background: var(--color-2);
		color: var(--color-on-accent);
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		line-height: 1;
		padding: 15px 28px;
		border: 1px solid var(--color-2);
		border-radius: var(--border-radius-def);
		cursor: pointer;
		text-decoration: none;
		transition: box-shadow var(--transition), transform var(--transition);
	}

	.button:hover,
	.button-container a:hover {
		transform: translateY(-2px);
		box-shadow: 0 8px 26px -8px color-mix(in oklab, var(--color-2) 85%, var(--color-1) 15%);
	}

	.button.secondary {
		background: transparent;
		color: var(--color-1);
		border-color: var(--color-border);
	}

	.button.secondary:hover {
		background: var(--color-2);
		border-color: transparent;
	}

	.button-container {
		display: flex;
		flex-wrap: wrap;
		gap: 12px;
	}

	/*Submit buttons come from whichever form plugin the client uses, so they are styled by element, not by class.*/
	input[type="submit"],
	button[type="submit"] {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		width: auto;
		background: var(--color-2);
		color: var(--color-on-accent);
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 600;
		line-height: 1;
		padding: 15px 28px;
		border: 1px solid var(--color-2);
		border-radius: 500px;
		cursor: pointer;
		transition: background var(--transition), border-color var(--transition), color var(--transition), transform var(--transition);
	}

	input[type="submit"]:hover,
	button[type="submit"]:hover {
		background: var(--color-1);
		border-color: var(--color-1);
		color: var(--color-inverse);
		transform: translateY(-2px);
	}


	/*Form Defaults*/
	input,
	textarea,
	select,
	button {
		font-family: var(--default-font);
		font-size: var(--default);
		color: var(--color-1);
	}

	input[type="text"],
	input[type="email"],
	input[type="tel"],
	input[type="url"],
	input[type="search"],
	input[type="number"],
	textarea,
	select {
		-webkit-appearance: none;
		appearance: none;
		width: 100%;
		padding: 14px 16px;
		background: var(--color-bg);
		border: 1px solid var(--color-border);
		border-radius: 10px;
		outline: none;
		transition: border-color var(--transition);
	}

	input:focus,
	textarea:focus,
	select:focus {
		border-color: var(--color-1);
	}

	textarea {
		min-height: 150px;
		resize: vertical;
	}

	::placeholder {
		color: var(--color-3);
		opacity: 1;
	}

	label {
		font-size: var(--xs);
		font-weight: 500;
	}


	/*Layout*/
	#main {
		position: relative;
		overflow-x: clip;
	}

	/*clip, not hidden: hidden makes #main a scroll container and kills the sticky header*/
	.content-width {
		width: var(--content-width);
		max-width: 100%;
		padding: 0 var(--gutter);
		margin: 0 auto;
	}

	.section-padding {
		padding: min(140px, max(6%, 64px)) 0;
	}

	section[id] {
		scroll-margin-top: calc(var(--header-height) + 20px);
	}

	.surface {
		background: var(--color-surface);
	}

	.dark {
		background: var(--color-1);
		color: var(--color-inverse);
	}

	.dark h1,
	.dark h2,
	.dark h3,
	.dark h4 {
		color: var(--color-inverse);
	}

	.has-text-align-right {
		text-align: right;
	}

	.has-text-align-center,
	.aligncenter {
		text-align: center;
	}

	/*Absolute Covering*/
	.absolute-cover {
		position: absolute;
		left: 0;
		top: 0;
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
		object-position: center;
	}

	.absolute-cover.flex {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	/*Decorative page background - sits behind every section, never intercepts clicks*/
	/*.page-wrap only needs position:relative as a positioning context - confirmed working on the live site without its own z-index, so none is set here.*/
	.page-wrap {
		position: relative;
	}

	.bg-grid {
		position: absolute;
		inset: 0;
		z-index: 1;
		pointer-events: none;
		background-image: repeating-linear-gradient(90deg, color-mix(in oklab, var(--color-1) 7%, transparent) 0px, color-mix(in oklab, var(--color-1) 7%, transparent) 1px, transparent 1px, transparent 120px), repeating-linear-gradient(0deg, color-mix(in oklab, var(--color-1) 7%, transparent) 0px, color-mix(in oklab, var(--color-1) 7%, transparent) 1px, transparent 1px, transparent 120px);
	}

	.bg-glow {
		position: absolute;
		z-index: 1;
		pointer-events: none;
		width: 900px;
		height: 900px;
		top: -300px;
		right: -200px;
		filter: blur(10px);
		background: radial-gradient(circle, color-mix(in oklab, var(--color-2) 30%, transparent) 0%, transparent 70%);
	}

	.beige-gradient {
		background: var(--beige-gradient);
	}

	@media(max-width: 750px) {
		.bg-glow {
			width: 600px;
			height: 600px;
			right: -260px;
		}
	}


	/*Header*/
	@keyframes header-fade {
		from {
			opacity: 0;
		}

		to {
			opacity: 1;
		}
	}

	.masthead {
		position: sticky;
		top: 0;
		z-index: 100;
		background: color-mix(in oklab, var(--color-bg) 78%, transparent);
		backdrop-filter: blur(14px);
		-webkit-backdrop-filter: blur(14px);
		border-bottom: 1px solid var(--color-border);
		animation: header-fade 1s ease;
	}

	.inner-masthead {
		display: grid;
		grid-template-columns: 1fr auto 1fr;
		align-items: center;
		gap: 24px;
		height: var(--header-height);
	}

	.logo-container {
		justify-self: start;
		display: inline-flex;
		align-items: center;
		gap: 10px;
		color: var(--color-1);
		text-decoration: none;
	}

	.logo-container img {
		display: block;
		width: auto;
		max-height: 34px;
	}

	.logo-text {
		font-family: var(--heading-font);
		font-size: var(--sm);
		font-weight: 700;
		letter-spacing: -.01em;
	}

	.inner-masthead #mobile-input,
	.inner-masthead .burger {
		display: none;
	}

	.inner-masthead nav {
		justify-self: center;
		display: flex;
		align-items: center;
	}

	.inner-masthead .header-actions {
		justify-self: end;
		display: flex;
		align-items: center;
		gap: 20px;
	}

	.inner-masthead .menu-cta {
		text-decoration: none;
	}

	.inner-masthead nav .nav-cta {
		display: none;
	}

	.lang-switcher {
		display: flex;
		align-items: center;
		gap: 6px;
		font-family: var(--accent-font);
		font-size: var(--xs);
	}

	.lang-switcher a,
	.lang-switcher span {
		text-decoration: none;
		color: var(--color-3);
	}

	.lang-switcher a:hover {
		color: var(--color-1);
	}

	.lang-switcher .active {
		color: var(--color-1);
		font-weight: 500;
	}

	.lang-switcher .divider {
		color: var(--color-border);
	}

	.main-menu {
		display: flex;
		align-items: center;
		gap: 36px;
		margin: 0;
		padding: 0;
		list-style: none;
	}

	.main-menu li {
		position: relative;
	}

	.main-menu>li>a {
		display: inline-block;
		padding: 10px 0;
		font-size: var(--xs);
		font-weight: 500;
		color: var(--color-3);
		box-shadow: 0 2px 0 0 transparent;
		transition: color var(--transition), box-shadow var(--transition);
	}

	.main-menu>li>a:hover {
		color: var(--color-1);
	}

	.main-menu>li.current-menu-item>a,
	.main-menu>li.active>a {
		color: var(--color-1);
	}

	.menu-item-has-children>a:after {
		content: '';
		display: inline-block;
		width: 5px;
		height: 5px;
		margin-left: 7px;
		border-right: 1.5px solid currentColor;
		border-bottom: 1.5px solid currentColor;
		transform: translateY(-2px) rotate(45deg);
	}

	/*Sub Menu*/
	.main-menu .sub-menu {
		position: absolute;
		left: 0;
		top: calc(100% + 8px);
		min-width: 215px;
		margin: 0;
		padding: 8px;
		list-style: none;
		background: var(--color-bg);
		border: 1px solid var(--color-border);
		border-radius: var(--radius);
		box-shadow: 0 18px 40px rgb(15 15 17 / 8%);
		opacity: 0;
		visibility: hidden;
		transform: translateY(6px);
		transition: opacity var(--transition), transform var(--transition), visibility var(--transition);
	}

	.main-menu li:hover>.sub-menu,
	.main-menu li:focus-within>.sub-menu {
		opacity: 1;
		visibility: visible;
		transform: translateY(0);
	}

	.main-menu .sub-menu a {
		display: block;
		padding: 9px 12px;
		border-radius: 8px;
		font-size: var(--xs);
		color: var(--color-1);
	}

	.main-menu .sub-menu a:hover {
		background: var(--color-2);
		color: var(--color-on-accent);
	}

	.main-menu .sub-menu .sub-menu {
		left: 100%;
		top: -9px;
	}

	@media(max-width: 1000px) {
		.inner-masthead {
			display: flex;
		}

		.inner-masthead .header-actions {
			margin-left: auto;
		}

		.masthead {
			animation: none;
		}

		.inner-masthead .burger {
			order: 4;
			display: flex;
			flex-direction: column;
			justify-content: center;
			gap: 5px;
			width: 34px;
			height: 34px;
			cursor: pointer;
		}

		.inner-masthead .burger span {
			display: block;
			width: 100%;
			height: 2px;
			background: var(--color-1);
			border-radius: 2px;
			transition: transform var(--transition), opacity var(--transition);
		}

		#mobile-input:checked~.burger span:nth-child(1) {
			transform: translateY(7px) rotate(45deg);
		}

		#mobile-input:checked~.burger span:nth-child(2) {
			opacity: 0;
		}

		#mobile-input:checked~.burger span:nth-child(3) {
			transform: translateY(-7px) rotate(-45deg);
		}

		.inner-masthead nav {
			position: fixed;
			left: 0;
			top: var(--header-height);
			width: 100%;
			height: 0;
			flex: 0 0 auto;
			flex-direction: column;
			align-items: stretch;
			justify-content: flex-start;
			gap: 0;
			padding: 0 var(--gutter);
			background: var(--color-bg);
			border-top: 1px solid var(--color-border);
			overflow: hidden;
			transition: height var(--transition);
		}

		#mobile-input:checked~nav {
			height: calc(100vh - var(--header-height));
			padding: 10px var(--gutter) 40px;
			overflow-y: auto;
		}

		.main-menu {
			flex-direction: column;
			align-items: stretch;
			gap: 0;
			width: 100%;
		}

		.main-menu>li {
			border-bottom: 1px solid var(--color-border);
		}

		.main-menu>li>a {
			display: block;
			padding: 16px 0;
			font-size: var(--sm);
		}

		.main-menu .sub-menu {
			position: static;
			min-width: 0;
			padding: 0 0 12px 16px;
			background: none;
			border: 0;
			border-radius: 0;
			box-shadow: none;
			opacity: 1;
			visibility: visible;
			transform: none;
		}

		.main-menu .sub-menu a {
			padding: 8px 0;
			font-size: var(--default);
		}

		.inner-masthead .header-actions .menu-cta {
			display: none;
		}

		.inner-masthead nav .nav-cta {
			display: block;
			margin: 20px 0 10px;
			text-align: center;
		}
	}

	/*Social*/
	.social-link {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 44px;
		height: 44px;
		border-radius: 500px;
		border: 1px solid var(--color-border);
		color: var(--color-3);
		transition: background var(--transition), border-color var(--transition), color var(--transition);
	}

	.social-link:hover {
		background: var(--color-2);
		border-color: var(--color-2);
		color: var(--color-on-accent);
	}

	.social-link svg {
		width: 18px;
		height: 18px;
	}


	/*Page Banner (blog, archive, search, 404)*/
	.page-banner {
		padding: 90px 0 70px;
		background: var(--color-surface);
		border-bottom: 1px solid var(--color-border);
	}

	.page-banner h1 {
		margin: 0;
	}


	/*Footer*/
	.site-footer {
		background: var(--color-bg);
		color: var(--color-3);
		font-size: var(--xs);
		padding: 80px 0 30px;
		border-top: 1px solid var(--color-border);
	}

	.site-footer a {
		color: var(--color-3);
		text-decoration: none;
	}

	.site-footer a:hover {
		color: var(--color-1);
	}

	.footer-top {
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
		gap: 48px;
		padding-bottom: 45px;
		border-bottom: 1px solid var(--color-border);
	}

	.footer-brand {
		max-width: 320px;
	}

	.footer-brand .logo-text {
		color: var(--color-1);
		font-size: var(--md);
	}

	.footer-brand p {
		margin: 18px 0 0;
		line-height: 1.75;
	}

	.footer-cols {
		display: flex;
		flex-wrap: wrap;
		gap: 48px;
	}

	.footer-col {
		min-width: 160px;
	}

	.footer-col-title {
		display: block;
		margin: 0 0 16px;
		font-family: var(--accent-font);
		font-size: var(--xs);
		font-weight: 500;
		letter-spacing: .1em;
		text-transform: uppercase;
		color: var(--color-3);
	}

	.footer-menu {
		display: grid;
		gap: 11px;
		margin: 0;
		padding: 0;
		list-style: none;
	}

	.footer-contacts {
		display: grid;
		gap: 11px;
	}

	.footer-col a,
	.footer-col span {
		display: block;
	}

	.footer-col a:hover {
		text-decoration: underline;
		text-decoration-color: var(--color-2);
		text-decoration-thickness: 2px;
		text-underline-offset: 3px;
	}

	.footer-cta {
		display: inline-block;
		margin-top: 22px;
		font-size: var(--default);
		font-weight: 600;
		color: var(--color-1);
		text-decoration: underline;
		text-decoration-thickness: 1px;
		text-underline-offset: 5px;
	}

	.footer-cta:hover {
		color: var(--color-1);
		text-decoration-color: var(--color-2);
	}

	.footer-form {
		max-width: 340px;
	}

	.footer-form input[type="text"],
	.footer-form input[type="email"],
	.footer-form input[type="tel"],
	.footer-form input[type="url"],
	.footer-form input[type="number"],
	.footer-form textarea,
	.footer-form select {
		height: 44px;
	}

	.footer-social {
		display: flex;
		gap: 10px;
	}

	.footer-bottom {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 16px;
		padding-top: 28px;
	}

	.footer-bottom p {
		margin: 0;
	}

	.footer-legal {
		display: flex;
		align-items: center;
		gap: 16px;
	}

	@media(max-width: 1000px) {
		.footer-top {
			gap: 36px;
		}

		.footer-cols {
			gap: 36px;
			width: 100%;
		}

		.footer-col {
			flex: 1 1 160px;
		}
	}

	@media(max-width: 750px) {
		.site-footer {
			padding: 55px 0 26px;
		}

		.footer-top {
			flex-direction: column;
			gap: 32px;
		}

		.footer-cols {
			flex-direction: column;
			gap: 28px;
		}

		.footer-bottom {
			flex-direction: column;
			align-items: flex-start;
			gap: 8px;
		}

		.footer-legal {
			flex-direction: column;
			align-items: flex-start;
			gap: 6px;
		}
	}


	/*Transitions-Animations*/
	.fade-in {
		opacity: 0;
		transition: opacity 1s;
	}

	.fade-in.active {
		opacity: 1;
	}

	.fade-from-left {
		opacity: 0;
		transform: translateX(-25px);
		transition: opacity 1s, transform 1s;
	}

	.fade-from-left.active {
		opacity: 1;
		transform: translateX(0);
	}

	.fade-from-right {
		opacity: 0;
		transform: translateX(25px);
		transition: opacity 1s, transform 1s;
	}

	.fade-from-right.active {
		opacity: 1;
		transform: translateX(0);
	}

	.fade-from-bottom {
		opacity: 0;
		transform: translateY(25px);
		transition: opacity 1s, transform 1s;
	}

	.fade-from-bottom.active {
		opacity: 1;
		transform: translateY(0);
	}

	@media(max-width: 750px) {

		.fade-in,
		.fade-from-left,
		.fade-from-right,
		.fade-from-bottom {
			opacity: 1;
			transform: none;
		}
	}

	@media(prefers-reduced-motion: reduce) {
		html {
			scroll-behavior: auto;
		}

		* {
			animation-duration: .01ms !important;
			transition-duration: .01ms !important;
		}
	}

	/*Whatever the client picked in Appearance > Customize > Colours, and nothing else.*/
	<?= palette_overrides(); ?>
</style>