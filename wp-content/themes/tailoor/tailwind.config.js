/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      fontSize: {
        '2xs': ['.65rem', '.85rem']
      },
      maxWidth: {
        '8xl': '1320px'
      },
      colors: {
        pink: {
          DEFAULT: '#ffc1bf',
          '50': '#fef2f2',
          '100': '#ffe2e1',
          '200': '#ffc1bf',
          '300': '#fea6a3',
          '400': '#fb726e',
          '500': '#f24741',
          '600': '#e02822',
          '700': '#bc1e19',
          '800': '#9b1d19',
          '900': '#811e1b',
          '950': '#460b09',
        },
        mirage: {
          DEFAULT: '#111a27',
          '50': '#f4f7fb',
          '100': '#e8edf6',
          '200': '#cbdbec',
          '300': '#9dbcdc',
          '400': '#6998c7',
          '500': '#467cb1',
          '600': '#346195',
          '700': '#2b4e79',
          '800': '#274365',
          '900': '#253a55',
          '950': '#111a27',
        },

      }, // Extend Tailwind's default colors
      fontFamily: {
        sans: ['Inter',],
        header: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
};

export default config;
