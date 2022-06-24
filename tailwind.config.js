const daisyUI = require('daisyui')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./*.php", 
    "./templates/**/*.php",
    "./admin/**/*.php",
    "./student/**/*.php",
    "./teacher/**/*.php"
  ],
  theme: {
    container: {
      center: true,
      padding: '1rem'
    },
    extend: {
      fontFamily: {
        'sans': ['Inter', ...defaultTheme.fontFamily.sans]
      }
    },
  },
  plugins: [
    daisyUI
  ],
}
