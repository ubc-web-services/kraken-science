module.exports = {
  blocklist: ["collapse"],
  content: [
    "./components/**/*.{twig,html,js,css}",
    "./templates/**/*.{twig,html}",
    "./src/**/*.{js,jsx,ts,tsx,vue}",
    "./kraken.theme",
    "./safelist.txt",
  ],
  separator: "--",
  theme: {
    colors: {
      transparent: "transparent",
      current: "currentColor",
      black: "#000",
      white: "#fff",
      "ubc-blue": "#002145",
      "ubc-blue-sea": "#003A79",
      "ubc-blue-cobalt": "#0055b7",
      "ubc-blue-neptune": "#40b4e5",
      "ubc-blue-sky": "#61c1e9",
      "ubc-blue-cornflower": "#97d4e9",
      "ubc-blue-polar": "#def1f8",
      "ubc-blue-frost": "#f6fbfd",
      "unit-primary": "var(--color-primary)",
      "unit-secondary": "var(--color-secondary)",
      "unit-tertiary": "var(--color-tertiary)",
      "unit-accent": "var(--color-accent)",
      "unit-alt-primary": "var(--color-alt-primary)",
      "unit-alt-secondary": "var(--color-alt-secondary)",
      "unit-alt-tertiary": "var(--color-alt-tertiary)",
      "unit-alt-accent": "var(--color-alt-accent)",
      grey: {
        50: "#fafafa",
        100: "#f1f3f4",
        200: "#e3e6e8",
        300: "#bbc2c5",
        400: "#bdbdbd",
        500: "#829299",
        600: "#72848c",
        700: "#505b67",
        800: "#505B67",
        900: "#282d33",
      },
    },
    screens: {
      xxs: "400px",
      xs: "600px",
      sm: "768px",
      md: "980px",
      lg: "1200px",
      xl: "1720px",
      xxl: "2400px",
    },
    fontFamily: {
      sans: "var(--text-font-stack)",
      serif: "var(--alternate-font-stack)",
      mono: "var(--code-font-stack)",
    },
    fontSize: {
      xs: ".75rem", // 12px
      sm: ".875rem", // 14px
      base: "1rem", // 16px
      lg: "1.125rem", // 18px
      xl: "1.25rem", // 20px
      "2xl": "1.5rem", // 24px
      "3xl": "1.75rem", // 28px
      "4xl": "2rem", // 32px
      "5xl": "3rem", // 48px
      "6xl": "4rem", // 64px
    },
    extend: {
      margin: {
        leading: "calc(var(--leading) * var(--base-font-size))",
      },
      padding: {
        leading: "calc(var(--leading) * var(--base-font-size))",
      },
      width: {
        half: "50%",
        "one-third": "33.33333%",
        "two-thirds": "66.66667%",
        "one-quarter": "25%",
        "three-quarters": "75%",
        "one-fifth": "20%",
        "two-fifths": "40%",
        "three-fifths": "60%",
        "four-fifths": "80%",
        "one-sixth": "16.66667%",
        "five-sixths": "83.33333%",
        "one-twelfth": "8.33333%",
        "five-twelfths": "41.66666%",
        "seven-twelfths": "58.33333%",
        "eleven-twelfths": "91.66666%",
      },
    },
  },
  plugins: [],
};
