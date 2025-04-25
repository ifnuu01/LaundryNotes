/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        jakarta: ['"Plus Jakarta Sans"', 'sans-serif'], 
      },
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
    },
    animation: {
      'fade-right': 'fadeInRight 1s ease-out',
      'fade-left': 'fadeInLeft 1s ease-out',
      'fade-up': 'fadeInUp 1s ease-out',
      'fade-down': 'fadeInDown 1s ease-out',
      'fade-in': 'fadeIn 1s ease-out',
    },
    keyframes: {
      fadeInRight: {
        '0%': { opacity: '0', transform: 'translateX(50px)' },
        '100%': { opacity: '1', transform: 'translateX(0)' },
      },
      fadeInLeft: {
        '0%': { opacity: '0', transform: 'translateX(-50px)' },
        '100%': { opacity: '1', transform: 'translateX(0)' },
      },
      fadeInUp: {
        '0%': { opacity: '0', transform: 'translateY(50px)' },
        '100%': { opacity: '1', transform: 'translateY(0)' },
      },
      fadeInDown: {
        '0%': { opacity: '0', transform: 'translateY(-50px)' },
        '100%': { opacity: '1', transform: 'translateY(0)' },
      },
      fadeIn: {
        '0%': { opacity: '0' },
        '100%': { opacity: '1' },
      },
    },
    },
  },
  plugins: [],
}

