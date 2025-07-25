/*
 * File: mediaquery.js
 *
 * Desc: js for adding a mediaquery class to the body
 *
 */
(function (Drupal) {
  Drupal.behaviors.krakenMediaQuery = {
    attach(context, settings) {
      var query = window.matchMedia("(max-width: 979px)"),
        body = document.querySelector("body");
      function watch(query) {
        query.matches
          ? body.setAttribute("data-screen", "sm")
          : body.setAttribute("data-screen", "lg");
      }
      watch(query), query.addEventListener("change", watch);
    },
  };
})(Drupal);
