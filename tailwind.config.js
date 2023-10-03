/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
        ...colors,
        leaf: {
            lighter: '#E6F4F1',
            light: '#96D2C6',
            DEFAULT: '#279D85',
            dark: '#21937A',
            darker: '#1B8A70'
        },
        night: {
            lighter: '#E2E5E8',
            light: '#273B54',
            DEFAULT: '#091F3C',
            dark: '#071A34',
            darker: '#05152b',
        }
    },
    extend: {},
  },
  plugins: [],
}

