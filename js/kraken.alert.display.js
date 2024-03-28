/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./src/js/kraken.alert.display.js ***!
  \****************************************/
/*
 * File: alert.display.js
 *
 * Desc: js for alert cookies in the theme
 *
 */
(function (Drupal, once) {
  Drupal.behaviors.krakenAlertDisplay = {
    attach(context) {
      once("js-alert", ".content-item--type-alert-banner", context).forEach(item => {
        var {
          alertId
        } = item.dataset;
        var trigger = item.querySelector(".js-dismiss__trigger");
        var getStore = localStorage.getItem(alertId);
        trigger.addEventListener("click", () => {
          localStorage.setItem(alertId, "hide");
        });
        if (getStore == null) {
          // alert ID isn't in localstorage;
          item.removeAttribute("hidden");
        }
      });
    }
  };
})(Drupal, once);
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLmFsZXJ0LmRpc3BsYXkuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLFVBQVVBLE1BQU0sRUFBRUMsSUFBSSxFQUFFO0VBQ3ZCRCxNQUFNLENBQUNFLFNBQVMsQ0FBQ0Msa0JBQWtCLEdBQUc7SUFDcENDLE1BQU1BLENBQUNDLE9BQU8sRUFBRTtNQUNkSixJQUFJLENBQUMsVUFBVSxFQUFFLGtDQUFrQyxFQUFFSSxPQUFPLENBQUMsQ0FBQ0MsT0FBTyxDQUNsRUMsSUFBSSxJQUFLO1FBQ1IsSUFBTTtVQUFFQztRQUFRLENBQUMsR0FBR0QsSUFBSSxDQUFDRSxPQUFPO1FBQ2hDLElBQU1DLE9BQU8sR0FBR0gsSUFBSSxDQUFDSSxhQUFhLENBQUMsc0JBQXNCLENBQUM7UUFDMUQsSUFBTUMsUUFBUSxHQUFHQyxZQUFZLENBQUNDLE9BQU8sQ0FBQ04sT0FBTyxDQUFDO1FBRTlDRSxPQUFPLENBQUNLLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxNQUFNO1VBQ3RDRixZQUFZLENBQUNHLE9BQU8sQ0FBQ1IsT0FBTyxFQUFFLE1BQU0sQ0FBQztRQUN2QyxDQUFDLENBQUM7UUFFRixJQUFJSSxRQUFRLElBQUksSUFBSSxFQUFFO1VBQ3BCO1VBQ0FMLElBQUksQ0FBQ1UsZUFBZSxDQUFDLFFBQVEsQ0FBQztRQUNoQztNQUNGLENBQ0YsQ0FBQztJQUNIO0VBQ0YsQ0FBQztBQUNILENBQUMsRUFBRWpCLE1BQU0sRUFBRUMsSUFBSSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9rcmFrZW4vLi9zcmMvanMva3Jha2VuLmFsZXJ0LmRpc3BsYXkuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIEZpbGU6IGFsZXJ0LmRpc3BsYXkuanNcbiAqXG4gKiBEZXNjOiBqcyBmb3IgYWxlcnQgY29va2llcyBpbiB0aGUgdGhlbWVcbiAqXG4gKi9cbihmdW5jdGlvbiAoRHJ1cGFsLCBvbmNlKSB7XG4gIERydXBhbC5iZWhhdmlvcnMua3Jha2VuQWxlcnREaXNwbGF5ID0ge1xuICAgIGF0dGFjaChjb250ZXh0KSB7XG4gICAgICBvbmNlKFwianMtYWxlcnRcIiwgXCIuY29udGVudC1pdGVtLS10eXBlLWFsZXJ0LWJhbm5lclwiLCBjb250ZXh0KS5mb3JFYWNoKFxuICAgICAgICAoaXRlbSkgPT4ge1xuICAgICAgICAgIGNvbnN0IHsgYWxlcnRJZCB9ID0gaXRlbS5kYXRhc2V0O1xuICAgICAgICAgIGNvbnN0IHRyaWdnZXIgPSBpdGVtLnF1ZXJ5U2VsZWN0b3IoXCIuanMtZGlzbWlzc19fdHJpZ2dlclwiKTtcbiAgICAgICAgICBjb25zdCBnZXRTdG9yZSA9IGxvY2FsU3RvcmFnZS5nZXRJdGVtKGFsZXJ0SWQpO1xuXG4gICAgICAgICAgdHJpZ2dlci5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oYWxlcnRJZCwgXCJoaWRlXCIpO1xuICAgICAgICAgIH0pO1xuXG4gICAgICAgICAgaWYgKGdldFN0b3JlID09IG51bGwpIHtcbiAgICAgICAgICAgIC8vIGFsZXJ0IElEIGlzbid0IGluIGxvY2Fsc3RvcmFnZTtcbiAgICAgICAgICAgIGl0ZW0ucmVtb3ZlQXR0cmlidXRlKFwiaGlkZGVuXCIpO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgKTtcbiAgICB9LFxuICB9O1xufSkoRHJ1cGFsLCBvbmNlKTtcbiJdLCJuYW1lcyI6WyJEcnVwYWwiLCJvbmNlIiwiYmVoYXZpb3JzIiwia3Jha2VuQWxlcnREaXNwbGF5IiwiYXR0YWNoIiwiY29udGV4dCIsImZvckVhY2giLCJpdGVtIiwiYWxlcnRJZCIsImRhdGFzZXQiLCJ0cmlnZ2VyIiwicXVlcnlTZWxlY3RvciIsImdldFN0b3JlIiwibG9jYWxTdG9yYWdlIiwiZ2V0SXRlbSIsImFkZEV2ZW50TGlzdGVuZXIiLCJzZXRJdGVtIiwicmVtb3ZlQXR0cmlidXRlIl0sInNvdXJjZVJvb3QiOiIifQ==