/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./design/defaulttheme/tpl/**/*.php",

    "./design/defaulttheme/tpl/**/*.tpl.php",
    "./design/defaulttheme/js/**/*.js",
    "./*.html"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#eef2ff',
          100: '#e0e7ff',
          200: '#c7d2fe',
          300: '#a5b4fc',
          400: '#818cf8',
          500: '#6366f1',
          600: '#4f46e5',
          700: '#4338ca',
          800: '#3730a3',
          900: '#312e81',
          950: '#1e1b4b',
        },
        sidebar: {
          900: '#1e293b',
          800: '#334155',
          700: '#475569',
        }
      },
      fontFamily: {
        sans: ['Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'sans-serif'],
      },

    },
  },
  plugins: [
    require('@tailwindcss/forms'),

  ],
}