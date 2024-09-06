/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: 'tpw-',
  content: [
    './*.php',
    './templates/**/*.php',
    './woocommerce/**/*.php',
    './**/*.php',
    './**/*.html',
    './**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          light: '#6d28d9',
          DEFAULT: '#4c1d95',
          dark: '#3b0d70',
        },
        secondary: {
          light: '#fbbf24',
          DEFAULT: '#f59e0b',
          dark: '#b45309',
        },
      },
      fontFamily: {
        primary: ['Roboto', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
