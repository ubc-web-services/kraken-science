/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./src/js/kraken.sticky.js ***!
  \*********************************/
/*!
 * File: sticky.js
 *
 * Desc: js for adding intersection observer to the nav to make it sticky when the direct DOM sibling leaves the viewport (#ubc7-unit).
 *
 */
(function (Drupal) {
  Drupal.behaviors.krakensticky = {
    attach(context, settings) {
      var body = document.querySelector("body");
      var unitarea = document.querySelector("#ubc7-header");
      var menu = document.querySelector("#ubc7-unit");
      var observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLnN0aWNreS5qcyIsIm1hcHBpbmdzIjoiOzs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsVUFBU0EsTUFBTSxFQUFFO0VBQ2hCQSxNQUFNLENBQUNDLFNBQVMsQ0FBQ0MsWUFBWSxHQUFHO0lBQzlCQyxNQUFNQSxDQUFDQyxPQUFPLEVBQUVDLFFBQVEsRUFBRTtNQUN4QixJQUFNQyxJQUFJLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLE1BQU0sQ0FBQztNQUMzQyxJQUFNQyxRQUFRLEdBQUdGLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLGNBQWMsQ0FBQztNQUN2RCxJQUFNRSxJQUFJLEdBQUdILFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLFlBQVksQ0FBQztNQUNqRCxJQUFNRyxRQUFRLEdBQUcsSUFBSUMsb0JBQW9CLENBQUVDLE9BQU8sSUFBSztRQUNyREEsT0FBTyxDQUFDQyxPQUFPLENBQUVDLEtBQUssSUFBSztVQUN6QixJQUFJQSxLQUFLLENBQUNDLGlCQUFpQixJQUFJLENBQUMsRUFBRTtZQUNoQ1YsSUFBSSxDQUFDVyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxnQkFBZ0IsQ0FBQztZQUNwQ1IsSUFBSSxDQUFDTyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxtQkFBbUIsQ0FBQztVQUN6QyxDQUFDLE1BQU07WUFDTFosSUFBSSxDQUFDVyxTQUFTLENBQUNFLE1BQU0sQ0FBQyxnQkFBZ0IsQ0FBQztZQUN2Q1QsSUFBSSxDQUFDTyxTQUFTLENBQUNFLE1BQU0sQ0FBQyxtQkFBbUIsQ0FBQztVQUM1QztRQUNGLENBQUMsQ0FBQztNQUNKLENBQUMsQ0FBQztNQUNGUixRQUFRLENBQUNTLE9BQU8sQ0FBQ1gsUUFBUSxDQUFDO0lBQzVCO0VBQ0YsQ0FBQztBQUNILENBQUMsRUFBRVQsTUFBTSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9rcmFrZW4vLi9zcmMvanMva3Jha2VuLnN0aWNreS5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKiFcbiAqIEZpbGU6IHN0aWNreS5qc1xuICpcbiAqIERlc2M6IGpzIGZvciBhZGRpbmcgaW50ZXJzZWN0aW9uIG9ic2VydmVyIHRvIHRoZSBuYXYgdG8gbWFrZSBpdCBzdGlja3kgd2hlbiB0aGUgZGlyZWN0IERPTSBzaWJsaW5nIGxlYXZlcyB0aGUgdmlld3BvcnQgKCN1YmM3LXVuaXQpLlxuICpcbiAqL1xuKGZ1bmN0aW9uKERydXBhbCkge1xuICBEcnVwYWwuYmVoYXZpb3JzLmtyYWtlbnN0aWNreSA9IHtcbiAgICBhdHRhY2goY29udGV4dCwgc2V0dGluZ3MpIHtcbiAgICAgIGNvbnN0IGJvZHkgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiYm9keVwiKTtcbiAgICAgIGNvbnN0IHVuaXRhcmVhID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiN1YmM3LWhlYWRlclwiKTtcbiAgICAgIGNvbnN0IG1lbnUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI3ViYzctdW5pdFwiKTtcbiAgICAgIGNvbnN0IG9ic2VydmVyID0gbmV3IEludGVyc2VjdGlvbk9ic2VydmVyKChlbnRyaWVzKSA9PiB7XG4gICAgICAgIGVudHJpZXMuZm9yRWFjaCgoZW50cnkpID0+IHtcbiAgICAgICAgICBpZiAoZW50cnkuaW50ZXJzZWN0aW9uUmF0aW8gPD0gMCkge1xuICAgICAgICAgICAgYm9keS5jbGFzc0xpc3QuYWRkKFwibmF2LS1pcy1waW5uZWRcIik7XG4gICAgICAgICAgICBtZW51LmNsYXNzTGlzdC5hZGQoXCJzdGlja3luYXYtLXBpbm5lZFwiKTtcbiAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgYm9keS5jbGFzc0xpc3QucmVtb3ZlKFwibmF2LS1pcy1waW5uZWRcIik7XG4gICAgICAgICAgICBtZW51LmNsYXNzTGlzdC5yZW1vdmUoXCJzdGlja3luYXYtLXBpbm5lZFwiKTtcbiAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgfSk7XG4gICAgICBvYnNlcnZlci5vYnNlcnZlKHVuaXRhcmVhKTtcbiAgICB9XG4gIH07XG59KShEcnVwYWwpO1xuIl0sIm5hbWVzIjpbIkRydXBhbCIsImJlaGF2aW9ycyIsImtyYWtlbnN0aWNreSIsImF0dGFjaCIsImNvbnRleHQiLCJzZXR0aW5ncyIsImJvZHkiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJ1bml0YXJlYSIsIm1lbnUiLCJvYnNlcnZlciIsIkludGVyc2VjdGlvbk9ic2VydmVyIiwiZW50cmllcyIsImZvckVhY2giLCJlbnRyeSIsImludGVyc2VjdGlvblJhdGlvIiwiY2xhc3NMaXN0IiwiYWRkIiwicmVtb3ZlIiwib2JzZXJ2ZSJdLCJzb3VyY2VSb290IjoiIn0=