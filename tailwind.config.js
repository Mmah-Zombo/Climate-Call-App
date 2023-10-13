import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                teaGreen: '#C2F8CB',
                celadon: '#B3E9C7',
                honeydew: '#F0FFF1',
                amethyst: '#8367C7',
                chryslerBlue: '#5603AD'
            },
            height: {
                '136': '34rem',
                '100': '25rem'
            }
        },
    },

    plugins: [forms, typography],
};
