/*
 * File: alert.display.js
 *
 * Desc: js for alert cookies in the theme
 *
 */
(function (Drupal, once) {
  Drupal.behaviors.krakenAlertDisplay = {
    attach(context) {
      once("js-alert", ".content-item--type-alert-banner", context).forEach(
        (item) => {
          const { alertId } = item.dataset;
          const trigger = item.querySelector(".js-dismiss__trigger");
          const getStore = localStorage.getItem(alertId);

          trigger.addEventListener("click", () => {
            localStorage.setItem(alertId, "hide");
          });

          if (getStore == null) {
            // alert ID isn't in localstorage;
            item.removeAttribute("hidden");
          }
        }
      );
    },
  };
})(Drupal, once);
