/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./src/js/kraken.scroll.js ***!
  \*********************************/
/*!
 * File: scroll.js
 *
 * Desc: js for adding intersection observer to the top top button, revealing it when the totop-mask is outside of the viewport
 *
 */
(function (Drupal) {
  Drupal.behaviors.krakenscroll = {
    attach(context, settings) {
      var topbtn = document.querySelector("#totop");
      var topcontainer = document.querySelector("#totop-mask");
      var observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.intersectionRatio > 0) {
            topbtn.classList.remove("is-visible");
          } else {
            topbtn.classList.add("is-visible");
          }
        });
      });
      observer.observe(topcontainer);
      document.getElementById("totop").addEventListener("click", () => {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      });
    }

  };
})(Drupal);
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLnNjcm9sbC5qcyIsIm1hcHBpbmdzIjoiOzs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsVUFBU0EsTUFBVCxFQUFpQjtBQUNoQkEsRUFBQUEsTUFBTSxDQUFDQyxTQUFQLENBQWlCQyxZQUFqQixHQUFnQztBQUM5QkMsSUFBQUEsTUFBTSxDQUFDQyxPQUFELEVBQVVDLFFBQVYsRUFBb0I7QUFDeEIsVUFBTUMsTUFBTSxHQUFHQyxRQUFRLENBQUNDLGFBQVQsQ0FBdUIsUUFBdkIsQ0FBZjtBQUNBLFVBQU1DLFlBQVksR0FBR0YsUUFBUSxDQUFDQyxhQUFULENBQXVCLGFBQXZCLENBQXJCO0FBQ0EsVUFBTUUsUUFBUSxHQUFHLElBQUlDLG9CQUFKLENBQXlCQyxPQUFPLElBQUk7QUFDbkRBLFFBQUFBLE9BQU8sQ0FBQ0MsT0FBUixDQUFnQkMsS0FBSyxJQUFJO0FBQ3ZCLGNBQUlBLEtBQUssQ0FBQ0MsaUJBQU4sR0FBMEIsQ0FBOUIsRUFBaUM7QUFDL0JULFlBQUFBLE1BQU0sQ0FBQ1UsU0FBUCxDQUFpQkMsTUFBakIsQ0FBd0IsWUFBeEI7QUFDRCxXQUZELE1BRU87QUFDTFgsWUFBQUEsTUFBTSxDQUFDVSxTQUFQLENBQWlCRSxHQUFqQixDQUFxQixZQUFyQjtBQUNEO0FBQ0YsU0FORDtBQU9ELE9BUmdCLENBQWpCO0FBU0FSLE1BQUFBLFFBQVEsQ0FBQ1MsT0FBVCxDQUFpQlYsWUFBakI7QUFDQUYsTUFBQUEsUUFBUSxDQUFDYSxjQUFULENBQXdCLE9BQXhCLEVBQWlDQyxnQkFBakMsQ0FBa0QsT0FBbEQsRUFBMkQsTUFBTTtBQUMvREMsUUFBQUEsTUFBTSxDQUFDQyxRQUFQLENBQWdCO0FBQ2RDLFVBQUFBLEdBQUcsRUFBRSxDQURTO0FBRWRDLFVBQUFBLFFBQVEsRUFBRTtBQUZJLFNBQWhCO0FBSUQsT0FMRDtBQU1EOztBQXBCNkIsR0FBaEM7QUFzQkQsQ0F2QkQsRUF1Qkd6QixNQXZCSCxFIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8va3Jha2VuLy4vc3JjL2pzL2tyYWtlbi5zY3JvbGwuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyohXG4gKiBGaWxlOiBzY3JvbGwuanNcbiAqXG4gKiBEZXNjOiBqcyBmb3IgYWRkaW5nIGludGVyc2VjdGlvbiBvYnNlcnZlciB0byB0aGUgdG9wIHRvcCBidXR0b24sIHJldmVhbGluZyBpdCB3aGVuIHRoZSB0b3RvcC1tYXNrIGlzIG91dHNpZGUgb2YgdGhlIHZpZXdwb3J0XG4gKlxuICovXG4oZnVuY3Rpb24oRHJ1cGFsKSB7XG4gIERydXBhbC5iZWhhdmlvcnMua3Jha2Vuc2Nyb2xsID0ge1xuICAgIGF0dGFjaChjb250ZXh0LCBzZXR0aW5ncykge1xuICAgICAgY29uc3QgdG9wYnRuID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiN0b3RvcFwiKTtcbiAgICAgIGNvbnN0IHRvcGNvbnRhaW5lciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIjdG90b3AtbWFza1wiKTtcbiAgICAgIGNvbnN0IG9ic2VydmVyID0gbmV3IEludGVyc2VjdGlvbk9ic2VydmVyKGVudHJpZXMgPT4ge1xuICAgICAgICBlbnRyaWVzLmZvckVhY2goZW50cnkgPT4ge1xuICAgICAgICAgIGlmIChlbnRyeS5pbnRlcnNlY3Rpb25SYXRpbyA+IDApIHtcbiAgICAgICAgICAgIHRvcGJ0bi5jbGFzc0xpc3QucmVtb3ZlKFwiaXMtdmlzaWJsZVwiKTtcbiAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgdG9wYnRuLmNsYXNzTGlzdC5hZGQoXCJpcy12aXNpYmxlXCIpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICB9KTtcbiAgICAgIG9ic2VydmVyLm9ic2VydmUodG9wY29udGFpbmVyKTtcbiAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwidG90b3BcIikuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsICgpID0+IHtcbiAgICAgICAgd2luZG93LnNjcm9sbFRvKHtcbiAgICAgICAgICB0b3A6IDAsXG4gICAgICAgICAgYmVoYXZpb3I6IFwic21vb3RoXCJcbiAgICAgICAgfSk7XG4gICAgICB9KTtcbiAgICB9XG4gIH07XG59KShEcnVwYWwpO1xuIl0sIm5hbWVzIjpbIkRydXBhbCIsImJlaGF2aW9ycyIsImtyYWtlbnNjcm9sbCIsImF0dGFjaCIsImNvbnRleHQiLCJzZXR0aW5ncyIsInRvcGJ0biIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsInRvcGNvbnRhaW5lciIsIm9ic2VydmVyIiwiSW50ZXJzZWN0aW9uT2JzZXJ2ZXIiLCJlbnRyaWVzIiwiZm9yRWFjaCIsImVudHJ5IiwiaW50ZXJzZWN0aW9uUmF0aW8iLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhZGQiLCJvYnNlcnZlIiwiZ2V0RWxlbWVudEJ5SWQiLCJhZGRFdmVudExpc3RlbmVyIiwid2luZG93Iiwic2Nyb2xsVG8iLCJ0b3AiLCJiZWhhdmlvciJdLCJzb3VyY2VSb290IjoiIn0=