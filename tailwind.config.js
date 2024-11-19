import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                rotate: {
                  '0%': { transform: 'perspective(1000px) rotateY(0deg)'},
                  '100%': { transform: 'perspective(1000px) rotateY(360deg)'}
                }
              },
              animation: {
                rotate: 'rotate 30s linear infinite',
              }
        },
       
    },

    plugins: [forms],
};
