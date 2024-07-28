const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ['./theme/**/*.php'],
  theme: {
    container: {
      center: true,
      padding: {
        default: '30px'
      }
    },
    extend: {
      fontFamily: {
        sans: [...defaultTheme.fontFamily.sans]
      }
    }
  }
}
