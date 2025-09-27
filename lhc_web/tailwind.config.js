/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./design/defaulttheme/tpl/**/*.php",
    "./design/defaulttheme/tpl/**/*.html",
    "./modules/**/*.php",
    "./design/defaulttheme/js/**/*.js",
    "./design/defaulttheme/js/**/*.jsx",
    "./design/defaulttheme/js/**/*.ts",
    "./design/defaulttheme/js/**/*.tsx",
    "./design/defaulttheme/js/**/*.svelte",
    "./*.html"
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        // TailAdmin inspired color palette
        primary: '#4f46e5',
        secondary: '#6b7280', 
        success: '#059669',
        warning: '#d97706',
        danger: '#dc2626',
        info: '#0891b2',
        dark: '#1e293b',
        'body-color': '#64748b',
        'title-color': '#0f172a',
        stroke: '#e2e8f0',
        'gray-light': '#f8fafc',
        'gray-dark': '#1e293b',
        'gray-darker': '#0f172a',
      },
      fontFamily: {
        'outfit': ['Outfit', 'sans-serif']
      },
      boxShadow: {
        'input': '0px 2px 3px rgba(7, 7, 77, 0.05)',
        'card': '0px 1px 3px rgba(0, 0, 0, 0.12)',
        'card-hover': '0px 4px 6px rgba(0, 0, 0, 0.1)',
        'sidebar': '-4px 0 15px 0 rgba(40, 50, 60, 0.1)',
      },
      screens: {
        'xsm': '425px',
        '2xsm': '375px',
        '3xl': '2000px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}