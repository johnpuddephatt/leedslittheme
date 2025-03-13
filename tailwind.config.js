/** @type {import('tailwindcss').Config} config */

import typography from '@tailwindcss/typography';

const config = {
  content: [
    './index.php',
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './safelist.txt',
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
        xl: '2.5rem',
        '2xl': '3rem',
      },
    },
    colors: {
      transparent: 'transparent',
      white: '#ffffff',
      black: '#000000',
      gray: '#232323',
      blue: '#0079CC',
      pink: '#FF7CE4',
      'blue-light': '#86b4db',
      'pink-light': '#fdf4fc',
    },
    fontFamily: {
      sans: [
        'LLF-sans',
        'Avenir',
        'Helvetica Neue',
        'Helvetica',
        'Arial',
        'sans-serif',
      ],
      serif: [
        'LLF-serif',
        'Georgia',
        'Cambria',
        'Times New Roman',
        'Times',
        'serif',
      ],
    },
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            '--tw-prose-body': theme('colors.black'),
            '--tw-prose-headings': theme('colors.black'),
            '--tw-prose-bold': theme('colors.blue'),
            '--tw-prose-links': theme('colors.blue'),
          },
        },
      }),
    },
  },
  plugins: [typography],
};

export default config;
