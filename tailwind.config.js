const daisyUI = require('daisyui')

module.exports = {
  content: ["./*.php", "./templates/**/*.php"],
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
