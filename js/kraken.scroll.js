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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoia3Jha2VuLnNjcm9sbC5qcyIsIm1hcHBpbmdzIjoiOzs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUMsVUFBU0EsTUFBTSxFQUFFO0VBQ2hCQSxNQUFNLENBQUNDLFNBQVMsQ0FBQ0MsWUFBWSxHQUFHO0lBQzlCQyxNQUFNQSxDQUFDQyxPQUFPLEVBQUVDLFFBQVEsRUFBRTtNQUN4QixJQUFNQyxNQUFNLEdBQUdDLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLFFBQVEsQ0FBQztNQUMvQyxJQUFNQyxZQUFZLEdBQUdGLFFBQVEsQ0FBQ0MsYUFBYSxDQUFDLGFBQWEsQ0FBQztNQUMxRCxJQUFNRSxRQUFRLEdBQUcsSUFBSUMsb0JBQW9CLENBQUNDLE9BQU8sSUFBSTtRQUNuREEsT0FBTyxDQUFDQyxPQUFPLENBQUNDLEtBQUssSUFBSTtVQUN2QixJQUFJQSxLQUFLLENBQUNDLGlCQUFpQixHQUFHLENBQUMsRUFBRTtZQUMvQlQsTUFBTSxDQUFDVSxTQUFTLENBQUNDLE1BQU0sQ0FBQyxZQUFZLENBQUM7VUFDdkMsQ0FBQyxNQUFNO1lBQ0xYLE1BQU0sQ0FBQ1UsU0FBUyxDQUFDRSxHQUFHLENBQUMsWUFBWSxDQUFDO1VBQ3BDO1FBQ0YsQ0FBQyxDQUFDO01BQ0osQ0FBQyxDQUFDO01BQ0ZSLFFBQVEsQ0FBQ1MsT0FBTyxDQUFDVixZQUFZLENBQUM7TUFDOUJGLFFBQVEsQ0FBQ2EsY0FBYyxDQUFDLE9BQU8sQ0FBQyxDQUFDQyxnQkFBZ0IsQ0FBQyxPQUFPLEVBQUUsTUFBTTtRQUMvREMsTUFBTSxDQUFDQyxRQUFRLENBQUM7VUFDZEMsR0FBRyxFQUFFLENBQUM7VUFDTkMsUUFBUSxFQUFFO1FBQ1osQ0FBQyxDQUFDO01BQ0osQ0FBQyxDQUFDO0lBQ0o7RUFDRixDQUFDO0FBQ0gsQ0FBQyxFQUFFekIsTUFBTSxDQUFDLEMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9rcmFrZW4vLi9zcmMvanMva3Jha2VuLnNjcm9sbC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKiFcbiAqIEZpbGU6IHNjcm9sbC5qc1xuICpcbiAqIERlc2M6IGpzIGZvciBhZGRpbmcgaW50ZXJzZWN0aW9uIG9ic2VydmVyIHRvIHRoZSB0b3AgdG9wIGJ1dHRvbiwgcmV2ZWFsaW5nIGl0IHdoZW4gdGhlIHRvdG9wLW1hc2sgaXMgb3V0c2lkZSBvZiB0aGUgdmlld3BvcnRcbiAqXG4gKi9cbihmdW5jdGlvbihEcnVwYWwpIHtcbiAgRHJ1cGFsLmJlaGF2aW9ycy5rcmFrZW5zY3JvbGwgPSB7XG4gICAgYXR0YWNoKGNvbnRleHQsIHNldHRpbmdzKSB7XG4gICAgICBjb25zdCB0b3BidG4gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI3RvdG9wXCIpO1xuICAgICAgY29uc3QgdG9wY29udGFpbmVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIiN0b3RvcC1tYXNrXCIpO1xuICAgICAgY29uc3Qgb2JzZXJ2ZXIgPSBuZXcgSW50ZXJzZWN0aW9uT2JzZXJ2ZXIoZW50cmllcyA9PiB7XG4gICAgICAgIGVudHJpZXMuZm9yRWFjaChlbnRyeSA9PiB7XG4gICAgICAgICAgaWYgKGVudHJ5LmludGVyc2VjdGlvblJhdGlvID4gMCkge1xuICAgICAgICAgICAgdG9wYnRuLmNsYXNzTGlzdC5yZW1vdmUoXCJpcy12aXNpYmxlXCIpO1xuICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICB0b3BidG4uY2xhc3NMaXN0LmFkZChcImlzLXZpc2libGVcIik7XG4gICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgIH0pO1xuICAgICAgb2JzZXJ2ZXIub2JzZXJ2ZSh0b3Bjb250YWluZXIpO1xuICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJ0b3RvcFwiKS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgKCkgPT4ge1xuICAgICAgICB3aW5kb3cuc2Nyb2xsVG8oe1xuICAgICAgICAgIHRvcDogMCxcbiAgICAgICAgICBiZWhhdmlvcjogXCJzbW9vdGhcIlxuICAgICAgICB9KTtcbiAgICAgIH0pO1xuICAgIH1cbiAgfTtcbn0pKERydXBhbCk7XG4iXSwibmFtZXMiOlsiRHJ1cGFsIiwiYmVoYXZpb3JzIiwia3Jha2Vuc2Nyb2xsIiwiYXR0YWNoIiwiY29udGV4dCIsInNldHRpbmdzIiwidG9wYnRuIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwidG9wY29udGFpbmVyIiwib2JzZXJ2ZXIiLCJJbnRlcnNlY3Rpb25PYnNlcnZlciIsImVudHJpZXMiLCJmb3JFYWNoIiwiZW50cnkiLCJpbnRlcnNlY3Rpb25SYXRpbyIsImNsYXNzTGlzdCIsInJlbW92ZSIsImFkZCIsIm9ic2VydmUiLCJnZXRFbGVtZW50QnlJZCIsImFkZEV2ZW50TGlzdGVuZXIiLCJ3aW5kb3ciLCJzY3JvbGxUbyIsInRvcCIsImJlaGF2aW9yIl0sInNvdXJjZVJvb3QiOiIifQ==