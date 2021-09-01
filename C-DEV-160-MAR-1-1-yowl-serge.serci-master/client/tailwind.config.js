const colors = require("tailwindcss/colors");

module.exports = {
  purge: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      transparent: "transparent",
      current: "currentColor",
      black: colors.black,
      green: colors.green,
      white: colors.white,
      gray: colors.blueGray,
      indigo: colors.indigo,
      red: colors.rose,
      blue: colors.blue,
      yellow: colors.amber,
    },
    extend: {
      transform: ["hover"],
      scale: ["hover"],
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
