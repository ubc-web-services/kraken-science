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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLmRpc21pc3MuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDLFVBQVNBLE1BQU0sRUFBRTtFQUNoQkEsTUFBTSxDQUFDQyxTQUFTLENBQUNDLGFBQWEsR0FBRztJQUMvQkMsTUFBTUEsQ0FBQ0MsT0FBTyxFQUFFQyxRQUFRLEVBQUU7TUFDeEIsTUFBTUMsT0FBTyxDQUFDO1FBQ1pDLFdBQVdBLENBQUNDLElBQUksRUFBRTtVQUNoQixJQUFJLENBQUNBLElBQUksR0FBR0EsSUFBSTtRQUNsQjtRQUVBQyxPQUFPQSxDQUFBLEVBQUc7VUFDUixJQUFNQyxDQUFDLEdBQUdDLFFBQVEsQ0FBQ0MsZ0JBQWdCLENBQUMsSUFBSSxDQUFDSixJQUFJLENBQUM7VUFDOUNFLENBQUMsQ0FBQ0csT0FBTyxDQUFDQyxLQUFLLElBQUk7WUFDakIsSUFBTUMsR0FBRyxHQUFHRCxLQUFLLENBQUNFLGFBQWEsQ0FBQyxzQkFBc0IsQ0FBQztZQUN2REQsR0FBRyxDQUFDRSxnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsTUFBTTtjQUNsQ0YsR0FBRyxDQUFDRyxhQUFhLENBQUNDLE1BQU0sRUFBRTtZQUM1QixDQUFDLENBQUM7VUFDSixDQUFDLENBQUM7UUFDSjtNQUNGO01BQ0EsSUFBTUMsV0FBVyxHQUFHLElBQUlkLE9BQU8sQ0FBQyxhQUFhLENBQUM7TUFDOUNjLFdBQVcsQ0FBQ1gsT0FBTyxFQUFFO0lBQ3ZCO0VBQ0YsQ0FBQztBQUNILENBQUMsRUFBRVQsTUFBTSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9rcmFrZW4vLi9zcmMvanMva3Jha2VuLmRpc21pc3MuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIEZpbGU6IGRpc21pc3MuanNcbiAqXG4gKiBEZXNjOiBqcyBmb3IgZGlzbWlzc2luZyBlbGVtZW50cyBmcm9tIHRoZSBkb20gdmlhIGNsb3NlIGJ1dHRvblxuICpcbiAqL1xuKGZ1bmN0aW9uKERydXBhbCkge1xuICBEcnVwYWwuYmVoYXZpb3JzLmtyYWtlbkRpc21pc3MgPSB7XG4gICAgYXR0YWNoKGNvbnRleHQsIHNldHRpbmdzKSB7XG4gICAgICBjbGFzcyBEaXNtaXNzIHtcbiAgICAgICAgY29uc3RydWN0b3Iobm9kZSkge1xuICAgICAgICAgIHRoaXMubm9kZSA9IG5vZGU7XG4gICAgICAgIH1cblxuICAgICAgICBkaXNtaXNzKCkge1xuICAgICAgICAgIGNvbnN0IGEgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKHRoaXMubm9kZSk7XG4gICAgICAgICAgYS5mb3JFYWNoKGVudHJ5ID0+IHtcbiAgICAgICAgICAgIGNvbnN0IGJ0biA9IGVudHJ5LnF1ZXJ5U2VsZWN0b3IoXCIuanMtZGlzbWlzc19fdHJpZ2dlclwiKTtcbiAgICAgICAgICAgIGJ0bi5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuICAgICAgICAgICAgICBidG4ucGFyZW50RWxlbWVudC5yZW1vdmUoKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICB9XG4gICAgICBjb25zdCBkaXNtaXNzYWJsZSA9IG5ldyBEaXNtaXNzKFwiLmpzLWRpc21pc3NcIik7XG4gICAgICBkaXNtaXNzYWJsZS5kaXNtaXNzKCk7XG4gICAgfVxuICB9O1xufSkoRHJ1cGFsKTtcbiJdLCJuYW1lcyI6WyJEcnVwYWwiLCJiZWhhdmlvcnMiLCJrcmFrZW5EaXNtaXNzIiwiYXR0YWNoIiwiY29udGV4dCIsInNldHRpbmdzIiwiRGlzbWlzcyIsImNvbnN0cnVjdG9yIiwibm9kZSIsImRpc21pc3MiLCJhIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwiZm9yRWFjaCIsImVudHJ5IiwiYnRuIiwicXVlcnlTZWxlY3RvciIsImFkZEV2ZW50TGlzdGVuZXIiLCJwYXJlbnRFbGVtZW50IiwicmVtb3ZlIiwiZGlzbWlzc2FibGUiXSwic291cmNlUm9vdCI6IiJ9