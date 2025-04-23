/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      colors: {
        skyBlue: '#E3FAFF',
        skyBlueDark: '#21B7E2',
        bg: '#F7FEFF',
        fg: '#263238',
        success: '#ABE9B3',
        successDark: '#128035',
        warning :'#FAE3B0',
        warningDark: '#967522',
        danger: '#C53D40',
        blueDark: '#187ABA',
    }
    },
  },
  plugins: [],
}

