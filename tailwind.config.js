/** @type {import('tailwindcss').Config} */
import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'


const plugin = require('tailwindcss/plugin')
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
      extend: {
          colors: {
              danger: colors.rose,
              primary: {
                                  100: '#00b7f0',
                                  200: '#00205e',
                                  300: '#00205e',
                                  400: '#00205e',
                                  500: '#00205e',
                                  600: '#00205e',
                                  700: '#00205e',
                                  800: '#00205e',
                                  900: '#00205e',
                              },
              success: colors.green,
              warning: colors.yellow,
          },
      },
        // colors:
        //     {
        //         'primary':
        //             {
        //                 100: '#00b7f0',
        //                 200: '#00205e',
        //             }
        //     }
        // extend: {},
  },
  plugins: [
      forms,
      typography,
  ],
}

