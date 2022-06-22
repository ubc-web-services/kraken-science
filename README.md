UBC CLF 7 / 8 DRUPAL THEME (aka Kraken)
=======================================

A responsive UBC CLF (Common Look and Feel) theme for Drupal 8 using Tailwind and Vue.js. Created by the UBC IT Web Services Department.

Kraken is a theme for Drupal 8 & 9, providing UBC-branded units with the basic structure of the UBC CLF ([Common Look and Feel](https://clf.ubc.ca)).

## IE Support
This theme *does not* support Internet Explorer. If older browser support is required, it must be added separately or [galactus](https://github.com/ubc-web-services/galactus), an earlier version of the CLF, can be used.

## Rationale
Why *another* theme? Why not extend the Galactus Drupal 8 / 9 theme?

As a web developer in Web Services, you should be able to expect that CSS and Javascript are added in a single consistent way in any project. The Galactus theme works as is, however it is intended for general-purpose use by the broader UBC community. Kraken's goal is to add proper dependency management and workflow for Web Service's theme layer in the same way we have done for the application layer. It is intentionally biased and uses specific CSS and Javascript frameworks ([Tailwindcss](https://tailwindcss.com) and [Vuejs](https://vuejs.org)). Both of these are well-supported and flexible enough to work on *any* web project (CLF or not) and provide a consistent set of features and functionality. The benefits are improved reusability, improved ramp up time and improved optics. There should be no hidden features only understood by a single developer.

## Using the theme

To make changes to the theme CSS and Javascript, you are required to use the command-line tools.

### Requirements
Ensure that you have [node.js](https://nodejs.org/en/download/) installed, version 12 or higher. To confirm your version, navigate to the Kraken theme directory in your command-line and type `node -v`.

### Installation
From the theme root, install the theme dependencies:
```
npm install
```

This will install everything required to work with the CSS and Javascript:
- the [Tailwindcss](https://tailwindcss.com) utility-based CSS library
- the [Vuejs](https://vuejs.org) Javascript framework
- packages such as [Webpack](https://webpack.js.org), [Babel](https://babeljs.io), [Postcss](https://postcss.org), and [Autoprefixer](https://www.npmjs.com/package/autoprefixer) that automate building and preparing the web assets.

### Running the commands
There are four main node.js commands defined in in [`/package.json`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/package.json#L24).

The two most common commands to run:
- `npm run dev`
    - compiles the CSS in the `/src/css` directory, excluding the subdirectories, and saves the minified files in `/css`. Settings in [`/postcss.config.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/postcss.config.js)
    - compiles the Javascript in the `/src/css` directory, excluding the subdirectories, and saves the unminified files in `/js`.  Settings in [`/webpack.common.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/webpack.common.js) and [`/webpack.dev.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/webpack.prod.js)

- `npm run prod`
    - compiles the CSS in the `src > css` directory, excluding the subdirectories, and saves the minified files in `/css`. Settings in [`/postcss.config.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/postcss.config.js)
    - compiles the Javascript in the `/src/css` directory, excluding the subdirectories, and saves the minified files in `/js` with a `.min.js` extension. Settings in [`/webpack.common.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/webpack.common.js) and [`/webpack.prod.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/webpack.prod.js)
    - compresses the `.js` and `.css` files in GZip and Brotli formats. Settings in [`/compress.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/compress.js)
    - saves an external sourcemap (`.map` file) to facilitate debugging. Settings in [`/webpack.prod.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/webpack.prod.js)

There are also additional commands for CSS property sorting:
- `npm run css-lint`
    - checks CSS in the `/src/css` directory for the order in which properties are declared and best practices.

- `npm run css-fix`
    - attempts to automatically fix the errors that are found with the `npm run css-lint` command.

----

## [Tailwindcss](https://tailwindcss.com)
The theme makes extensive use of utility classes provided by Tailwind.

All configuration for Tailwind utilities are set in [`/tailwind.config.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/tailwind.config.js). The configuration uses UBC default colours, fonts, regular spacing, etc. More details about this file can be found in the [Tailwind documentation](https://tailwindcss.com/docs/configuration).

Two very important places where it diverges fro the documentation:
- **Separators**: by default, Tailwind uses a colon to separate media query and state prefixes, whereas the config defines the prefix separator as a double dash. For example, `md:text-white hover:text-black` become `md--text-white hover--text-black`
- **Colour palette**: the config excludes Tailwind's default colurs and [replaces them](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/tailwind.config.js#L12) with UBC colours and a few user-defined colours.

When running the production build script (`npm run prod`), PurgeCSS is used to scan all Twig, Vue and Javascript files and remove any Tailwind utilities that are not in use. This allows for us to deliver a considerably smaller set of CSS classes. Note that classes not provided by Tailwind are never purged.

Additionally, all vendor prefixes for supported browsers are added automatically with Autoprefixer, so there is no need to add these (e.g. `-webkit`).

I highly recommend installing [the Tailwind VS Code extension](https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss). It provides code completion for Tailwind utility classes as defined in the `tailwind.config.js` file. Another useful utility is [the Headwind VS Code extension](https://marketplace.visualstudio.com/items?itemName=heybourn.headwind), that sorts classes in your markup based on an opinionated order.

## [Vue.js](https://vuejs.org)
Much of the javascript this theme uses is powered by the Vue.js library. This does have some exceptions where native javascript is used instead (e.g. [`/src/js/kraken.dismiss.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/src/js/kraken.dismiss.js), [`/src/js/kraken.misc.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/src/js/kraken.misc.js), [`/src/js/kraken.scroll.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/src/js/kraken.scroll.js)). All attempts have been made to remove jQuery as a dependency.

For ease of integration, there is a single vue instance called - `#main-content`. Vue can work with any markup in the templates inside of this wrapper.

When running the build scripts, the package despendencies (including the vue.js library) are split from custom vue code, resulting in `/js/vue[.min].js` and `/js/vendors~vue[.min].js`. Settings in [`/webpack.common.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/webpack.common.js)

The primary file is at [`/src/js/vue.js`](https://github.com/ubc-web-services/product-boilerplate/blob/master/web/themes/custom/kraken/src/js/vue.js), which imports all dependencies, components and defines the main vue instance. Custom [single file components](https://vuejs.org/v2/guide/single-file-components.html) are stored in the [`/src/js/components/`](https://github.com/ubc-web-services/product-boilerplate/tree/master/web/themes/custom/kraken/src/js/components) directory.

To ease working with Vue, there is [an excellent dev tools extension for Chrome](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd?hl=en) to assist with debugging.

## Kraken theme settings

Once installed and set to default, you can adjust the following theme settings:

- switch between v.7 and v.8 of the CLF (note that v.7 of the CLF is not from the CDN and contains a subset of the full CLF).
- adjust the CSS and Javascript you load between development and production versions.
- set the theme colour options and have those same colours available using the `--color-primary`, `--color-secondary` and `--color-accent` CSS variables. These are also mapped to Tailwind classes.
- change the base font size and line heights to adjust the overall relative sizing and vertical spacing of the type.
- add a CWL login option to the login page.
- optionally load the CLF fonts from the Google Fonts service.
- add verification header tags for Google and Bing search services.
- opt into a set of svg icons that can be added to the site via the svg [`use`](https://developer.mozilla.org/en-US/docs/Web/SVG/Element/use) tag

### Planned settings (not yet feature complete)
- enable dark mode
- make the primary horizontal navigation 'sticky'
- make the primary horizontal navigation 'sticky' when scrolling up only

