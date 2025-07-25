/******/ (() => { // webpackBootstrap
/*!*********************************!*\
  !*** ./src/js/kraken.sticky.js ***!
  \*********************************/
/*!
 * File: sticky.js
 *
 * Desc: js for adding intersection observer to the nav to make it sticky when the direct DOM sibling leaves the viewport (#ubc7-unit).
 *
 */
(function(Drupal) {
  Drupal.behaviors.krakensticky = {
    attach(context, settings) {
      const body = document.querySelector("body");
      const unitarea = document.querySelector("#ubc7-header");
      const menu = document.querySelector("#ubc7-unit");
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.intersectionRatio <= 0) {
            body.classList.add("nav--is-pinned");
            menu.classList.add("stickynav--pinned");
          } else {
            body.classList.remove("nav--is-pinned");
            menu.classList.remove("stickynav--pinned");
          }
        });
      });
      observer.observe(unitarea);
    }
  };
})(Drupal);

/******/ })()
;
//# sourceMappingURL=kraken.sticky.js.map