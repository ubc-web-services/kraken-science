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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLmRpc21pc3MuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLFVBQVNBLE1BQVQsRUFBaUI7QUFDaEJBLEVBQUFBLE1BQU0sQ0FBQ0MsU0FBUCxDQUFpQkMsYUFBakIsR0FBaUM7QUFDL0JDLElBQUFBLE1BQU0sQ0FBQ0MsT0FBRCxFQUFVQyxRQUFWLEVBQW9CO0FBQ3hCLFlBQU1DLE9BQU4sQ0FBYztBQUNaQyxRQUFBQSxXQUFXLENBQUNDLElBQUQsRUFBTztBQUNoQixlQUFLQSxJQUFMLEdBQVlBLElBQVo7QUFDRDs7QUFFREMsUUFBQUEsT0FBTyxHQUFHO0FBQ1IsY0FBTUMsQ0FBQyxHQUFHQyxRQUFRLENBQUNDLGdCQUFULENBQTBCLEtBQUtKLElBQS9CLENBQVY7QUFDQUUsVUFBQUEsQ0FBQyxDQUFDRyxPQUFGLENBQVVDLEtBQUssSUFBSTtBQUNqQixnQkFBTUMsR0FBRyxHQUFHRCxLQUFLLENBQUNFLGFBQU4sQ0FBb0Isc0JBQXBCLENBQVo7QUFDQUQsWUFBQUEsR0FBRyxDQUFDRSxnQkFBSixDQUFxQixPQUFyQixFQUE4QixNQUFNO0FBQ2xDRixjQUFBQSxHQUFHLENBQUNHLGFBQUosQ0FBa0JDLE1BQWxCO0FBQ0QsYUFGRDtBQUdELFdBTEQ7QUFNRDs7QUFiVzs7QUFlZCxVQUFNQyxXQUFXLEdBQUcsSUFBSWQsT0FBSixDQUFZLGFBQVosQ0FBcEI7QUFDQWMsTUFBQUEsV0FBVyxDQUFDWCxPQUFaO0FBQ0Q7O0FBbkI4QixHQUFqQztBQXFCRCxDQXRCRCxFQXNCR1QsTUF0QkgsRSIsInNvdXJjZXMiOlsid2VicGFjazovL2tyYWtlbi8uL3NyYy9qcy9rcmFrZW4uZGlzbWlzcy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogRmlsZTogZGlzbWlzcy5qc1xuICpcbiAqIERlc2M6IGpzIGZvciBkaXNtaXNzaW5nIGVsZW1lbnRzIGZyb20gdGhlIGRvbSB2aWEgY2xvc2UgYnV0dG9uXG4gKlxuICovXG4oZnVuY3Rpb24oRHJ1cGFsKSB7XG4gIERydXBhbC5iZWhhdmlvcnMua3Jha2VuRGlzbWlzcyA9IHtcbiAgICBhdHRhY2goY29udGV4dCwgc2V0dGluZ3MpIHtcbiAgICAgIGNsYXNzIERpc21pc3Mge1xuICAgICAgICBjb25zdHJ1Y3Rvcihub2RlKSB7XG4gICAgICAgICAgdGhpcy5ub2RlID0gbm9kZTtcbiAgICAgICAgfVxuXG4gICAgICAgIGRpc21pc3MoKSB7XG4gICAgICAgICAgY29uc3QgYSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwodGhpcy5ub2RlKTtcbiAgICAgICAgICBhLmZvckVhY2goZW50cnkgPT4ge1xuICAgICAgICAgICAgY29uc3QgYnRuID0gZW50cnkucXVlcnlTZWxlY3RvcihcIi5qcy1kaXNtaXNzX190cmlnZ2VyXCIpO1xuICAgICAgICAgICAgYnRuLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCAoKSA9PiB7XG4gICAgICAgICAgICAgIGJ0bi5wYXJlbnRFbGVtZW50LnJlbW92ZSgpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICAgIGNvbnN0IGRpc21pc3NhYmxlID0gbmV3IERpc21pc3MoXCIuanMtZGlzbWlzc1wiKTtcbiAgICAgIGRpc21pc3NhYmxlLmRpc21pc3MoKTtcbiAgICB9XG4gIH07XG59KShEcnVwYWwpO1xuIl0sIm5hbWVzIjpbIkRydXBhbCIsImJlaGF2aW9ycyIsImtyYWtlbkRpc21pc3MiLCJhdHRhY2giLCJjb250ZXh0Iiwic2V0dGluZ3MiLCJEaXNtaXNzIiwiY29uc3RydWN0b3IiLCJub2RlIiwiZGlzbWlzcyIsImEiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwiZW50cnkiLCJidG4iLCJxdWVyeVNlbGVjdG9yIiwiYWRkRXZlbnRMaXN0ZW5lciIsInBhcmVudEVsZW1lbnQiLCJyZW1vdmUiLCJkaXNtaXNzYWJsZSJdLCJzb3VyY2VSb290IjoiIn0=