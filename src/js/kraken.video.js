/*
 * File: video.js
 *
 * Desc: js for video scripts in the theme
 *
 */
(function (Drupal, once) {
    Drupal.behaviors.krakenVideo = {
      attach(context) {
        once("js-video", ".media--type-remote-video", context).forEach((item) => {
          item.addEventListener("click", () => {
            const video = item.querySelector(
              ".field--name-field-media-oembed-video",
            );
            const thumb = item.querySelector(".field--name-thumbnail");
            thumb.classList.add("hidden");
            video.removeAttribute("hidden");
          });
        });
      },
    };
  })(Drupal, once);
