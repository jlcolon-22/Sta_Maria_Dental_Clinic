/** @type {import('tailwindcss').Config} */
export default {
  content: [  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",],
  theme: {
    extend: {
        colors:{
            primary: '#003580',
            secondary: '#f2f6fa',
            ylw: '#feba02',
            btnPrimary: '#0c71cf',
            btnSecondary: '#1c98f7',
        }
    },
  },
  plugins: [],
}

