const daisyUI = require('daisyui')

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
    extend: {},
  },
  plugins: [
    daisyUI
  ],
}
