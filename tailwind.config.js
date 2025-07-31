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
                  backgroundImage: {
                    'green-purple-radial': 'radial-gradient(circle,rgba(125, 222, 87, 1) 20%, rgba(40, 36, 71, 1) 100%)',
                    'genz-radial': 'radial-gradient(circle, rgba(186,230,253,1) 0%, rgba(221,160,221,1) 50%, rgba(255,182,193,1) 100%)',

      },

        },
    },

    plugins: [forms],
};
