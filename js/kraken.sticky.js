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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLnN0aWNreS5qcyIsIm1hcHBpbmdzIjoiOzs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsVUFBU0EsTUFBVCxFQUFpQjtBQUNoQkEsRUFBQUEsTUFBTSxDQUFDQyxTQUFQLENBQWlCQyxZQUFqQixHQUFnQztBQUM5QkMsSUFBQUEsTUFBTSxDQUFDQyxPQUFELEVBQVVDLFFBQVYsRUFBb0I7QUFDeEIsVUFBTUMsSUFBSSxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsTUFBdkIsQ0FBYjtBQUNBLFVBQU1DLFFBQVEsR0FBR0YsUUFBUSxDQUFDQyxhQUFULENBQXVCLGNBQXZCLENBQWpCO0FBQ0EsVUFBTUUsSUFBSSxHQUFHSCxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsWUFBdkIsQ0FBYjtBQUNBLFVBQU1HLFFBQVEsR0FBRyxJQUFJQyxvQkFBSixDQUEwQkMsT0FBRCxJQUFhO0FBQ3JEQSxRQUFBQSxPQUFPLENBQUNDLE9BQVIsQ0FBaUJDLEtBQUQsSUFBVztBQUN6QixjQUFJQSxLQUFLLENBQUNDLGlCQUFOLElBQTJCLENBQS9CLEVBQWtDO0FBQ2hDVixZQUFBQSxJQUFJLENBQUNXLFNBQUwsQ0FBZUMsR0FBZixDQUFtQixnQkFBbkI7QUFDQVIsWUFBQUEsSUFBSSxDQUFDTyxTQUFMLENBQWVDLEdBQWYsQ0FBbUIsbUJBQW5CO0FBQ0QsV0FIRCxNQUdPO0FBQ0xaLFlBQUFBLElBQUksQ0FBQ1csU0FBTCxDQUFlRSxNQUFmLENBQXNCLGdCQUF0QjtBQUNBVCxZQUFBQSxJQUFJLENBQUNPLFNBQUwsQ0FBZUUsTUFBZixDQUFzQixtQkFBdEI7QUFDRDtBQUNGLFNBUkQ7QUFTRCxPQVZnQixDQUFqQjtBQVdBUixNQUFBQSxRQUFRLENBQUNTLE9BQVQsQ0FBaUJYLFFBQWpCO0FBQ0Q7O0FBakI2QixHQUFoQztBQW1CRCxDQXBCRCxFQW9CR1QsTUFwQkgsRSIsInNvdXJjZXMiOlsid2VicGFjazovL2tyYWtlbi8uL3NyYy9qcy9rcmFrZW4uc3RpY2t5LmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qIVxuICogRmlsZTogc3RpY2t5LmpzXG4gKlxuICogRGVzYzoganMgZm9yIGFkZGluZyBpbnRlcnNlY3Rpb24gb2JzZXJ2ZXIgdG8gdGhlIG5hdiB0byBtYWtlIGl0IHN0aWNreSB3aGVuIHRoZSBkaXJlY3QgRE9NIHNpYmxpbmcgbGVhdmVzIHRoZSB2aWV3cG9ydCAoI3ViYzctdW5pdCkuXG4gKlxuICovXG4oZnVuY3Rpb24oRHJ1cGFsKSB7XG4gIERydXBhbC5iZWhhdmlvcnMua3Jha2Vuc3RpY2t5ID0ge1xuICAgIGF0dGFjaChjb250ZXh0LCBzZXR0aW5ncykge1xuICAgICAgY29uc3QgYm9keSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCJib2R5XCIpO1xuICAgICAgY29uc3QgdW5pdGFyZWEgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI3ViYzctaGVhZGVyXCIpO1xuICAgICAgY29uc3QgbWVudSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIjdWJjNy11bml0XCIpO1xuICAgICAgY29uc3Qgb2JzZXJ2ZXIgPSBuZXcgSW50ZXJzZWN0aW9uT2JzZXJ2ZXIoKGVudHJpZXMpID0+IHtcbiAgICAgICAgZW50cmllcy5mb3JFYWNoKChlbnRyeSkgPT4ge1xuICAgICAgICAgIGlmIChlbnRyeS5pbnRlcnNlY3Rpb25SYXRpbyA8PSAwKSB7XG4gICAgICAgICAgICBib2R5LmNsYXNzTGlzdC5hZGQoXCJuYXYtLWlzLXBpbm5lZFwiKTtcbiAgICAgICAgICAgIG1lbnUuY2xhc3NMaXN0LmFkZChcInN0aWNreW5hdi0tcGlubmVkXCIpO1xuICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBib2R5LmNsYXNzTGlzdC5yZW1vdmUoXCJuYXYtLWlzLXBpbm5lZFwiKTtcbiAgICAgICAgICAgIG1lbnUuY2xhc3NMaXN0LnJlbW92ZShcInN0aWNreW5hdi0tcGlubmVkXCIpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICB9KTtcbiAgICAgIG9ic2VydmVyLm9ic2VydmUodW5pdGFyZWEpO1xuICAgIH1cbiAgfTtcbn0pKERydXBhbCk7XG4iXSwibmFtZXMiOlsiRHJ1cGFsIiwiYmVoYXZpb3JzIiwia3Jha2Vuc3RpY2t5IiwiYXR0YWNoIiwiY29udGV4dCIsInNldHRpbmdzIiwiYm9keSIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsInVuaXRhcmVhIiwibWVudSIsIm9ic2VydmVyIiwiSW50ZXJzZWN0aW9uT2JzZXJ2ZXIiLCJlbnRyaWVzIiwiZm9yRWFjaCIsImVudHJ5IiwiaW50ZXJzZWN0aW9uUmF0aW8iLCJjbGFzc0xpc3QiLCJhZGQiLCJyZW1vdmUiLCJvYnNlcnZlIl0sInNvdXJjZVJvb3QiOiIifQ==