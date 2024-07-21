import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],

  content: [  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",  './app/Filament/**/*.php',
  './resources/views/filament/**/*.blade.php',
  './vendor/filament/**/*.blade.php',],
  theme: {
    extend: {
        colors:{
            primary: '#003580',
            secondary: '#f2f6fa',
            ylw: '#feba02',
            btnPrimary: '#0c71cf',
            btnSecondary: '#1c98f7',
            btnDark: '#003580',
        },
        fontFamily:{
            robotoBold: ['Roboto-Bold','sans-serif']
        },
        backgroundImage:{
            'appointment': "url('/public/assets/logbg.png')",
        }
    },
  },
  plugins: [
    require("tailwindcss-animate"),
  ],
}

