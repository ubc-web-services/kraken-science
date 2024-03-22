module.exports = {
  plugins: [
    require("postcss-import"),
    require("postcss-simple-vars"),
    require("tailwindcss"),
    require("postcss-prefix-selector")({
      prefix: ".ck-editor",
      exclude: ["body", "html", ":root"],
      includeFiles: "src/css/drupal.ckeditor.theme.styles.css",
    }),
    require("autoprefixer"),
    ...(process.env.NODE_ENV === "production" ? [require("cssnano")] : [])
  ]
};
