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
          DEFAULT: '#1D4E89',
        },
        secondary: {
          DEFAULT: '#008080',
        },
        accent: {
          DEFAULT: '#FFD700',
        },
        neutral: {
          DEFAULT: '#F5F5F5',
        },
        primaryOverlay: {
          DEFAULT: '#1d4e89b3',
        },
      },
      fontFamily: {
        primary: ['Lexend', 'sans-serif'],
        secondary: ['Merriweather', 'serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
