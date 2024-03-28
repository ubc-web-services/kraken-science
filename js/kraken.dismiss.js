/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./src/js/kraken.dismiss.js ***!
  \**********************************/
/*
 * File: dismiss.js
 *
 * Desc: js for dismissing elements from the dom via close button
 *
 */
(function (Drupal) {
  Drupal.behaviors.krakenDismiss = {
    attach(context, settings) {
      class Dismiss {
        constructor(node) {
          this.node = node;
        }
        dismiss() {
          var a = document.querySelectorAll(this.node);
          a.forEach(entry => {
            var btn = entry.querySelector(".js-dismiss__trigger");
            btn.addEventListener("click", () => {
              btn.parentElement.remove();
            });
          });
        }
      }
      var dismissable = new Dismiss(".js-dismiss");
      dismissable.dismiss();
    }
  };
})(Drupal);
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLmRpc21pc3MuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLFVBQVNBLE1BQU0sRUFBRTtFQUNoQkEsTUFBTSxDQUFDQyxTQUFTLENBQUNDLGFBQWEsR0FBRztJQUMvQkMsTUFBTUEsQ0FBQ0MsT0FBTyxFQUFFQyxRQUFRLEVBQUU7TUFDeEIsTUFBTUMsT0FBTyxDQUFDO1FBQ1pDLFdBQVdBLENBQUNDLElBQUksRUFBRTtVQUNoQixJQUFJLENBQUNBLElBQUksR0FBR0EsSUFBSTtRQUNsQjtRQUVBQyxPQUFPQSxDQUFBLEVBQUc7VUFDUixJQUFNQyxDQUFDLEdBQUdDLFFBQVEsQ0FBQ0MsZ0JBQWdCLENBQUMsSUFBSSxDQUFDSixJQUFJLENBQUM7VUFDOUNFLENBQUMsQ0FBQ0csT0FBTyxDQUFDQyxLQUFLLElBQUk7WUFDakIsSUFBTUMsR0FBRyxHQUFHRCxLQUFLLENBQUNFLGFBQWEsQ0FBQyxzQkFBc0IsQ0FBQztZQUN2REQsR0FBRyxDQUFDRSxnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsTUFBTTtjQUNsQ0YsR0FBRyxDQUFDRyxhQUFhLENBQUNDLE1BQU0sQ0FBQyxDQUFDO1lBQzVCLENBQUMsQ0FBQztVQUNKLENBQUMsQ0FBQztRQUNKO01BQ0Y7TUFDQSxJQUFNQyxXQUFXLEdBQUcsSUFBSWQsT0FBTyxDQUFDLGFBQWEsQ0FBQztNQUM5Q2MsV0FBVyxDQUFDWCxPQUFPLENBQUMsQ0FBQztJQUN2QjtFQUNGLENBQUM7QUFDSCxDQUFDLEVBQUVULE1BQU0sQ0FBQyxDIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8va3Jha2VuLy4vc3JjL2pzL2tyYWtlbi5kaXNtaXNzLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qXG4gKiBGaWxlOiBkaXNtaXNzLmpzXG4gKlxuICogRGVzYzoganMgZm9yIGRpc21pc3NpbmcgZWxlbWVudHMgZnJvbSB0aGUgZG9tIHZpYSBjbG9zZSBidXR0b25cbiAqXG4gKi9cbihmdW5jdGlvbihEcnVwYWwpIHtcbiAgRHJ1cGFsLmJlaGF2aW9ycy5rcmFrZW5EaXNtaXNzID0ge1xuICAgIGF0dGFjaChjb250ZXh0LCBzZXR0aW5ncykge1xuICAgICAgY2xhc3MgRGlzbWlzcyB7XG4gICAgICAgIGNvbnN0cnVjdG9yKG5vZGUpIHtcbiAgICAgICAgICB0aGlzLm5vZGUgPSBub2RlO1xuICAgICAgICB9XG5cbiAgICAgICAgZGlzbWlzcygpIHtcbiAgICAgICAgICBjb25zdCBhID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCh0aGlzLm5vZGUpO1xuICAgICAgICAgIGEuZm9yRWFjaChlbnRyeSA9PiB7XG4gICAgICAgICAgICBjb25zdCBidG4gPSBlbnRyeS5xdWVyeVNlbGVjdG9yKFwiLmpzLWRpc21pc3NfX3RyaWdnZXJcIik7XG4gICAgICAgICAgICBidG4uYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsICgpID0+IHtcbiAgICAgICAgICAgICAgYnRuLnBhcmVudEVsZW1lbnQucmVtb3ZlKCk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgICAgY29uc3QgZGlzbWlzc2FibGUgPSBuZXcgRGlzbWlzcyhcIi5qcy1kaXNtaXNzXCIpO1xuICAgICAgZGlzbWlzc2FibGUuZGlzbWlzcygpO1xuICAgIH1cbiAgfTtcbn0pKERydXBhbCk7XG4iXSwibmFtZXMiOlsiRHJ1cGFsIiwiYmVoYXZpb3JzIiwia3Jha2VuRGlzbWlzcyIsImF0dGFjaCIsImNvbnRleHQiLCJzZXR0aW5ncyIsIkRpc21pc3MiLCJjb25zdHJ1Y3RvciIsIm5vZGUiLCJkaXNtaXNzIiwiYSIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvckFsbCIsImZvckVhY2giLCJlbnRyeSIsImJ0biIsInF1ZXJ5U2VsZWN0b3IiLCJhZGRFdmVudExpc3RlbmVyIiwicGFyZW50RWxlbWVudCIsInJlbW92ZSIsImRpc21pc3NhYmxlIl0sInNvdXJjZVJvb3QiOiIifQ==